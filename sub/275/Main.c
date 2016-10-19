#include<stdio.h>
#include<string.h>

int main()
{
    int ara[1000];
   int cnt=1,i,T,n,j,max=1;
    scanf("%d",&T);
    i=1;
    while(T--)
    {
        scanf("%d",&n);
        for(j=0;j<n;j++)
        {
            scanf("%d",&ara[j]);
        }
        for(j=1;j<n;j++)
        {
            if(ara[j]==ara[j-1])
            {
                cnt++;
            }
            else
                cnt=1;

        }
        if(cnt>max)
            max=cnt;
        printf("Case %d: %d",i++,max);
    }
    return 0;
}
