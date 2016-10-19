#include<stdio.h>
#include<string.h>
#include<stdlib.h>
#include<math.h>
int main()
{
    long long n,k,t,i,j,sum,h,a[300][300];
    scanf("%lld",&t);
    while(t--)
    {
        h=1;
        scanf("%lld",&n);
        for(i=1; i<=n; i++)
        {
            for(j=1; j<=n; j++)
            {
                scanf("%lld",&a[i][j]);
            }
        }
        sum=a[1][1];
        for(i=1; i<=n; i++)
        {
            for(j=h; j<=n; j++)
            {
                if(a[i][j+1]>a[i+1][j])
                {
                    sum+=a[i][j+1];
                }
                else if(a[i][j+1]<a[i+1][j])
                {
                    sum=sum+a[i+1][j];
                    h=j;
                    break;
                }
                else
                {
                    if(a[i+2][j]>a[i][j+2])
                    {
                        sum+=a[i+1][j];
                        h=j;
                        break;
                    }
                    else
                    {
                        sum+=a[i][j+1];
                    }
                }
            }
        }
        printf("%lld\n",sum);
    }
    return 0;
}
