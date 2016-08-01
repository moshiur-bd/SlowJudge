#include<stdio.h>
#include<stdlib.h>
int main(int argc,char *argv[]){
    if(argc>1){
        char cmd[1000]="java -cp mysql-connector-java-5.0.8-bin.jar; Timer ";
        strcat(cmd,argv[1]);
        printf("%s\n",cmd);
        system(cmd);
    }
    return 0;
}
