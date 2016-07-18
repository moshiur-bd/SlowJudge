/**********************************************************************\
\     _       _                                               ____     /
/     |\     /|   oooo     ssss       H     H     II  U    U  |   \    \
\     | \   / |  oo  oo   ss    s     H     H     II  U    U  |    |   /
/     |  \ /  |  oo  oo    ss         H     H     II  U    U  |__ /    \
\     |   v   |  oo  oo      ss       HHHHHHH     II  U    U  |   \    /
/    _|       |_  oooo    s    ss     H     H     II   uuuu  _|    \_  \
\                          ssss       H     H     II                   /
/                                     H     H                          \
\                                                                      /
/   common handle names: "moshiur.bd"  or "moshiur_bd"                 \
\**********************************************************************/

#include<bits/stdc++.h>
using namespace std;
#define inf 999999
//#define MAX 100000
#define gcd(a,b) __gcd(a,b)
#define i64 long long
int getInt(){int x;scanf("%d",&x);return x;}
long long getLongLong(){long long x;scanf("%I64d",&x);return x;}
double getDouble(){double x;scanf("%lf",&x);return x;}
char  getChar(){char x;scanf("%c",&x);return x;}
#define Int getInt()
#define Char getChar()
#define I64 getLongLong()
#define Double getDouble()
#define bug printf("debug\n");
#define br puts("");
#define rep(i,n) for(int i=0;i<n;i++)
#define lcm(a,b) a*b/gcd(a,b)
#define pb push_back
#define vi vector<int>
#define ii pair<int,int>
#define dd pair<double,double>
#define ll long long
#define ff first
#define ss second
#define all(v) v.begin(),v.end()
#define EPS numeric_limits<double>::epsilon()
#define popcount __builtin_popcount
template<typename t>
t abs(t a)
{
    if(a>=0)
        return a;
    return -a;
}
struct dual
{
    int a,b;
    bool const operator<(const dual &x)const
    {
        if(a==x.a) return b>x.b;
        return a<x.a;
    }
};
struct triple
{
    int a,b,c;
    bool const operator<(const triple &x)const
    {
        if(c==x.c){
            if(a==x.a) return b>x.b;
            return a<x.a;}
        return c<x.c;
    }
};
//error
/*#define error(args...) { vector<string> _v = split(#args, ','); err(_v.begin(), args); puts(""); }

vector<string> split(const string& s, char c) {
	vector<string> v;
	stringstream ss(s);
	string x;
	while (getline(ss, x, c))
		v.emplace_back(x);
	return move(v);
}

void err(vector<string>::iterator it) {}
template<typename T, typename... Args>
void err(vector<string>::iterator it, T a, Args... args) {
	cerr << it -> substr((*it)[0] == ' ', it -> length()) << " = " << a << "  ";
	err(++it, args...);
}*/
void FastIO()
{
    ios::sync_with_stdio(0);
	cin.tie(0);
}

////////////////////////////////////
ll n;
ll a,b,c;
#define house 1234567ll
#define car 123456ll
#define com 1234ll
int main()
{
    //freopen("in.txt","r",stdin);
    cin>>n;
    ll upa=n/house;
    ll upb=n/car;

    for(a=0;a<=upa;a++)
        for(b=0;b<=upb;b++){
            c=a*house+b*car;
            if(c>n)break;
            c=n-c;
            if(c%com==0)
            {
                puts("YES");
                return 0;
            }

    }
    puts("NO");
    return 0;

}

