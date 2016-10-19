#include<stdio.h>
int main()
{
    long long T,a,b,i,j,sum;
    scanf("%lld",&T);
    for(i=1;i<=T;i++)
    {
        scanf("%lld%lld",&a,&b);
        sum=(a+b)*(a+b);
        printf("Case %lld: %lld\n",i,sum);
    }
    return 0;
}
