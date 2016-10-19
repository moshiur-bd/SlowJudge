#include <stdio.h>
int main()
{
    int a,b,i,n,t;
    scanf("%d",&n);
    for(i=1;i<=n;i++)
    {
        scanf("%d%d",&a,&b);
        printf("%d",abs(a-b));

    }
    return 0;

}
