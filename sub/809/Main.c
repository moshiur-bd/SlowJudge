#include<stdio.h>
#include<math.h>
int main()
{
    int i,j,n,T,k,sum;
    scanf("%d",&T);
    while(T--)
    {
        sum=0;
        scanf("%d",&n);
        int a[n][n];
        for(i=0; i<n; i++)
        {
            for(j=0; j<n; j++)
                scanf("%d",&a[i][j]);
        }
        for(i=0; i<n; i++)
        {
            for(j=0; j<n; j++)
                if(i>=j&&(i-j)<=1)
                {
                    sum=sum+a[i][j];
                }
        }
        printf("%d\n",sum);
    }
    return 0;
}
