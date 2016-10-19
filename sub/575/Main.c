#include<stdio.h>
int main()
{
  unsigned int a,b,r,i,n;
    scanf("%u",&n);
    for (i=0;i<n;i++){
            scanf ("%u%u",&a,&b);
            if(a>b)
      r=a-b;
      else {
        r=b-a;
        }
      printf ("%u\n",r);
    }
    return 0;
}
