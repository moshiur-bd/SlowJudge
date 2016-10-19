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
        getchar();
        i=0;
        for(i=1; i<=30; i++)
        {
            scanf("%c",&a[i]);
            if(a[i]=='0')
                a[i]+=a[i-1]+a[i];
        }
        if(a[i]>=d)
        {
            printf(":(\n");
        }
        else
            printf(":D\n");
    }
    return 0;
}
