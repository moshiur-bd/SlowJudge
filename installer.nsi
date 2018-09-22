
OutFile "slowjudge.exe"

Var XamppDir
Var CoreDir
Var PartName
Name "$PartName"

PageEx directory
  PageCallbacks defaultXamppDir "" getXamppDir
  Caption "Provide Xampp location"
PageExEnd
PageEx directory
  PageCallbacks defaultSlowjudgeCoreDir "" getSlowjudgeCoreDir
  Caption ": Slowjudge core location"
PageExEnd
Page instfiles

Function defaultXamppDir
  StrCpy $INSTDIR "C:\xampp"
  StrCpy $PartName "Web end"
FunctionEnd

Function getXamppDir
  StrCpy $XamppDir $INSTDIR
FunctionEnd

Function defaultSlowjudgeCoreDir
  StrCpy $INSTDIR "C:\SlowJudge"
  StrCpy $PartName "Slowjudge Core"
FunctionEnd

Function getSlowjudgeCoreDir
  StrCpy $CoreDir $INSTDIR
FunctionEnd

Function .onInit
  StrCpy $PartName "Slowjudge Installer"
FunctionEnd

Section
  SetOutPath $XamppDir\htdocs\SlowJudge
  File /r "web-end\*"
  SetOutPath $CoreDir
  File /r "evaluator\*"
SectionEnd