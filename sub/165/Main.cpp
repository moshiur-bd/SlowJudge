#include<bits/stdc++.h>

using namespace std;

int main()
{
    clock_t start = clock();

    int test;
    scanf("%d",&test);
    assert(test >=1 && test<= 500);

    for(int t = 1 ;t<= test ;t++)
    {
        int a;

        scanf("%d",&a);

        assert(a >= 1 && a<=1000);

        printf("Case %d: %d\n",t,(a*(a-1))/2);
    }

    clock_t endd = clock();
    fprintf(stderr, "Time Used : %.2f\n", (double)(endd-start)/(double)CLOCKS_PER_SEC);

    return 0;
}
