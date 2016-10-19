#include<stdio.h>
int main()
{
 unsigned long a,b,r;
 int i,n;
    scanf("%d",&n);
    for (i=0;i<n;i++){
            scanf ("%lu%lu",&a,&b);
            if(a>b)
      r=a-b;
      else {
        r=b-a;
        }
      printf ("%lu\n",r);
    }
    return 0;
}
