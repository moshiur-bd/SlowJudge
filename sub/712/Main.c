#include<stdio.h>

int main ()
{
    int i,tc;
    int a,b;
    scanf("%d",&tc);
    for(i=1;i<=tc;i++)
    {
         scanf("%d %d",&a,&b);
        if(a>b)
        printf("%d\n",a-b);
       else if(a<b)
        printf("%d\n",b-a);
        else
        printf("\n");
    }
    return 0;
}
