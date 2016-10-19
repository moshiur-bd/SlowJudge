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
        scanf("%s",a);
        for(i=0; i<30; i++)
        {
            //scanf("%s",&a[i]);
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

}

