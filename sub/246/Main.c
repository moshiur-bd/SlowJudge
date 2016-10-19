#include<stdio.h>
#include<string.h>
int bnrysrch(int [],int,int);
int cmf(const void *a,const void*b)
{
    return (*(int*)a-*(int*)b);
}
int a[1000001];
int main()
{
    int n,m,t,i,j=0,cnt,max;
    scanf("%d%d",&n,&m);
    for(i=1; i<=n; i++)
        {
            scanf("%d",&a[i]);
            a[i]+=a[i-1];
        }
    for(j=1;j<=m;j++)
    {
        scanf("%d",&t);
        if(a[n]<t)
        {
            printf("-1\n");
        }
        else
        printf("%d\n",bnrysrch(a,n,t));
    }
    return 0;
}
int bnrysrch(int a[],int n,int k)
{
    int l=1,r=n,mid;
    while(l<=r)
    {
        mid=(l+r)/2;
        if(a[mid]>k)
        {
            r=mid-1;
        }
        else if(a[mid]<k)
        {
            l=mid+1;
        }
        else
            return mid;
    }
}
