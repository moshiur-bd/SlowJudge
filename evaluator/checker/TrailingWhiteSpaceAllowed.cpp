#include<bits/stdc++.h>
using namespace std;
const int MAXL=2000000;
char out[MAXL+10],ans[MAXL+10];
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
    int verdict=0;
    int lineNo=0;
    while(fgets(ans,MAXL,fans)){
        fgets(out,MAXL,fout);
        int la=strlen(ans);
        while(la>0&&isspace(ans[la-1]))
            ans[--la]=NULL;

        int lo=strlen(out);
        while(lo>0&&isspace(out[lo-1]))
            out[--lo]=NULL;

        if(lo!=la||strcmp(ans,out)!=0) {
            cerr<<"error in line : "<<lineNo<<"\n";
            cerr<<"ans vs out:\n"<<ans<<"\n"<<out<<endl;
            verdict =2;
            break;
        }
        lineNo++;

    }

    if(verdict==0)
        while(fgets(out,MAXL,fout)){
            for(int i=0;out[i];i++)
                if(!isspace(out[i])){
                    verdict =2;
                    cerr<<"output file contains more character than answer file!\n";
                    break;
                }
            if(verdict!=0) break;

        }



    /// / //////////////////////


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

