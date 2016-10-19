#include<stdio.h>
int main ()
{
    int i,tc;
    int a,b,dif;
    scanf("%d",&tc);
    for(i=1;i<=tc;i++)
    {
         scanf("%d %d",&a,&b);
        if(a==0 || b==0)
            break;
        dif=abs(a-b);
        printf("%d\n",dif);
    }
    return 0;
}
