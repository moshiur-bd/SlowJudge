#include<stdio.h>
int main()
{
    int T,K,a[30],i,count=0;
    scanf("%d",&T);
    while(T--)
    {
        scanf("%d",&K);

        for(i=0;i<30;i++)
        {
            scanf("%d",&a[i]);
            if(a[i]==0)
                count=count+1;
        }
        if(count<K)
            printf(":D\n");
        else if(count>=K)
            printf(":(\n");

    }
}
