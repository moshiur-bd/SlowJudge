#include<stdio.h>

int main()
{
 int t;
 scanf("%d",&t);
while(t--)
{
    int a,b,i;
    scanf("%d%d",&a,&b);
     int sum=0;
    for(i=a;i<=b;i++)
    {
       if((i%4==0&& i%100!=0)||(i%400==0))
        sum++;


    }

    printf("%d\n",sum);

}

  return 0;
}
