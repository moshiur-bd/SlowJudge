#include<stdio.h>
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
        long long a,b,sum;
        scanf("%lld%lld",&a,&b);
        sum=(a*a)+(b*b)+(4*a*b)-(3*a*b)-(2*a*b)-(a*b);
        printf("%lld\n",sum);
    }
    return 0;
}
