#include<bits/stdc++.h>
using namespace std;
struct node{
    int info;
    struct node* link;
};
 struct node* head;
    struct node* curr;
    struct node* iterat;
    struct node* ins;
void node_delete(node* head)
{
    head=head->link;
    iterat=head;
}
int main()
{

    head=NULL;
    curr=(node*)(malloc(sizeof(node)));
    curr->info=3;
    curr->link=head;
    head=curr;

    for(int i=0;i<4;i++)
    {
        curr=(node*)(malloc(sizeof(node)));
        curr->info=i;
        curr->link=head;
        head=curr;

    }
    cout<<"The list before delete"<<endl;
    iterat=head;
    while(iterat!=NULL)
    {

        cout<<iterat->info<<" ";
        iterat=iterat->link;

    }
    cout<<endl;

    cout<<"Press any key to delete top element"<<endl;
    getchar();
    node_delete(head);
    cout<<"The list after delete"<<endl;

    while(iterat!=NULL)
    {
        cout<<iterat->info<<" ";
        iterat=iterat->link;

    }
}

