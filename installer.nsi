
;--------------------------------
;Include Modern UI

  !include "MUI2.nsh"
;--------------------------------
;General

  ;Name and file
  Name "Slowjudge"
  OutFile "Slowjudge_Installer.exe"
 
;-------------------------------- 
  ;Version Information
  
  VIProductVersion "1.0.1.10"
  VIAddVersionKey  "ProductName" "Slowjudge"
  VIAddVersionKey  "Comments" "An easy to maintain contest platform"
  VIAddVersionKey  "CompanyName" "moshiur-bd"
  VIAddVersionKey  "LegalTrademarks" "https://github.com/moshiur-bd/SlowJudge"
  VIAddVersionKey  "FileDescription" "Slowjudge"
  VIAddVersionKey  "FileVersion" "1.0.1.10"
;----------------------------------

  ;Request application privileges for Windows Vista
  RequestExecutionLevel admin

  ;build source code at compile time
  !system "evaluator\build.bat"

  ;Default installation folder
  InstallDir "C:\Slowjudge"
  ;Read from Registry if available  
  InstallDirRegKey HKCU "Software\slowjudge" "store"

  ;Define necessary variables to hold directory 
  Var WebDir
  Var XamppDir

;--------------------------------
;Interface Settings

  !define MUI_ABORTWARNING

;-------------------------------------------------------------------
  ;Pages

  !insertmacro MUI_PAGE_WELCOME
  !insertmacro MUI_PAGE_LICENSE "License.txt"
  !insertmacro MUI_PAGE_COMPONENTS

  !define MUI_PAGE_HEADER_TEXT "Choose a location where slowjudge will be installed"
  !define MUI_PAGE_HEADER_SUBTEXT "This is the location where slowjudge will store submission & IO files"
  !define MUI_DIRECTORYPAGE_TEXT_TOP "Please select the directory where you want slowjudge to be installed." 
  !define MUI_DIRECTORYPAGE_TEXT_DESTINATION "Enter Directory"
  !define MUI_DIRECTORYPAGE_VARIABLE $INSTDIR
  !insertmacro MUI_PAGE_DIRECTORY

  !define MUI_PAGE_HEADER_TEXT "Select Xampp Directory"
  !define MUI_PAGE_HEADER_SUBTEXT "Slowjudge Requires Xampp to operate. If you haven't installed Xampp, Install it first and then provide select the location here"
  !define MUI_DIRECTORYPAGE_TEXT_TOP "Please select the directory where you have istalled Xampp" 
  !define MUI_DIRECTORYPAGE_TEXT_DESTINATION "Xampp Directory"
  !define MUI_DIRECTORYPAGE_VARIABLE $XamppDir
  !insertmacro MUI_PAGE_DIRECTORY 

  !insertmacro MUI_PAGE_INSTFILES
  !insertmacro MUI_PAGE_FINISH
;-------------------------------------------------------------------------------------------

;--------------------------------
;Languages

    !insertmacro MUI_LANGUAGE "English" ; The first language is the default language

;-------------------------------

;--------------------------------
;Installer Sections

Section "Install - Website" SecWeb
  StrCpy $WebDir "$XamppDir\htdocs\slowjudge"
  SetOutPath "$WebDir"
  
  File /r "web-end\*"
  
  ;Store installation folder
  WriteRegStr HKCU "Software\slowjudge" "xamppdir" $XamppDir
  WriteRegStr HKCU "Software\slowjudge" "webdir" $WebDir
SectionEnd

Section "Install - Solution Evaluator" SecEval
  ;create sandbox folder to run submissions
  SetOutPath "C:\sandbox"

  ;copy necessary files
  SetOutPath "$INSTDIR\checker"
  File "evaluator\checker\TrailingWhiteSpaceAllowed.exe"

  SetOutPath "$INSTDIR"
  File "evaluator\Timer.class"
  File "evaluator\Judge.class"
  File "evaluator\cpu.exe"
  File "evaluator\compiler.exe"
  File "evaluator\watcher.exe"

  File "dependency\mysql-connector-java-5.0.8-bin.jar" 

  ;create necessary folders
  SetOutPath "$INSTDIR\in"
  SetOutPath "$INSTDIR\out"
  SetOutPath "$INSTDIR\src"
  
  SetOutPath "$INSTDIR\sub"
  File "evaluator\sub\forbid.c"
  
  ;create registry entry for $INSTDIR
  WriteRegStr HKCU "Software\slowjudge" "store" $INSTDIR
  
  ;Create uninstaller
  WriteUninstaller "$INSTDIR\Uninstall.exe"
SectionEnd

Section "Replace php.ini" SecReplacePhpIni
  SetOutPath "$XamppDir\php"
  File "dependency\php.ini" 
