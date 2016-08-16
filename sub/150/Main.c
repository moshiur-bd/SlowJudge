#include<stdio.h>
#include<assert.h>
char s[100*101+2];
int main(){

    int TC,tc,i;
    scanf("%d",&TC);
    getchar();
    assert(TC>=1&&TC<=10);//checks IO validity
    for(tc=1;tc<=TC;tc++){

        gets(s);
       // assert(strlen(s)>=0&&strlen(s)<=(100*101+1));//checks IO validity

        for(i=0;s[i];i++)
            if(s[i]==',')
                s[i]=' ';
        s[i-1]=NULL;
        puts(s+1);
    }
    return 0;
}
