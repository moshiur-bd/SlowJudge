#include<stdio.h>
int main()
{
    long long a,b,t,c;
    scanf("%I64d",&t);
    while(t--){
        scanf("%I64d%I64d",&a,&b);
        c=(a-b)*(a-b);
        printf("%I64d\n",c);
    }
    return 0;
}
