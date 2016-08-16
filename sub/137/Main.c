#include<stdio.h>
#include<assert.h>
int main(){

    int TC,tc;
    scanf("%d",&TC);
    assert(TC>=1&&TC<=1000);//checks IO validity
    for(tc=1;tc<=TC;tc++){
        long long a;
        int i;
        scanf("%lld",&a);
        assert(a>=0ll&&a<=1000000000000000ll);//checks IO validity
        for(i=63- __builtin_clzll(a) ;i>=0;i--){
            a=a ^ (1ll<<i);
        }
        printf("Case %d: %lld\n",tc,a);
    }
    return 0;
}
