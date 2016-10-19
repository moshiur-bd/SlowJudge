#include<stdio.h>
int main()
{
    long long A,B,C;
    int t,i;
    scanf("%d",&t);
    for(i=0; i<=t; i++)
    {
        scanf("%lld%lld",&A,&B);
        if(A<B)
        {
            C=B-A;
            printf("%lld\n",C);
        }

        else
        {
            C=A-B;
            printf("%lld\n",C);
        }



    }
    return 0;
}
