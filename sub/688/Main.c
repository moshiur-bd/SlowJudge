#include<stdio.h>
int main()
{
    int t;
    scanf("%d",&t);
    int i,a,b,s,c,j,sum;
    for(i=0; i<t; i++)
    {
        scanf("%d%d",&a,&b);
        sum=a-b;
        if(a<b)
          printf("%d",b-a);
        else
        printf("%d",a-b);
    }
    return 0;
}
