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
            //a[ch[i]]++;
            if(sum+(ch[i]-64)<=26)
                sum=sum+(ch[i]-64);
            else
            {
                    alp[r++]=sum+64;
                    sum=ch[i]-64;
            }
        }
        if(sum!=0)
            alp[r]=sum+64;
            for(i=r;i>=0;i--)
                printf("%c",alp[i]);
        printf("\n");
        /*for(i=65; i<=90; i++)
        {
            if(a[i])
            {
                h=a[i];
                if(h>1)
                {
                    a[i+h-1]++;

                    a[i]=0;
                }

            }
        }
        j=65;
        while(j<=90)
        {
            if(a[j]--)
            {
                printf("%c\n",j);
            }
            j++;
        }*/
    }
}
