#include<stdio.h>
#include<string.h>
int main()
{
    int t,len,i,temp,s_pos,b_pos,s_biggest,biggest;
    scanf("%d", &t);
    while(t--)
    {
        char str[1000];
        scanf("%s", &str);
        len=strlen(str);
        biggest=str[0];
        for(i=1; i<len; i++)
        {
            if(str[i]>str[i-1])
            {
                biggest=str[i];
                b_pos=i;
            }
        }
        if(str[0]==biggest)
        {
            s_biggest=str[1];
            for(i=2; i<len; i++)
            {
                if(str[i]>str[i-1])
                {
                    s_biggest=str[i];
                    s_pos=i;
                }
            }
            temp=str[1];
            str[1]=str[s_pos];
            str[s_pos]=temp;
        }
        else
        {
        temp=str[0];
        str[0]=str[b_pos];
        str[b_pos]=temp;
        }
        printf("%s", str);
    }
    return 0;
}
