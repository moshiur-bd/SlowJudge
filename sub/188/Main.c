#include<stdio.h>
int main()
{
    long long n,m,t,i=0;
    scanf("%lld",&t);
    while(t--)
    {
        scanf("%lld %lld",&n,&m);
        printf("Case %lld: %lld",++i,((n+m)*(n+m)));
    }
    return 0;
}
