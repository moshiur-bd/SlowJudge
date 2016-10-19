#include<stdio.h>
#include<string.h>

int main()
{
    int str[30];
    int t,a,i,n,c=0;

    scanf("%d",&t);

    while(t--)
    {
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
