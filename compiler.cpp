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

void cpp11(){
    system((((((nl+"g++.exe -std=c++11  -c "+dir+"sub\\")+id)+"\\Main.cpp -o "+dir+"sub\\")+id)+"\\Main.o").c_str());
    system((((((nl+"g++.exe  -o "+dir+"sub\\")+id)+"\\Main.exe "+dir+"sub\\")+id)+"\\Main.o ").c_str());
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
    system("cd");
    cout<<argv[0]<<endl;
    if(argc==3){
        lang=argv[1];
        id=argv[2];
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
    else cerr<<"WTF\n";
    cerr<<"END\n";
    //cout<< lang<<" " <<id<<" "<<argc<<endl;
    //while(1);

    return 0;
}
