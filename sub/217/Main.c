#include<stdio.h>
int main()
{
    int T,a,b,i,ans;
    scanf("%d",&T);
    for(i=1;i<=T;i++)
    {
        scanf("%d%d",&a,&b);
        ans=(a*a)+(2*a*b)+(b*b);\
        printf("Case %d: %d\n",i,ans);
    }
    return 0;
}
