#include<stdio.h>
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {
        int a,b;
        scanf("%d%d",&a,&b);
        if(a)
        if(a>b)
            printf("%d\n",a-b);
        else if(b>a)
            printf("%d\n",b-a);
    }

    return 0;
}
