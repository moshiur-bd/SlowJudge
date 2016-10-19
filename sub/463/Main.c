#include<stdio.h>
int main () {
    long long a,b,i,n,r;
    scanf("%d",&n);

    for (i=0; i<n; i++) {
        scanf("%lld%lld",&a,&b);
        r=(a*a) +(b*b) + (4*a*b) - (3*a*b) - (2*a*b) - (1*a*b);
        printf ("%lld\n",r);
    }

    return 0;
}
