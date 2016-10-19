#include<stdio.h>
int main()
{
    char c;
    scanf("%c",&c);
    if(c=='A')
        printf("E");
    else if(c=='E')
        printf("I");
    else if(c=='I')
        printf("O");
    else if(c=='O')
        printf("U");
    else
        printf("A");
    return 0;
}
