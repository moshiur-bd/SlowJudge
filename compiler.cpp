#include<bits/stdc++.h>
using namespace std;

string id,nl="",lang,dir;

#define MAX_PATH 1000

#include <windows.h>//on windows


std::string getexepath()
{
  char result[ MAX_PATH ];
  string path=string( result, GetModuleFileName( NULL, result, MAX_PATH ) );
  while(path.size()&&path.back()!='/'&&path.back()!='\\'){
    path.pop_back();
  }
  return path;

}
bool dirExists(const std::string& dirName_in)
{
  DWORD ftyp = GetFileAttributesA(dirName_in.c_str());
  if (ftyp == INVALID_FILE_ATTRIBUTES)
    return false;  //something is wrong with your path!

  if (ftyp & FILE_ATTRIBUTE_DIRECTORY)
    return true;   // this is a directory!

  return false;    // this is not a directory!
}
bool fileExists(const char *fileName)
{
    std::ifstream infile(fileName);
    return infile.good();
}
///////////windows\\\\\\\\\\\\\\\

void cpp11(){
    system("gcc -c ..\\forbid.c -o ..\\forbid.o");
    freopen("build.log","w",stderr);
    system("g++.exe -std=c++11  -c Main.cpp -o Main.o");
    freopen("habijabi.txt","w",stderr);
    system("g++.exe -o Main.exe Main.o ..\\forbid.o");


}
void c(){
    system("gcc -c ..\\forbid.c -o ..\\forbid.o");
    freopen("build.log","w",stderr);
    system("gcc.exe -c Main.c -o Main.o");
    //freopen("habijabi.txt","w",stderr);
    system("g++.exe -o Main.exe Main.o ..\\forbid.o");

}
void cpp(){
    system("gcc -c ..\\forbid.c -o ..\\forbid.o");
    freopen("build.log","w",stderr);
    system("g++.exe  -c Main.cpp -o Main.o");
    freopen("habijabi.txt","w",stderr);
    system("g++.exe -o Main.exe Main.o ..\\forbid.o");

}
void java(){

}
int main(int argc ,char *argv[] ){
    dir=getexepath();

    if(argc==2){
        lang=argv[1];
        if(fileExists("Main.cpp")||fileExists("Main.c")||fileExists("Main.java"))
            cout<<"source found";
        else return 100;

        if(fileExists("Main.exe"))
            return 0;

        freopen("build.log","w",stderr);
        if(lang=="1")
            c();
        else if(lang=="2")
            cpp();
        else if(lang=="3")
            cpp11();
        else if(lang=="4")
            java();

    }
    else cerr<<"Too Few arguments\n";
    if(fileExists("Main.exe")||fileExists("Main.class"))
            return 0;//AC

    return -2;//CE
}
