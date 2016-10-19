#include<stdio.h>
#include<math.h>
int main()
{
    int n,rem,rem1,i,sum,sum1,j;
    scanf("%d",&n);
    i=1;
sum=0;
   while (n!=0)
    {
        rem=n%2;
        n/=2;
        sum+=rem*i;
        i*=10;

    }
     printf("%d",sum);
     sum1=0;
    rem1,j=1;
    while (sum!=0)
    {
        rem1=sum%2;
        sum/=2;
        sum1+=rem1*j;
       j=j*10;
    }
printf("%d",sum1);

return 0;
}

