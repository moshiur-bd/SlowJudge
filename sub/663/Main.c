#include <stdio.h>
int main()
{
    int a,b,i,k,n;
    scanf("%d",&n);
    for(i=1;i<=n;i++)
    {
        scanf("%d%d",&a,&b);
        k=abs(a-b);
        printf("%d\n",k);
    }
    return 0;
}
