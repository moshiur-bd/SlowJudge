
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
int main()
{
    ios::sync_with_stdio(0),cin.tie(0);
    ll n;
    cin>>n;
    while(n--)
    {
        string s;
        cin>>s;
        for(int i=0;s[i];i++)
        {
            if(s[i]=='}'||s[i]=='{')
                C;
            if(s[i]==',')
                cout<<" ";
            else
                cout<<s[i];
        }

        cout<<endl;
    }
    cout<<endl;
    cout<<endl;


    End;
}
