#include<stdio.h>
#include<stdlib.h>
#include<string.h>
int cmf(const void*a,const void*b)
{
    return (*(int*)a-*(int*)b);
}
int a[10001],b[10001];
int main()
{
    int n,t,z,i,sum,k=0;
    while(scanf("%d",&n)==1)
    {
        if(n==0)
            break;
        printf("%d\n",n);
    }
    return 0;
}
