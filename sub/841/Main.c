#include<stdio.h>
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
        int a,b;
        scanf("%d%d",&a,&b);

        if(a>b&b>=0)
            printf("%d\n",a-b);
        else if(b>a&a>=0)
            printf("%d\n",b-a);
    }

    return 0;
}
