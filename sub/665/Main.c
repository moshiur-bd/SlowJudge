#include<stdio.h>
int main()
{
    int t,ans,a,b;
    scanf("%d", &t);
    while(t--)
    {
        scanf("%d %d", &a, &b);
        ans=(a-b);
        if(ans<0)
        {
            ans=ans*(-1);
        }
        printf("%d\n", ans);
    }
    return 0;
}
