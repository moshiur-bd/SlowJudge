#include<stdio.h>
int main()
{
    int N,X=0,i,max=1;
    while(scanf("%d",&N)!=0)
    {
        if(N==0)
            return 0;
        for(i=1;i<=N;i++)
        {
            if(N%i==0)
            {
                X++;
            }

        }
        if(X>max)
            max=X;
        printf("%d\n",max);

    }
    return 0;
}
