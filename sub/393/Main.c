
/**********************************************************************\
|           _______  _     _____    ____   ___     _                   |
|          |___   _|(_)   / ___/   / _  | |   \   | |                  |
|              | |  | |  / /___   / /_| | | |\ \  | |                  |
|           _  | |  | | /___  /  /  __  | | | \ \ | |                  |
|           \ \| |  | | ___/ /  / /   | | | |  \ \| |                  |
|            \___/  |_|/____/  /_/    |_| |_|   \___|                  |
|                  Computer Science and Engineering                    |
|  Bangabandhu Sheikh Mujibur Rahman Science and Technology University |
|                                                                      |
\**********************************************************************/
#include<bits/stdc++.h>
#define ll long long
#define sf scanf
#define pf printf
#define End return 0
#define D double
#define F float
#define B break
#define C continue
#define pb push_back
#define Pb pop_back
#define pop __builtin_popcount
#define gcd(a,b) __gcd(a,b)
#define P pricision
const int N=1e5+5;
using namespace std;
ll p[N];
int main()
{
    ios::sync_with_stdio(0),cin.tie(0);
    ll n,q,x;
    cin>>n>>q;
    for(int i=1;i<=n;i++)
    {
        cin>>x;
        p[i]=p[i-1]+x;
    }
    for(int i=0;i<q;i++)
    {
        cin>>x;
        if(x>p[n])
            cout<<-1<<endl;
        else
        {
            ll l=lower_bound(p+1,p+1+n,x)-p;
            cout<<l<<endl;
        }
    }



    End;
}
