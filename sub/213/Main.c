#include<stdio.h>
int main()
{
   unsigned long long int a,b,c;
    int i,t;
    scanf("%d",t);
    for(i=1; i<=t; i++)
    {
        scanf("%llu%llu",&a,&b);
        c=(a+b)*(a+b);
        printf("Case %d: %llu\n",i,c);
    }
    return 0;
}


