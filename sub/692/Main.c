#include<stdio.h>
int main()
 {
    int  a,b,r;
    int i,n;
    scanf("%d",&n);
    for (i=0; i<n; i++)
    {
        scanf ("%d%d",&a,&b);
    if(a>b)
         {
            r=a-b;
            printf ("%d\n",r);
        }
    else if(a<b)
        {
        r=b-a;
        printf ("%d\n",r);
        }
    else ("\n");
    }
        return 0;

}
