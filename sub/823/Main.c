#include <stdio.h>
int main()
{
    int n,i,s=0,p,ss,j;
    scanf ("%d",&n);
    for (i=0; i<n; i++)
    {
        scanf("%d",&ss);
        for (j=0; j<ss; j++)
        {
            scanf("%d",&p);
            s=s+p;
        }
        printf ("%d\n",s);
    }
}
