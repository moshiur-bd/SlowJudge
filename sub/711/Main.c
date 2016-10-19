#include<stdio.h>
int main()
{
    int T,sum;
    unsigned A,B;
    scanf("%d",&T);
    while(T--)
    {
        scanf("%d%d",&A,&B);
        if(A>B)
        {
            sum=A-B;
        }
        else if(A<B)
        {
            sum=B-A;
        }
        printf("%d\n",sum);
    }
    return 0;
}
