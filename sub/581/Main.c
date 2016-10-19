#include<stdio.h>
int main()
{
 long long a,b,r;
 int i,n;
    scanf("%d",&n);
    for (i=0;i<n;i++){
            scanf ("%lld%lld",&a,&b);
            if(a>b)
      r=a-b;
      else {
        r=b-a;
        }
      printf ("%lld\n",r);
    }
    return 0;
}
