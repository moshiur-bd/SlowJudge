#include<bits/stdc++.h>
using namespace std;

int main(int argc, char *argv[]){
    ///write anything in stderr file. that will be displayed as checker's message!
    if(argc<4){
        cerr<<"argument count: "<<argc<<".\n4 expected!";
        return 101;
    }

    FILE *fin=fopen(argv[1],"r"); ///input file-pointer
    FILE *fout=fopen(argv[2],"r"); ///output file-pointer
    FILE *fans=fopen(argv[3],"r"); ///answer file-pointer

    ///write instructions here //


    /// / //////////////////////

    int verdict=0; ///0 or 2 or 3
    printf("%d\n",verdict); ///write checker decision in stdout file. print
                    /// 0 if AC
                    /// 2 if WA
                    /// 3 if PE

    fclose(fin);
    fclose(fout);
    fclose(fans);
    fclose(stdout);
    fclose(stderr);
    return 0;
}

