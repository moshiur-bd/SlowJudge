#include<stdio.h>
#include<string.h>
int main()
{
    char string[100];
    int l,i,k,T,j,cnt;
    scanf("%d",&T);
    j=1;
    while(T--)
    {
scanf("%d",&k);
    scanf("%s",string);
    l=strlen(string);

cnt=0;
    for(i=0;i<l;i++)
    {

        if(string[i]=='0')
        {
            cnt++;
        }
    }
    if(cnt>k)
        printf(":(\n");
    else
        printf(":D\n");
        j++;
    }
    return 0;
}
