#include<stdio.h>
#include<string.h>
int main()
{
    char string[30];
    int i,k,T,j,cnt,l;
    scanf("%d",&T);
   for(j=1;j<=T;j++)
    {
scanf("%d",&k);
    scanf("%s",string);
    l=30;
    cnt=0;
    for(i=0;i<l;i++)
    {


        if(string[i]=='0')
        {
            cnt++;
        }
    }
    if(cnt<k)
        printf(":D\n");
    else
        printf(":(\n");

    }
    return 0;
}
