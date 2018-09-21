#include<bits/stdc++.h>
using namespace std;


#define MAX 5123456
char a[5123456],o[5123456];

int main(int argc, char *argv[]){

    if(argc<4)
        cerr<<"arguments count: "<<argc<<".\n4 expected!";
    FILE *fout=fopen(argv[2],"r");
    FILE *fans=fopen(argv[3],"r");




    int ret=0;
    char *ra=NULL,*ro=NULL;
    while(1)
    {
        ro=fgets(o,MAX,fout);
        ra=fgets(a,MAX,fans);
        if(!ra&&!ro)break;
        if(!ra)ret=2;
        if(!ro)ret =2;
        if(strcmp(a,o)) ret=2;
        if(ret==2) break;
    }
    if(ret==0){
        printf("0");
        return 0;
    }
    ret=3;

    fclose(fout);
    fclose(fans);

    fout=fopen(argv[2],"r");
    fans=fopen(argv[3],"r");
    int Ro,Ra;
    while(1){

        Ro=fscanf(fout,"%s",o);
        Ra=fscanf(fans,"%s",a);
        if(Ra==EOF&&Ro==EOF)break;
        if(Ra==EOF)ret=2;
        if(Ro==EOF)ret =2;
        if(strcmp(a,o)) ret=2;
        if(ret==2) break;
    }


    printf("%d\n",ret);
    if(ret==0)cerr<<"ok";
    else cerr<<"not ok";
    fclose(fout);
    fclose(fans);

    cerr<<"sucessfully cheked!";

    return 0;
}

