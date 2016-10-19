#include<stdio.h>
int main()
{
    char a[31];
    int i,sum,j,T,c,d,e;
    scanf("%d",&T);
    getchar();
    while(T)
    {
        int r=0;
        c=0;
        e=0;
        j=0;
        scanf("%d",&d);
        sum=30-d;
        getchar();
        gets(a);
        i=0;
        while(r==0)
        {
            if(a[i]=='1')
                c++;
            if(a[i]=='0')
                e++;

            if(c>sum)
            {
                r=2;
                printf(":D\n");
                break;
            }
            if(e>=d)
            {
                r=2;
                printf(":(\n");
                break;
            }
            i++;
        }
    }
    return 0;
}

