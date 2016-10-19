#include<stdio.h>
#include<string.h>
int main()
{
    char string[30];
    int i,k,T,j,cnt;
    scanf("%d",&T);
    j=1;
    while(T--)
    {
scanf("%d",&k);
    scanf("%s",string);
    cnt=0;
    for(i=1;i<=30;i++)
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
        j++;
    }
    return 0;
}
