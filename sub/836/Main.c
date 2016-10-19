#include<stdio.h>
int main()
{
    int i,j,n,T,k,sum;
    scanf("%d",&T);
    while(T--)
    {
        sum=0;
        scanf("%d",&n);
        int a[n][n];
        for(j=0; j<n; j++)
        {
            for(i=0; i<n; i++)
                scanf("%d",&a[j][i]);
        }
        for(j=0; j<n; j++)
        {
            for(i=0; i<n; i++)
                if(j>=i&&(j-i)<=1)
                {
                    sum=sum+a[j][i];
                }
        }
        printf("%d\n",sum);
    }
    return 0;
}
