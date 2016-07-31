#include<stdio.h>
#include<stdlib.h>
#include<string.h>

#define SZ 32

char bits[SZ];
unsigned long pow2[SZ], pow2Minus1[SZ], len;

int halfOddpos(int n);
int decToBinary(int n);
long long score(int n);

int main()
{
    //freopen( "turing.in", "r", stdin );
    //freopen( "turing.out", "w", stdout );

    int i, j;
    pow2[0] = 1;
    pow2Minus1[0] = 0;
    for(i=1; i < SZ; i++)
    {
        pow2[i] = pow2[i-1] << 1;
        pow2Minus1[i] = (pow2[i-1] - 1) + pow2[i-1];
    }

    int q, x, n;
    long long sum;
    while(scanf("%d",&q)==1)
    {
        for(j = 0; j < q; j++)
        {
            scanf("%d %d", &x, &n);
            sum = 0;
            if(x%2 == 1)
            {
                len = decToBinary(n);
                sum += score(n);
                //printf("%3d => %5lld\n", n, sum);
            }
            else
            {
                if(x%4 != 0)
                {
                    if(n%2==1)
                        sum += 3;
                }
            }
            printf("%lld\n",sum);
        }
    }
    return 0;
}

long long score(int n)
{
    if(pow2Minus1[len] == n || n < 2)
        return 0;

    int cnt1 = 0, i;
    for(i=0; i < len; i++)
        if(bits[i] == '1')
            cnt1++;

    long long res = 0, ln = n;

    res += ((ln+2) << (cnt1-1));
    res += n - halfOddpos(n) + 1;
    return res;
}

int halfOddpos(int n)
{
    int i, pos = 0;
    if(n % 2 == 0)
    {
        for(i = len - 2; i >= 0; i--)
            if(bits[i] == '1')
            {
                pos = len - i - 1;
                break;
            }
        return pow2[pos-1];
    }
    else
    {
        for(i = len - 1; i >=0; i--)
            if(bits[i] == '0')
                break;
        for(; i >=0; i--)
            if(bits[i] == '1')
            {
                pos = len - i - 1;
                break;
            }
        return pow2[pos-1];
    }
}

void stringRev(char str[])
{
	int i, len;
	char temp;
	len = strlen(str);
	for(i = 0; i < len / 2; i++)
	{
		temp = bits[i];
		bits[i] = bits[len - 1 - i];
		bits[len - 1 - i] = temp;
	}
}

int decToBinary(int n)
{
	int rem, i = 0;
	while(n != 0)
	{
		rem = n % 2;
		bits[i++] = rem + '0';
		n /= 2;
	}
	bits[i] = 0;
	stringRev(bits);
	return i;
}
