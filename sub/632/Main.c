#include<stdio.h>
#include<string.h>
#include<stdlib.h>
#include<math.h>
int main()
{
    int t,i,n;
    char ch[10001],max;
    scanf("%d",&t);
    while(t--)
    {
        max='\0';
        scanf("%s",ch);
        for(i=0; ch[i]; i++)
        {
            if(ch[i]>=max)
            {
                max=ch[i];
                n=i;
            }
        }
        for(i=0; ch[i]; i++)
        {
            if(max>ch[i])
            {
                ch[n]=ch[i];
                ch[i]=max;
                break;
            }
        }
        printf("%s\n",ch);
    }
    return 0;
}
