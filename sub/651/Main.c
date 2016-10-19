#include<stdio.h>
int main()
{
    int T,A,B;
    scanf("%d",&T);
    while(T--)
    {
        scanf("%d %d",&A,&B);
        if(A>B)
        printf("%d\n",A-B);
        else
        printf("%d\n",B-A);

    }

}
