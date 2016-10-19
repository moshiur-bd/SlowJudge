#include<stdio.h>
#include<stdlib.h>
#include<string.h>
int main()
{
    int t, c;
    scanf("%d",&t);
    while(t--){
    char s[10000];
    scanf("%s",&s);
    int p,i,sum=0;
    p=strlen(s);

for(i=0;i<p;i++)
{
    sum=s[i]+sum-64;
}
int v=26;
while(sum!=0)
{
    if(sum%v>=0)
    {
    int r=0;
    r=sum/v;

    while(r--)
        printf("%c",v+64);
    sum=sum%v;

      }
      v--;
}


printf("\n");
    }
    return 0;
}
