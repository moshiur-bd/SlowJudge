#include<stdio.h>
int main()
{
    long A,B,C;
    int T,i;
    scanf("%d",&T);
    for(i=0; i<=T; i++)
    {
        scanf("%ld%ld",&A,&B);
        if(A<B)
        {
            C=B-A;
            printf("%ld\n",C);

        }

        else
        {
            C=A-B;
            printf("%ld\n",C);

        }




    }
    return 0;
}
