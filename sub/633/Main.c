#include<stdio.h>
int main()
{
    long int A,B,C;
    int t,i;
    scanf("%d",&t);
    for(i=0; i<=t; i++)
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
