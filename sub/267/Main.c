#include<stdio.h>
#include<string.h>
int main()
{
    char string[1000];
    int i,l,T;
    scanf("%d",&T);
    while(T--)
    {

        scanf("%s",string);
        l=strlen(string);

        for(i=1; i<l-1; i++)
        {
            if(string[i]==',')
            {
                printf(" ");
            }
            else
                printf("%c",string[i]);

        }
        printf("\n");

    }
    return 0;
}
