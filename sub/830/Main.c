#include<stdio.h>

int main()
{
    int T,k,i,j;
    char a[30];
    scanf("%d",&T);
    for(j=1; j<=T; j++)
    {
        scanf("%d",&k);
int count=0;
        for(i=0; i<30; i++)
        {
            scanf("%c",&a[i]);
            if(a[i]=='0')
            {
                count++;

            }

        }
        printf("%d",count);
        if(count<=k)
            printf(":D\n");


        else if(count>k)
            printf(":(\n");


    }

}

