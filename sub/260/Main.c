#include<stdio.h>
#include<string.h>
int main()
{
    char ch[1000001];
    int i,l,t;
    scanf("%d",&t);
    while(t--)
    {
        memset(ch,0,sizeof(ch));
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
