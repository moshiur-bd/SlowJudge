set path=%path%;C:\Program Files\Java\jdk1.8.0_102\bin;C:\Program Files (x86)\CodeBlocks\MinGW\bin;

SET mypath=%~dp0

CD %mypath%

javac Judge.java
javac Timer.java

mingw32-g++.exe   -c watcher.cpp -o watcher.o
mingw32-g++.exe  -o watcher.exe watcher.o

mingw32-g++.exe   -c cpu.cpp -o cpu.o
mingw32-g++.exe  -o cpu.exe cpu.o 

mingw32-g++.exe -std=c++11  -c compiler.cpp -o compiler.o
mingw32-g++.exe  -o compiler.exe compiler.o

mingw32-g++.exe   -c checker\TrailingWhiteSpaceAllowed.cpp -o checker\TrailingWhiteSpaceAllowed.o
mingw32-g++.exe  -o checker\TrailingWhiteSpaceAllowed.exe checker\TrailingWhiteSpaceAllowed.o

