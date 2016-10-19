#include<bits/stdc++.h>
#include<graphics.h>
int main()
{
    int gd=DETECT,gm;
    char *c="C://TC//BGI";
    initgraph(&gd,&gm,c);
    setcolor(RED);
    bar(100,100,700,500);
    for(int i=0;i<=200;i++)
    {
        cleardevice();
        outtext("WHO CAN?");
        delay(20);

    }
    getch();
    closegraph();
}
