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
        }
        else
        {
            sum=B-A;
        }
        printf("%d\n",sum);
    }
    return 0;
}
