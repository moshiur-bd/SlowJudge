#include<stdio.h>
int main()
{
    long long T,A,B,i;
    scanf("%lld",&T);
    for(i=1; i<=T; i++)
    {
        scanf("%lld%lld",&A,&B);
        if(A>B)
        {
            printf("%lld\n",A-B);
        }
        else if(B>A)
        {
            printf("%lld\n",B-A);
        }
        else
            break;

    }

    return 0;
}
