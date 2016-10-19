#include<stdio.h>
int main()
{
    int t,n,i,count;
    scanf("%d", &t);
    while(t--)
    {
        scanf("%d", &n);
        count=0;
        char A[300];
        scanf("%s", &A);
        for(i=0; i<30; i++)
        {
            if(A[i]=='0')
            {
                count++;
            }
        }
        if(count>=n)
        {
            printf(":(\n");
        }
        else
        {
            printf(":D\n");
        }
    }
    return 0;
}
