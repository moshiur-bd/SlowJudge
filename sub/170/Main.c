#include<stdio.h>
#include<assert.h>
int main(){

    int TC,tc;
    scanf("%d",&TC);
    assert(TC>=1&&TC<=1000);//checks IO validity
    for(tc=1;tc<=TC;tc++){
        long long a,b;
        scanf("%lld%lld",&a,&b);
        assert(a>=1&&a<=100000);
        assert(b>=1&&b<=100000);

        printf("Case %d: %lld\n",tc,(a+b)*(a+b));
    }
    return 0;
}
