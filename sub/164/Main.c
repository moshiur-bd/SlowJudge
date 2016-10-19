#include<stdio.h>
int pre[10003];
int main()
{
    int i,n,a,b;
    for(i=1582; i<=10000; i++)
        {
            if(i%400==0||(i%4==0&&i%100!=0))
                pre[i]=pre[i-1]+1;
            else
                pre[i]=pre[i-1];
        }
    scanf("%d",&n);
    while(n--)
        {
            scanf("%d %d",&a,&b);
            printf("%d\n",pre[b]-pre[a-1]);
        }
    return 0;
}
