#include<stdio.h>
int main()
{
    int T,k,i,count=0;
    char a[30];
    scanf("%d",&T);
    while(T--)
    {
        scanf("%d",&k);

        for(i=0; i<30; i++)
        {
            scanf("%c",&a[i]);
            if(a[i]=='0')
                count=count+1;
        }
        if(count<k)
            printf(":D\n");
        else if(count>=k)
            printf(":(\n");

    }
    return 0;
}
