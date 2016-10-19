#include<stdio.h>
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
        int a,b,sum;
        scanf("%d%d",&a,&b);
        sum=(a*a)+(b*b)+(4*a*b)-(3*a*b)-(2*a*b)-(a*b);
        printf("%d",sum);
    }
    return 0;
}
