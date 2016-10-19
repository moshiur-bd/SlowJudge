#include<stdio.h>
int main()
{
    int T,a,b,i,cnt,j;
    scanf("%d",&T);
    for(i=1;i<=T;i++)
    {
        scanf("%d%d",&a,&b);
        cnt=0;
        for(j=a;j<=b;j++)
        {
            if(j%100==0||j%400==0||j%4==0)
            {
                cnt++;


            }

        }
        printf("%d",cnt);


    }
    return 0;
}
