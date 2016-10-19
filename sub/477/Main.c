#include<stdio.h>
int main()
{
    int T;
    unsigned long long A,B;
    scanf("&d",&T);
    while(T--)
    {
        scanf("%llu %llu",&A,&B);
        printf("%llu\n",(A*A + B*B + 4*A*B - 3*A*B - 2*A*B - 1*A*B));

    }
    return 0;
}