SectionEnd

Section "Create StartMenu-Shortcut" SecStartMenuShortCut
  SetOutPath "$INSTDIR"
  CreateShortCut "$SMPROGRAMS\slowjudge.lnk" "$INSTDIR\server.bat"
SectionEnd

Section "Create Desktop-Shortcut " SecDesktopShortCut
  SetOutPath "$INSTDIR"
  CreateShortCut "$DESKTOP\slowjudge.lnk" "$INSTDIR\server.bat"
SectionEnd

Section "Auto start" SecAutoStart
  SetOutPath "$INSTDIR"
  WriteRegStr HKLM "Software\Microsoft\Windows\CurrentVersion\Run" "slowjudge" "$INSTDIR\server.bat"
SectionEnd

Section "-Delete Auto Start" SecDeleteAutoStart
  DeleteRegValue HKLM "Software\Microsoft\Windows\CurrentVersion\Run" "slowjudge"
SectionEnd

Section "-Create Server.bat" SecCreateServerBatch
  SetOutPath "$INSTDIR"
  FileOpen $0 "$INSTDIR\server.bat" w
  FileWrite $0 'set path=%path%;C:\Program Files\Java\jdk1.8.0_102\bin;C:\Program Files (x86)\CodeBlocks\MinGW\bin;$\r$\n'
  FileWrite $0 'set slowjudgeback=$INSTDIR\$\r$\n'
  FileWrite $0 'set classpath=%slowjudgeback%;%slowjudgeback%mysql-connector-java-5.0.8-bin.jar;$\r$\n'
  FileWrite $0 'start $XamppDir\mysql_start.bat$\r$\n'
  FileWrite $0 'start $XamppDir\apache_start.bat$\r$\n'
  FileWrite $0 'timeout /t 20$\r$\n'
  FileWrite $0 'start /SEPARATE /MIN /D $INSTDIR\ "" java Judge $INSTDIR\ slowjudge-contest-engine slowjudge-contest-$\r$\n'
  FileClose $0
SectionEnd

;--------------------------------
; ;Installer Functions
Function .onSelChange
  ${If} ${SectionIsSelected} ${SecAutoStart}
      !insertmacro UnselectSection ${SecDeleteAutoStart}
  ${Else}
      !insertmacro SelectSection ${SecDeleteAutoStart}
  ${EndIf}
FunctionEnd

Function .onInit
  !insertmacro MUI_LANGDLL_DISPLAY
  
  ;by default autstart will be selected and deletautostart will be deselected
  !insertmacro UnselectSection ${SecDeleteAutoStart}
  !insertmacro SelectSection ${SecAutoStart}

  ReadRegStr $XamppDir HKCU "Software\slowjudge" "xamppdir"

  StrCmp $XamppDir "" 0 +2
  StrCpy $XamppDir "C:\xampp"
  
  StrCpy $WebDir "$XamppDir\htdocs\slowjudge"
FunctionEnd

;--------------------------------
;Descriptions
  !insertmacro MUI_FUNCTION_DESCRIPTION_BEGIN
    !insertmacro MUI_DESCRIPTION_TEXT ${SecWeb} "Php files to power slowjudge web end"
    !insertmacro MUI_DESCRIPTION_TEXT ${SecEval} "Backend to Evaluation solutions and Run contest. This folder also will store all the problem and IO and solutions."
    !insertmacro MUI_DESCRIPTION_TEXT ${SecStartMenuShortCut} "Creates Start Menu shortcut"
    !insertmacro MUI_DESCRIPTION_TEXT ${SecDesktopShortCut} "Creates Desktop shortcut"
    !insertmacro MUI_DESCRIPTION_TEXT ${SecAutoStart} "Runs slowjudge server at system startup. Unselecting this will disable auto start"
    !insertmacro MUI_DESCRIPTION_TEXT ${SecReplacePhpIni} "New php.ini fine tunes php for slowjudge. It increases some limitations like file upload sizes, session timeouts & memory limitation"
  !insertmacro MUI_FUNCTION_DESCRIPTION_END

 
;--------------------------------
;Uninstaller Section

Section "Uninstall"
  Delete "$INSTDIR\Uninstall.exe"
  Delete "$DESKTOP\slowjudge.lnk"
  Delete "$SMPROGRAMS\slowjudge.lnk"

  RMDir "$INSTDIR"
  RMDir "$WebDir"

  DeleteRegValue HKLM "Software\Microsoft\Windows\CurrentVersion\Run" "slowjudge"
SectionEnd

;--------------------------------
;Uninstaller Functions
Function un.onInit

 !insertmacro MUI_UNGETLANGUAGE
  ReadRegStr $WebDir HKCU "Software\slowjudge" "webdir"
  
FunctionEnd