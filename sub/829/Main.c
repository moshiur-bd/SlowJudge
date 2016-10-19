#include<stdio.h>
#include<string.h>
#include<stdlib.h>
#include<math.h>
int a[10001];
int main()
{
    int t,i,j,k,h,sum,r;
    char ch[100001],alp[100001];
    scanf("%d",&t);
    while(t--)
    {
        sum=0;
        r=0;
        memset(ch,0,sizeof(ch));
        memset(a,0,sizeof(a));
        scanf("%s",ch);
        for(i=0; ch[i]; i++)
        {
                sum=sum+(ch[i]-64);
                if(sum>=26)
                {
                    alp[r++]=90;
                    sum=sum-26;
                }
                //printf("%d %d\n",sum,r);
        }
        if(sum)
            alp[r++]=sum+64;
            //printf("%d %d\n",sum,r);
            for(i=r-1;i>=0;i--)
                {
                    printf("%c",alp[i]);
                }
        printf("\n");

    }
}
