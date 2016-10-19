#include<stdio.h>

int main()
{
    int a,b,c,t;
    scanf("%d",&t);

    while(t--)
    {
        scanf("%d%d",&a,&b);
        if(a>b)
        {
            c=a-b;
        }
        else
            c=b-a;

        if(c!=0)
            printf("%d\n",c);
    }


    return 0;
}
