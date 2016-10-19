
#include <stdio.h>
int main()
{
    long long a,b;
    int i,n;
    scanf("%d",&n);
    for(i=1;i<=n;i++)
    {
        scanf("%lld%lld",&a,&b);
        long long p=(a*a)+(b*b)+(4*a*b)-(3*a*b)-(2*a*b)-(1*a*b);
        printf("%lld",p);
    }
    return 0;
}

