#include<stdio.h>
#include<math.h>
int main()
{
   unsigned int T,d,i,A,B;
    scanf("%d",&T);
    for(i=1;i<=T;i++)
    {
        scanf("%d%d",&A,&B);
        d=abs(A-B);
        printf("%d\n",d);
    }
    return 0;
}
