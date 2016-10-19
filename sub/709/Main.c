#include<stdio.h>
#include<string.h>
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {

        int a[30],k,i,cou=0;
        scanf("%d",&k);
        for(i=0; i<30; i++)
            scanf("%d",&a[i]);

                                        // 1 1 1 1 0 1 1 1 0 1 1 1 1 1 0 1 1 1 0 1 0 1 1 1 1 1 1 0 1 1
        for(i=0; i <30; i++)             // 1 1 1 1 0 1 1 1 0 1 1 1 1 1 0 1 1 1 0 1 0 1 1 1 1 1 1 0 1 1
        {
            if(a[i]==0)
                cou++;
        }

        if(cou>=k)
            printf(":(\n");
        else
            printf(":D\n");
    }
    return 0;
}
