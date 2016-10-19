#include<stdio.h>
int main()
{
    int T,A,B,sum;
    scanf("%d",&T);
    while(T--)
    {
        scanf("%d%d",&A,&B);
        sum=abs(A-B);
        printf("%d\n",sum);
    }
}
