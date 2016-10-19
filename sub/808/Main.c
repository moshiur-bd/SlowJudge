#include<stdio.h>
#include<math.h>
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
