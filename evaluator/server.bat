set path=%path%;C:\Program Files\Java\jdk1.8.0_102\bin;C:\Program Files (x86)\CodeBlocks\MinGW\bin;

set slowjudgeback=%~dp0
set classpath=%slowjudgeback%;%slowjudgeback%mysql-connector-java-5.0.8-bin.jar;

start C:\xampp\mysql_start.bat
start C:\xampp\apache_start.bat

timeout /t 20

start /SEPARATE /MIN /D C:\SlowJudge\ "" java Judge C:\SlowJudge\ slowjudge-contest-engine slowjudge-contest-
