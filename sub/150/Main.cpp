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
int getInt()
{
    int x;
    scanf("%d",&x);
    return x;
}
long long getLongLong()
{
    long long x;
    scanf("%I64d",&x);
    return x;
}
double getDouble()
{
    double x;
    scanf("%lf",&x);
    return x;
}
char  getChar()
{
    char x;
    scanf("%c",&x);
    return x;
}
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
        if(c==x.c)
        {
            if(a==x.a) return b>x.b;
            return a<x.a;
        }
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
char ss[100];
string s;
int x,n;
char cmd[3][100]= {"insert","getMin","removeMin"};
vector<pair<string,int> > out;
int main()
{
    //freopen("in.txt","r",stdin);
    //freopen("out.txt","w",stdout);
    n=Int;
    multiset<int>v;
    rep(i,n)
    {
        scanf("%s",ss);
        s=ss;
        if(s!="removeMin")x=Int;
        if(s==cmd[0])
        {
            v.insert(x);
            //printf("%s %d\n",cmd[0],x);
            out.pb({cmd[0],x});
        }
        else
        {
            if(s==cmd[1])
            {
                while(!v.empty()&&*(v.begin())<x)
                {
                    //printf("%s\n",cmd[2]);
                    out.pb({cmd[2],0});
                    v.erase(v.begin());
                }
                if(!v.empty()&&(*v.begin())==x)
                {
                    out.pb({cmd[1],x});
                    //printf("%s %d\n",cmd[1],x);
                }
                else
                {
                    out.pb({cmd[0],x});
                    //printf("%s %d\n",cmd[0],x);
                    v.insert(x);
                    out.pb({cmd[1],x});
                    //printf("%s %d\n",cmd[1],x);

                }


            }
            else
            {
                if(v.empty())
                {
                    out.pb({cmd[0],1});
                    out.pb({cmd[2],1});
                }
                else
                {
                    out.pb({cmd[2],1});
                    v.erase(v.begin());
                }

            }


        }
    }

    printf("%d\n",out.size());
    for(auto it:out)
    {
        printf("%s",it.ff.c_str());
        if(it.ff!="removeMin") printf(" %d",it.ss);
        puts("");
    }

    return 0;

}

