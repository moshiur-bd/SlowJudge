#include<stdio.h>

int main ()
{
    int i,tc,result;
    int a,b;
    scanf("%d",&tc);
    for(i=1;i<=tc;i++)
    {
         scanf("%d %d",&a,&b);
        if(a>b)
        {
             result=a-b;
        printf("%d\n",result);
        }
       else if(a<b)
       {
           result=b-a;
        printf("%d\n",result);
       }
        else
        printf("\n");
    }
    return 0;
}
