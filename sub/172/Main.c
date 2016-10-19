#include<stdio.h>
int main()
{
    long long i,a,b,t;
    scanf("%I64d",&t);
    for(i=1; i<=t; i++){
        scanf("%I64d%I64d",&a,&b);
        a=(a+b)*(a+b);
        printf("Case %I64d: %I64d\n",i,a);
    }
    return 0;
}
