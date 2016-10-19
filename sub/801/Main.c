#include<stdio.h>
int main()
{
  int A,B,C;
    int T,i;
    scanf("%d",&T);
    for(i=0; i<=T; i++)
    {
        scanf("%d%d",&A,&B);
        if(A<B)
        {
            C=B-A;
            printf("%d\n",C);

        }

        else
        {
            C=A-B;
            printf("%d\n",C);

        }




    }
    return 0;
}
