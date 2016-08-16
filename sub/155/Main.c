#include<stdio.h>
#include<assert.h>
#define AIN(x,lo,hi) assert(x>=lo&&x<=hi)
int a[1000];
int main(){

    int TC,tc,i,j;
    scanf("%d",&TC);
    assert(TC>=1&&TC<=1000);//checks IO validity
    for(tc=1;tc<=TC;tc++){
        int n;
        scanf("%d",&n);
        AIN(n,1,1000);//checks IO validity
        for(i=0;i<n;i++){
            scanf("%d",a+i);
            AIN(a[i],-1000000000,1000000000);//checks IO validity
        }

        int ans=0;

        for(i=0;i<n;i++){
            int c=1;
            for(j=i+1;j<n;j++)
                if(a[i]==a[j])
                    c++;
            if(c>ans)
                ans=c;

        }

        printf("Case %d: %d\n",tc,ans);
    }
    return 0;
}
