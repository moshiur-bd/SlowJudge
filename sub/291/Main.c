#include<stdio.h>
#include<stdlib.h>
#include<string.h>
int cmf(const void*a,const void*b)
{
    return (*(int*)a-*(int*)b);
}
int a[10001],b[10001];
int main()
{
    long long n,t,z,i,sum,k=0;
    scanf("%lld",&t);
    while(t--)
    {
        scanf("%lld %lld",&n,&z);
        sum=(n-z)*(n-z);
        printf("%lld\n",sum);
    }
    return 0;
}
