#include <stdio.h>
int main()
         {
             long long a,b,p;
             int i,n;
             scanf("%d",&n);
             for(i=1;i<=n;i++)
             {
                 scanf("%lld%lld",&a,&b);
                 p=(a*a)+(b*b)+(4*a*b)-(3*a*b)-(2*a*b)-(1*a*b);
                 printf("%lld\n",p);

             }
             return 0;


         }
