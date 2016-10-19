#include<stdio.h>
int main()
{
    long long i,T,k,j;
    scanf("%lld",&T);
    for(i=1; i<=T; i++)
    {
        int count=0;
        scanf("%lld",&k);
        char a[30];
        gets(a);
        for(j=a[0]; j<a[30]; j++)
        {
            if(a[j]==0)
                count++;
        }
        if(count<k)
        {
            printf(":D\n");
        }
        else
            printf(":(\n");

    }
    return 0;
}
