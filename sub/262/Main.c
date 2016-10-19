#include<stdio.h>
#include<math.h>
int main()
{
    int t,i=0;
    long long n,sum,m,rem,k;
    scanf("%d",&t);
    while(t--)
    {
        k=1;
        sum=0;
        scanf("%lld",&n);
        while(n)
        {
            rem=n%2;
            n=n/2;
            rem=rem^1;
            sum+=rem*k;
            k=k*2;
            //printf("%lld %lld %lld %lld\n",rem,n,sum,k);
        }
        printf("Case %d: %lld",++i,sum);
        if(t!=0)
            printf("\n");
    }
    return 0;
}
