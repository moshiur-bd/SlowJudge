#include<stdio.h>
#include<math.h>
int main()
{
    long long n,i,sum,rem,T,j;
    scanf("%lld",&T);
    j=1;
    while(T--)
    {
        scanf("%lld",&n);
        if(n==0)
        {
            printf("Case %lld: 1",j++);
        }
        else
        {
            i=0;
            sum=0;
            while(n)
            {
                rem=n%2;

                rem=rem^1;
                sum+=rem*pow(2,i);
                n=n/2;
                i++;
            }
            printf("Case %lld: %lld",j++,sum);

        }
        printf("\n");

    }
    return 0;
}
