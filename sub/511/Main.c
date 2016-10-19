#include<stdio.h>
int main()
{
    long long int t,a,b,c;
    scanf("%lld", &t);
    while(t--)
    {
        scanf("%lld %lld", &a, &b);
        c=(a-b)*(a-b);
        printf("%lld\n", c);
    }
    return 0;
}
