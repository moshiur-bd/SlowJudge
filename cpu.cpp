#include<bits/stdc++.h>
#include<windows.h>
#include <tlhelp32.h>

using namespace std;

HANDLE GetProcessByName(char* name)
{
    DWORD pid = 0;

    // Create toolhelp snapshot.
    HANDLE snapshot = CreateToolhelp32Snapshot(TH32CS_SNAPPROCESS, 0);
    PROCESSENTRY32 process;
    ZeroMemory(&process, sizeof(process));
    process.dwSize = sizeof(process);

    // Walkthrough all processes.
    if (Process32First(snapshot, &process))
    {
        do
        {
            // Compare process.szExeFile based on format of name, i.e., trim file path
            // trim .exe if necessary, etc.
            if (!strcmp((char*)process.szExeFile,(char*) name))
            {
               pid = process.th32ProcessID;
               break;
            }
        } while (Process32Next(snapshot, &process));
    }

    CloseHandle(snapshot);

    if (pid != 0)
    {
         return OpenProcess(PROCESS_ALL_ACCESS, FALSE, pid);
    }

    // Not found


       return NULL;
}

double cputimer(HANDLE hnd)
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
            return (double)userSystemTime.wHour * 3600.0 +
            (double)userSystemTime.wMinute * 60.0 +
            (double)userSystemTime.wSecond +
            (double)userSystemTime.wMilliseconds / 1000.0;
    }
}

int main(int argc, _TCHAR* argv[])
{
    double start, stop;
    long sum = 0L;

    HANDLE hand=GetProcessByName("a.exe" );
    start = cputimer(hand);

    while(1){

    for (long long i = 1; i < 10000000; i++){
        sum += log((double)i);
    }
    stop = cputimer(hand);
        printf("Time taken: %f [seconds]\n", stop - start);
    }
    return 0;
}













int amain(){
    FILETIME a,b,c,d;
    GetProcessTimes(GetProcessByName("cpu.exe"),&a,&b,&c,&d);

    while(1){
        //printf("%lld\n",(((long long)c)/1000000000ll));
        Sleep(500);
    }
    return 0;
}
