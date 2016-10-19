#include<stdio.h>
int main()
{
    long long A,B,T,i,j,sum;
    scanf("%lld",&T);
    for(i=0;i<T;i++)
    {
        scanf("%lld%lld",&A,&B);
        sum=A*A+B*B+4*A*B-3*A*B-2*A*B-1*A*B ;
        printf("%lld",sum);
    }
}
