#include<stdio.h>
int main()
{
    int t,ans,a,b,an;
    scanf("%d", &t);
    while(t--)
    {
        scanf("%d %d", &a, &b);
        ans=(a-b);
        an=(a-b);
        if(ans==0)
        {
            printf("");
        }
        if(ans<0)
        {
            an=ans*(-1);
            printf("%d\n", an);
        }
        if(ans>0)
        {
            printf("%d\n", ans);
        }
    }
    return 0;
}
