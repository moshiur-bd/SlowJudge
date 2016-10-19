#include<stdio.h>
int main()
{
    int T,A,B,i;
    scanf("%d",&T);
    for(i=1; i<=T; i++)
    {
        scanf("%d%d",&A,&B);
        if(A>B)
        {
            printf("%d\n",A-B);
        }
        else if(B>A)
        {
            printf("%d\n",B-A);
        }
        else
            break;

    }

    return 0;
}
