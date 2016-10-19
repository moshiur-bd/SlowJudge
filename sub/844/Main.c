#include<stdio.h>
int main()
{
    long long int A,B,C;
    int T,i;
    scanf("%d",&T);
    for(i=0; i<=T; i++)
    {
        scanf("%lld%lld",&A,&B);
        if(A<B)
        {
            C=B-A;
        }
        else
        {
            C=A-B;
        }
        if(C!=0)
            printf("%lld\n",C);
    }


    return 0;
}
