#include<stdio.h>
int main()
{
    int T;
    scanf("%d",&T);
    int i,a,b,sum,c;
    for(i=0; i<T; i++)
    {
        scanf("%d%d",&a,&b);
        c=a-b;
        printf("%d\n",c*c);
    }
    return 0;
}
