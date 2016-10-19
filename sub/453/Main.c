#include<stdio.h>
int main()
{
    long long A,B,ans,T,i;
    scanf("%lld",&T);
    for(i=1;i<=T;i++)
    {
    scanf("%lld%lld",&A,&B);
    ans=(A-B)*(A-B);
    printf("%lld\n",ans);
    }
    return 0;
}
