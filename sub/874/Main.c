#include<stdio.h>
int main()
{
    int T,i,j,ara[100],n,sum,max,k,temp;
    max=1;
    scanf("%d",&T);
    for(i=1;i<=T;i++)
    {
        scanf("%d",&n);
        for(j=0;j<n;j++)
        {
            scanf("%d",&ara[j]);
        }


    for(j=0;j<n;j++)
        {
            sum=ara[j]+ara[j-1];
        }

        if(sum>max)


        printf("%d",sum);
    }
    return 0;
}
