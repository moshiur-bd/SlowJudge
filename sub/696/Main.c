#include<stdio.h>
int main()
{
    long long T,A,B,i;
    scanf("%lld",&T);
    for(i=1; i<=T; i++)
    {
        scanf("%lld%lld",&A,&B);
        if(A==B)
            printf("");
        else if(A>B)
        {
            printf("%lld\n",A-B);
        }
        else
        {
            printf("%lld\n",B-A);
        }
    }
    return 0;
}
