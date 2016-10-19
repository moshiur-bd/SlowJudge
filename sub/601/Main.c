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
        // gets(a);
        //j=strlen(a);
        for(i=0; i<30; i++)
        {
            scanf("%c",&a[i]);
            if(a[i]=='0')
                c++;
            if(c>=d)
            {
                printf(":(\n");
                break;
            }
        }
        if(c<d)
            printf(":D\n");
    }

    return 0;
}
