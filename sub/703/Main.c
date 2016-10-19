#include<stdio.h>
#include<math.h>
int main()
{
   int T,A,B,d,i;
   scanf("%d",&T);
   for(i=1;i<=T;i++)
   {
       scanf("%d%d",&A,&B);
       d=abs(A-B);
        if(d!=0)
       {
           printf("%d\n",d);
       }
       else
        return 0;
   }
    return 0;
}
