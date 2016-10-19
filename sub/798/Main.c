#include<stdio.h>
int main()
{
    int T,i,j,k,n,temp;
    scanf("%d",&T);
    while(T--)
    {
        scanf("%d",&n);
        int a[n];
        for(i=0; i<n-1; i++)
        {
            for(j=0; j<n-1-i; j++)
                if(a[j]>a[j+1])
                {
                    temp=a[j];
                    a[j]=a[j+1];
                    a[j+1]=temp;
                }
        }
        for(k=0;k<n;k++)
        {
            printf("%d",a[k]);
        }
    }
}
