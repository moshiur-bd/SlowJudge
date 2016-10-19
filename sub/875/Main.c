#include<stdio.h>
#include<math.h>
int main()
{
    int n,sum,a[100001],t,i,max;
    scanf("%d",&t);
    while(t--)
    {
        sum=0;
        max=0;
        scanf("%d",&n);
        for(i=1; i<=n; i++)
        {
            scanf("%d",&a[i]);
            if(a[i]>0)
                sum=sum+a[i];
            else if(a[i]==0)
            {
                if(sum>max)
                    max=sum;
            }
            else
            {
                if(abs(a[i])>sum)
                    sum=0;
                else
                    sum=sum+a[i];
            }
            //printf("%d ",sum);
        }
        if(!(max))
            max=sum;
        printf("%d\n",max);
    }
    return 0;
}
