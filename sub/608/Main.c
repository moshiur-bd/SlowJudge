#include<stdio.h>
int main()
{
    char a[31];
    int i,sum,j,T,c,d;
    scanf("%d",&T);
    getchar();
    while(T)
    {
        c=0;
        scanf("%d",&d);
        getchar();
        sum=30-d;
        // gets(a);
        //j=strlen(a);
        for(i=0; i<30; i++)
        {
            scanf("%c",&a[i]);
            if(a[i]=='1')
                c++;
            if(c>=sum)
            {
                printf(":D\n");
                break;
            }
        }
        if(c<sum)
            printf(":(\n");
    }

    return 0;
}
