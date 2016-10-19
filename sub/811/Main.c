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
        //gets(a);
        i=0;
        for(i=0; ; i++)
        {
            scanf("%c",&a[i]);
            if(a[i]=='0')
                c++;
            else if(a[i]=='1')
                e++;
            if(c>=d)
            {
                r=2;
                printf(":(\n");
                break;
            }
            else if(e>sum)
            {
                r=2;
                printf(":D\n");
                break;
            }
        }

    }
    return 0;
}
