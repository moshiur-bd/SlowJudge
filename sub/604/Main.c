#include<stdio.h>
int main()
{
    int T,sum;
    unsigned A,B;
    scanf("%d",&T);
    while(T--)
    {
        scanf("%d%d",&A,&B);
        sum=abs(A-B);
        printf("%d\n",sum);
    }
    return 0;
}
