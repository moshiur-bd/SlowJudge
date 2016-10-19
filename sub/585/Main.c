#include<stdio.h>
#include<string.h>
#include<math.h>
int main()
{
    int n,m,k,t,i;
    char a[10001];
    scanf("%d",&t);
    while(t--)
    {
        scanf("%d%d",&n,&m);
        k=abs(n-m);
        if(k)
            printf("%d\n",k);
    }
    return 0;
}
