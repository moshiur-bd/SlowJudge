#include<stdio.h>
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
        long int a,b,sum;
        scanf("%ld%ld",&a,&b);
        sum=(a*a)+(b*b)+(4*a*b)-(3*a*b)-(2*a*b)-(a*b);
        printf("%ld\n",sum);
    }
    return 0;
}
