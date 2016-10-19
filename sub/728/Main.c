#include<stdio.h>
int main()
{
    int T,A,B,d,i;
   scanf("%d",&T);
   for(i=1;i<=T;i++)
   {
       scanf("%d%d",&A,&B);
       if(A>=B)
       {
           d=A-B;
       }
       else if(B>A)
       {
           d=B-A;
       }

        if(d!=0)
       {
           printf("%d\n",d);
       }
   }
    return 0;
}
