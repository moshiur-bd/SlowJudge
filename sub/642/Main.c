#include<stdio.h>
int main()
{
    int T,A,B,i;
    scanf("%d",&T);
    for(i=1; i<=T; i++)
    {
        scanf("%d%d",&A,&B);
        if(A==B)
            break;
        else if(A>B)
        {
            printf("%d\n",A-B);
        }
        else
        {
            printf("%d\n",B-A);
        }

    }

    return 0;
}
