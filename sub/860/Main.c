#include<stdio.h>
int main()
{
    int A,B,C,T;
    scanf("%d",&T);
    while(T--)
    {
        scanf("%d%d",&A,&B);
        if(A<B)
            C=B-A;
        else
            C=A-B;
        if(C!=0)
            printf("%d\n",C);
    }


    return 0;
}
