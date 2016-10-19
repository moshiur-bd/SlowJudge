#include<stdio.h>

int main()
{
    int T,k,i,j;
    char a[30];
    scanf("%d",&T);
    while(T--)
    {
        int count=0;
        scanf("%d",&k);


        for(i=0; i<30; i++)
        {
            scanf("%c",&a[i]);
            if(a[i]=='0')
            {
                count++;

            }

        }

        if(count<=k)
            printf(":D\n");


        else
            printf(":(\n");


    }
    return 0;

}

