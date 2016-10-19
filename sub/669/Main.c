#include<stdio.h>
int main () {
    int n,i,j,k,day[30],count=0;
    scanf ("%d",&n);
    for (i=0; i<n; i++)
    {
        scanf ("%d",&k);
        for (j=0; j<30; j++)
        {
            scanf ("%d",&day[j]);

            if (day[j]==0)
                count=count+1;
        }
        if (count>k)
        printf (":\(\n");
        else {
            printf (":D\n");
        }
    }
    return 0;
}
