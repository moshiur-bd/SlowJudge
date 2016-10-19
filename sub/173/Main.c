#include<stdio.h>
int main()
{
    long long i,a,b,c,d,t;
    scanf("%I64d",&t);
    for(i=1; i<=t; i++){
        c=0;
        scanf("%I64d",&a);
        d=a;
        while(d){
            c++;
            d/=10;
        }
        b=(1<<(c+1))-1;
        printf("Case %I64d: %I64d\n",i,a^b);
    }
    return 0;
}
