#include<bits/stdc++.h>
#include<windows.h>
using namespace std;
int main(){
        system("start /SEPARATE /MIN C:\\xampp\\mysql\\bin\\mysqld.exe");
        Sleep(10000);
        system("start /B /SEPARATE /MIN /D C:\\xampp\\htdocs\\SlowJudge\\manage  C:\\xampp\\php\\php.exe  Autorun.php ");
        system("start /SEPARATE /MIN C:\\xampp\\apache\\bin\\httpd.exe");

        return 0;
}
