#include<stdio.h>
int main()
{
    int A,B,T,sum;
    scanf("%d",&T);
    while(T--)
    {
        scanf("%d%d",&A,&B);
        if(A>B)
        {
            sum=A-B;
            printf("%d",sum);
        }
        else if(B>A)
        {
            sum=B-A;
            printf("%d",sum);
        }
        else if(A==0&&B==0)
        {
            printf("");
        }
    }
    return 0;
}
