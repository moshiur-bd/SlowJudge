#include<stdio.h>
int main()
{
    long int t,a,b;
    while(t--)
    {
        scanf("%ld %ld", &a, &b);
        printf("%ld\n", (a-b)*(a-b));
    }
    return 0;
}
