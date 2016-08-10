#include<bits/stdc++.h>
#include<windows.h>
using namespace std;
HANDLE runProgram(char cmd[])
{

    //snprintf(cmd, sizeof(cmd), "D:\\ffpmeg\bin\ffmpeg.exe -i D:\\video.mpg -r 10 D:\\frames");

    PROCESS_INFORMATION pi = {0};
    STARTUPINFO si = {0};
    //new addition
    /*si.dwFlags |= STARTF_USESTDHANDLES;
    si.hStdInput = GetStdHandle(STD_INPUT_HANDLE);
    si.hStdOutput = GetStdHandle(STD_OUTPUT_HANDLE);
    si.hStdError = GetStdHandle(STD_ERROR_HANDLE);*/
    /////
    si.cb = sizeof(STARTUPINFO);
    if (CreateProcess(NULL, cmd, NULL, NULL, TRUE, 0, NULL, NULL, &si, &pi))
    {
        CloseHandle(pi.hThread);
        return pi.hProcess;
    }
    return NULL;
}
long long cputimer(HANDLE hnd)
{
    FILETIME createTime;
    FILETIME exitTime;
    FILETIME kernelTime;
    FILETIME userTime;

    if(hnd==NULL){
        cerr<<"process is not running!";
        return 0.000;
    }
    if ( GetProcessTimes( hnd,
        &createTime, &exitTime, &kernelTime, &userTime ) != -1 )
    {
        SYSTEMTIME userSystemTime;
        if ( FileTimeToSystemTime( &userTime, &userSystemTime ) != -1 )
            return (long long)1000.0*((double)userSystemTime.wHour * 3600.0 +
            (double)userSystemTime.wMinute * 60.0 +
            (double)userSystemTime.wSecond +
            (double)userSystemTime.wMilliseconds / 1000.0);
    }
}
int maxTime=400000;
int main(int argc,char *argv[]){
    if(argc<=4) return -2;
    cerr<<argv[1]<<endl;
    cerr<<argv[2]<<endl;
    cerr<<argv[3]<<endl;
    cerr<<argv[4]<<endl;


     HANDLE hand = runProgram(argv[1]);
     long long tl=atol(argv[2]);
    long long ml=atol(argv[3]);
     freopen(argv[4],"w",stderr);
    long long clk=clock();

    if(hand != NULL)
    {
        while (WAIT_TIMEOUT == WaitForSingleObject(hand, 100))
        {
            if(cputimer(hand)>tl)break;
            if((clock()-clk)>maxTime) break;//is it ok?

        }
        DWORD code;
        GetExitCodeProcess(hand,&code);
        if(code==STILL_ACTIVE){
            TerminateProcess(hand,1);
        }

        GetExitCodeProcess(hand,&code);
        cerr<<cputimer(hand)<<endl;
        cerr<<code<<endl;

        // close the handle no matter what else.
        CloseHandle(hand);
    }
    return 0;
}
