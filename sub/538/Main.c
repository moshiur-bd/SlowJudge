#include<stdio.h>
int main()
{
    int N;
    while(scanf("%d",&N)==1)
    {
        if(N==0)
            break;
        else
            printf("%d\n",N);
    }
    return 0;
}
