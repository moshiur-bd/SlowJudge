#include<stdio.h>
#include<string.h>
int cmf(const void *a,const void*b)
{
    return (*(int*)a-*(int*)b);
}
int main()
{
    int n,m,t,i,j=0,cnt,max,a[10001];
    scanf("%d",&t);
    while(t--)
    {
        scanf("%d",&n);
        for(i=0; i<n; i++)
            scanf("%d",&a[i]);
        qsort(a,n,sizeof(int),cmf);
        cnt=1;
        max=0;
        for(i=1; i<n; i++)
        {
            if(a[i-1]==a[i])
            {
                cnt++;
            }
            else
                cnt=1;
            if(cnt>max)
                max=cnt;

        }
        printf("Case %d: %d\n",++j,max);
    }
    return 0;
}
