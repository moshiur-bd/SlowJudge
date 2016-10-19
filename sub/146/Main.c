#include<stdio.h>
int leap(int);
int main()
    {
    int n,m,cnt,i,t,a,c;
    scanf("%d",&t);
    while(t--)
        {
        cnt=0;
        scanf("%d %d",&n,&m);
        a=m-n;
        while(1)
            {
            c=leap(n);
            if(c==1)
                {
                cnt+=(a/4)+1;
                break;
                }
            else
                {
                a--;
                n++;
                }
            }
        printf("%d\n",cnt);
        }
    return 0;
    }
int leap(int n)
    {
    if(n%4==0)
        return 1;
    else if(n%100==0 && n%400==0 )
        return 1;
    else
        return 0;
    }
