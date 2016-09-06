#include<stdio.h>
#include<assert.h>
#define AIN(a,x,y) assert(a>=x&&a<=y)
char s[100010];
int main(){

    int TC,tc,i,j,l;
    scanf("%d",&TC);
    AIN(TC,1,105);
    while(TC--){
        scanf("%s",s);
        AIN(strlen(s),1,10000);

        int sum=0,x;
        for( i=0;s[i];i++){
            x=(s[i]-'A'+1);
            sum+=x;
            AIN(x,1,26);
        }
        int cnt[27]={0};
        for( i=26;i>=1;i--){
            cnt[i]=sum/i;
            sum-=(cnt[i]*i);
        }

        l=0;

        for(i=1;i<=26;i++)
            for(j=0;j<cnt[i];j++)
                s[l++]='A'+i-1;
        s[l]=NULL;
        puts(s);



    }
    return 0;
}

