#include<stdio.h>
int main()
{
    long long i,a;
    long long b;
    int t;
    scanf("%d",&t);
    for(i=0; i<t; i++)
    {
        long long res;
        scanf("%lld%lld",&a,&b);
        res=(a*a)+(2*a*b)+(b*b);
        printf("Case %lld: %lld\n",i+1,res);
    }
    return 0;
}
