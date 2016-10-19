#include<stdio.h>
#include<string.h>
int main()
{
    int n,m,k,t,i;
    char a[10001];
    scanf("%d",&t);
    while(t--)
    {
        k=0;
        scanf("%d%s",&m,a);
        for(i=0;a[i];i++)
        {
            if(a[i]=='0')
                k++;
                if(k>=m)
                    break;
        }
        if(k<m)
            printf(":D\n");
        else
            printf(":(\n");
    }
    return 0;
}
