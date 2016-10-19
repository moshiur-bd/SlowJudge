#include<stdio.h>
int main()
{
    long long T,A,B,C,i;
    scanf("%lld",&T);
    for(i=1; i<=T; i++)
    {
        scanf("%lld %lld",&A,&B);
        C=(A-B)*(A-B);
        printf("%lld\n",C);
    }


    return 0;
}
