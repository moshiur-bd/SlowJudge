#include<stdio.h>
int main()
{
    int T,K,i,count=0;
    char a[30];
    scanf("%d",&T);
    while(T--)
    {
        scanf("%d",&K);

        for(i=0;i<30;i++)
        {
            scanf("%c",&a[i]);
        if(a[i]=='0')
                count=count+1;
        }
        if(count<=K)
            printf(":D\n");
        else
            printf(":(\n");

    }
    return 0;
}
