;NSIS Modern User Interface
;Multilingual Example Script
;Written by Joost Verburg

;!pragma warning error all

;--------------------------------
;Include Modern UI

  !include "MUI2.nsh"

;--------------------------------
;General

  ;Properly display all languages (Installer will not work on Windows 95, 98 or ME!)
  ;Unicode true

  ;Name and file
  Name "Slowjudge"
  OutFile "Slowjudge-Installer.exe"

  ;Default installation folder
  InstallDir "C:\Slowjudge"
  ;Read from Registry if available  
  InstallDirRegKey HKCU "Software\slowjudge" "store"

  Var WebDir
  Var XamppDir


  ;Request application privileges for Windows Vista
  RequestExecutionLevel admin

;--------------------------------
;Interface Settings

  !define MUI_ABORTWARNING

;   ;Show all languages, despite user's codepage
;   !define MUI_LANGDLL_ALLLANGUAGES

; ;--------------------------------
; ;Language Selection Dialog Settings

;   ;Remember the installer language
;   !define MUI_LANGDLL_REGISTRY_ROOT "HKCU" 
;   !define MUI_LANGDLL_REGISTRY_KEY "Software\Modern UI Test" 
;   !define MUI_LANGDLL_REGISTRY_VALUENAME "Installer Language"

; ;--------------------------------
; ;Pages

  !insertmacro MUI_PAGE_WELCOME
  !insertmacro MUI_PAGE_LICENSE "${NSISDIR}\Docs\Modern UI\License.txt"
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

;--------------------------------
;Languages

    !insertmacro MUI_LANGUAGE "English" ; The first language is the default language

;-------------------------------

;--------------------------------
;Installer Sections

Section "Web" SecWeb
  
  StrCpy $WebDir "$XamppDir\htdocs\slowjudge"
  SetOutPath "$WebDir"
  
  File /r "web-end\*"
  
  ;Store installation folder
  WriteRegStr HKCU "Software\slowjudge" "xamppdir" $XamppDir
  WriteRegStr HKCU "Software\slowjudge" "webdir" $WebDir

  WriteUninstaller "$INSTDIR\Uninstall.exe"

SectionEnd

Section "Evaluator & Storage" SecEval

  SetOutPath "$INSTDIR"

  File /r "evaluator\*"

  
  WriteRegStr HKCU "Software\slowjudge" "store" $INSTDIR
  
  ;Create uninstaller
  WriteUninstaller "$INSTDIR\Uninstall.exe"

SectionEnd

;--------------------------------
; ;Installer Functions

Function .onInit

  !insertmacro MUI_LANGDLL_DISPLAY

  ReadRegStr $XamppDir HKCU "Software\slowjudge" "xamppdir"

  StrCmp $XamppDir "" 0 +2
  StrCpy $XamppDir "C:\Xampp"
  
  
  StrCpy $WebDir "$XamppDir\htdocs\slowjudge"
FunctionEnd

;--------------------------------
;Descriptions

  ;USE A LANGUAGE STRING IF YOU WANT YOUR DESCRIPTIONS TO BE LANGAUGE SPECIFIC

  ;Assign descriptions to sections
  !insertmacro MUI_FUNCTION_DESCRIPTION_BEGIN
    !insertmacro MUI_DESCRIPTION_TEXT ${SecWeb} "Php files to power slowjudge web end"
      !insertmacro MUI_DESCRIPTION_TEXT ${SecEval} "Backend to Evaluation solutions and Run contest. This folder also will store all the problem and IO and solutions."
  !insertmacro MUI_FUNCTION_DESCRIPTION_END

 
;--------------------------------
;Uninstaller Section

Section "Uninstall"
  Delete "$INSTDIR\Uninstall.exe"

  RMDir "$INSTDIR"
  RMDir /r "$WebDir"

  ;DeleteRegKey /ifempty HKCU "Software\slowjudge"
SectionEnd

;--------------------------------
;Uninstaller Functions

Function un.onInit

 !insertmacro MUI_UNGETLANGUAGE
  ReadRegStr $WebDir HKCU "Software\slowjudge" "webdir"
  
FunctionEnd