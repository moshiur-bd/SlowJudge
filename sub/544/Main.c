#include<stdio.h>

int main()
{
   int t,a,b,c;
    scanf("%d",&t);
    while(t--)
    {
        scanf("%d%d",&a,&b);
        c=a*a+b*b+4*a*b-3*a*b-2*a*b-1*a*b;

        printf("%d\n",c);
    }

    return 0;
}
