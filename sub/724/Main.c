#include<stdio.h>
int main()
{
    int t;
    scanf("%d",&t);
    int i,a,b,s,c,j,sum;
    for(i=0; i<t; i++)
    {
        while(scanf("%d%d",&a,&b)>0)
        {
            sum=a-b;
            if(sum==0)
                break;
            else if(sum<0)
                sum=sum*(-1);
            printf("%d",sum);
        }
    }
    return 0;
}
