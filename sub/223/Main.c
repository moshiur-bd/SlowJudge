#include<stdio.h>
int main()
{
    long long T,a,b,i,ans;
    scanf("%lld",&T);
    for(i=1;i<=T;i++)
    {
        scanf("%lld%lld",&a,&b);
        ans=(a+b)*(a+b);
        printf("Case %lld: %lld\n",i,ans);
    }
    return 0;
}
