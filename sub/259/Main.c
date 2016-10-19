#include<stdio.h>
#include<string.h>
int main()
{
    char ch[10001];
    int i,l,t;
    scanf("%d",&t);
    while(t--)
    {
        scanf("%s",ch);
        l=strlen(ch);
        for(i=1;i<l-1;i++)
        {
            if(ch[i]==',')
                printf(" ");
            else
                printf("%c",ch[i]);
        }
        printf("\n");
    }
    return 0;
}
