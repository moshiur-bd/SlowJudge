#include<stdio.h>
int main()
{
    int t;
    scanf("%d",&t);
    while(t--)
    {

        int a[30],k,i,cou=0,l;
        scanf("%d",&k);

        for(i=0; i<30; i++){
            scanf("%d",&l);
            if(l>0)
                a[i]=1;
            else
                a[i]=0;

        }

        for(i=0; i <30; i++)
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
