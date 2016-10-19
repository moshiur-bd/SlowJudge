#include<stdio.h>
int main()
{
    int t;
    scanf("%d",&t);
    int i,a,b,s,c,j,sum;
    for(i=0; i<t; i++)
    {
        scanf("%d%d",&a,&b);
        if(a==0&&b==0)
            continue;
        sum=a-b;
        if(sum<0)
            sum=sum*(-1);
        printf("%d\n",sum);
    }
    return 0;
}
