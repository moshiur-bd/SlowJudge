#include<stdio.h>

int main()
{
    int str[30];
    int t,i,n,c;

    scanf("%d",&t);

    while(t--)
    {   c=0;
        scanf("%d",&n);

        for(i=0; i<30; i++)
        {
            scanf("%d",&str[i]);
            if(str[i]==0)
                c++;
        }
        if(c>=n)
            printf(":(\n");
        else
            printf(":D\n");
    }


    return 0;
}
