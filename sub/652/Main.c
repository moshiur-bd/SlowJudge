#include<stdio.h>
#include<math.h>
int main()
{
   unsigned int T,d,i,A,B;
    scanf("%d",&T);
    for(i=1;i<=T;i++)
    {
        scanf("%d%d",&A,&B);
        if(A<0||B<0)
            break;
        d=abs(A-B);
        if(d>0)
        printf("%d\n",d);
        else
            return 0;
    }
    return 0;
}
