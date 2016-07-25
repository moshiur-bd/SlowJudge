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
    system("gcc -c forbid.c");
    //system((((((nl+"g++.exe -std=c++11  -c "+dir+"sub\\")+id)+"\\Main.cpp -o "+dir+"sub\\")+id)+"\\Main.o").c_str());
    freopen((dir+"sub\\"+id+"\\build.txt").c_str(),"w",stderr);
    system((((((("g++.exe -std=c++11  -c "+nl+"sub\\")+id)+"\\Main.cpp -o ")+"sub\\")+id)+"\\Main.o").c_str());
    system((((((nl+"g++.exe  -o  sub\\")+id)+"\\Main.exe sub\\")+id)+"\\Main.o "+dir+"forbid.o ").c_str());
    system(("del /f /q "+dir+"sub\\"+id+"\\Main.o").c_str());
}
void c(){

}
void cpp(){

}
void java(){

}
int main(int argc ,char *argv[] ){
    dir=getexepath();

    if(argc==3){
        lang=argv[1];
        id=argv[2];
        if(fileExists(("sub\\"+id+"\\Main.cpp").c_str())||fileExists(("sub\\"+id+"\\Main.java").c_str())||fileExists(("sub\\"+id+"\\Main.c").c_str()))
            cout<<"source found";
        else return 100;

        if(fileExists(("sub\\"+id+"\\Main.exe").c_str()))
            return 0;

        freopen((dir+"sub\\"+id+"\\build.txt").c_str(),"w",stderr);
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
    cerr<<"END\n";
    if(fileExists(("sub\\"+id+"\\Main.exe").c_str())||fileExists(("sub\\"+id+"\\Main.class").c_str()))
            return 0;

    return -2;
}
