#include<stdio.h>
int main()
{
    int N,x,i,j;
    while(scanf("%d",&N)==1)
    {
        if(N==0)
            break;
        else
        {
            for(i=N; i>1; i++)
            {
                if(N%i==0)
                {
                    printf("%d\n",i);
                    break;
                }
            }
        }
    }
    return 0;
}
