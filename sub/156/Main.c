#include<stdio.h>
#include<assert.h>
#define AIN(x,lo,hi) assert(x>=lo&&x<=hi)
int q[100000];
int n,m,i,j,t;

int meet(int x){
    int lo=0,hi=n-1,mid;
    while(lo<hi){
        mid=(lo+hi)/2;
        if(q[mid]>=x)
            hi=mid;
        else lo=mid+1;
    }

    return q[lo]>=x?lo+1:-1;
}

int main(){


    scanf("%d %d",&n,&m);
    AIN(n,1,100000);
    AIN(m,1,100000);

    for(i=0;i<n;i++){
        scanf("%d",q+i);
        AIN(q[i],1,10000);
        if(i>0)q[i]+=q[i-1];
    }

    for(i=0;i<m;i++){
        scanf("%d",&t);
        AIN(t,1,1000000000);
        printf("%d\n",meet(t));
    }

    return 0;
}
