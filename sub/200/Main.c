#include<stdio.h>
int main()
{
    long long a,b,c;
    int i,t;
    scanf("%d",t);
    for(i=1; i<t; i++)
    {
        scanf("%lld%lld",&a,&b);
        c=(a+b)*(a+b);
        printf("Case %d:%lld\n",i,c);
    }
    return 0;
}


