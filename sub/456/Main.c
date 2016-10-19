#include<stdio.h>
int main () {
    int a,b,i,n,r;
    scanf("%d",&n);

    for (i=0; i<n; i++) {
        scanf("%d%d",&a,&b);
        r=(a*a) +(b*b) + (4*a*b) - (3*a*b) - (2*a*b) - (1*a*b);
        printf ("%d\n",r);
    }

    return 0;
}
