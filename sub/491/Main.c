#include<stdio.h>
int main()
{
    long long A,B,sum;
    int T,i;
    scanf("%d",&T);
    for(i=0;i<T;i++)
    {
        scanf("%lld%lld",&A,&B);
        sum=A*A+B*B+4*A*B-3*A*B-2*A*B-1*A*B ;
        printf("%lld\n",sum);
    }
    return 0;
}
