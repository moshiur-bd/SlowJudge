#include<stdio.h>
int main()
{
    int a1,a2,b1,b2,c1,c2,a,b,i,t;
    scanf("%d",&t);
    for(i=1; i<=t; i++)
    {
        scanf("%d%d%d",&a1,&b1,&c1);
        printf("\n");
        scanf("%d%d%d",&a2,&b2,&c2);
        if(a1+a2&&b1-b2)
        {
            a=(c1+c2)/2;
            b=(c1-c2)/2;
            printf("Case %d:\n%d %d",i,a,b);
        }

        else if(a1-a2&&b1+b2)
        {
            a=(c1+c2)/2;
            b=(c1-c2)/2;
            printf("Case %d:\n%d %d",i,a,b);
        }

    }

}
