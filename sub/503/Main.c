#include<stdio.h>
int main ()
{
    long long i,tc,a,b,result;
    scanf("lld",&tc);
    for(i=1;i<=tc;i++)
    {
        scanf("%d %d",&a,&b);
         result=a*a + b*b + 4*a*b -3*a*b-2*a*b-1*a*b;
         printf("%d\n",result);

    }
    return 0;
}
