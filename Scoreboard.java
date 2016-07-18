//package com.mkyong.common;
import java.io.*;
import java.nio.charset.Charset;
import java.sql.*;
import java.util.*;
import java.util.concurrent.TimeUnit;

public class Scoreboard {

    String dir;
    String cDB = "slowjudge";
    String DB = "mosuser";

    Connection conn = null;
    Statement stmt = null;
    ResultSet rs = null;

    long sdelay = 60000;//in milis
    long remaining = 5000;//in milis
    int problemCount = 0;//number of problems
    int pscore[];
    int ppenalty=0;

    public Scoreboard(String s) {
        cDB = s;
        conn = null;
        stmt = null;
        rs = null;

    }

    boolean init() {
        System.out.println("-------- MySQL JDBC Connection Testing ------------");

        try {
            Class.forName("com.mysql.jdbc.Driver");
        } catch (ClassNotFoundException e) {
            System.out.println("Where is your MySQL JDBC Driver?");
            e.printStackTrace();
            return false;
        }
        System.out.println("MySQL JDBC Driver Registered!");
        return true;
    }

    boolean connect() {

        try {
            conn = DriverManager
                    .getConnection("jdbc:mysql://localhost/", "root", "");

        } catch (SQLException e) {
            System.out.println("Connection Failed! Check output console");
            e.printStackTrace();
            return false;
        }

        if (conn != null) {
            System.out.println("You made it, take control your database now!");
        } else {
            System.out.println("Failed to make connection!");
            return false;
        }
        return true;

    }

    void disconnect() {
        try {
            if (stmt != null) {
                stmt.close();
            }
        } catch (SQLException se2) {
        }// nothing we can do
        try {
            if (conn != null) {
                conn.close();
            }
        } catch (SQLException se) {
            se.printStackTrace();
        }//end finally try
        return;
    }

    void scoreboard(){
        try{
            stmt=conn.createStatement();
            String sql="SELECT * FROM `"+cDB+"`.scoreboard";
            rs=stmt.executeQuery(sql);
            int score=0,penalty=0,rank=1,solvingTime=0,firstAC=0;
        
            //will declare array here for rank,pen,slt;
            while(rs.next())
            {//calculate rank for every contestant
                
                for(int i=0;i<problemCount;i++){
                    firstAC=rs.getInt("fac"+i);
                    solvingTime=rs.getInt("st"+i);
                    if(firstAC>0){//current problem solved by the participant
                        score+=pscore[i];
                        penalty+=(solvingTime+(firstAC-1)*ppenalty);
                    }
                }
            }
        }
        catch (SQLException e) {
            System.out.println("Connection Failed! Check output console");
            e.printStackTrace();

        }

        if (conn != null) {
            System.out.println("You made it, take control your database now!");
        } else {
            System.out.println("Failed to make connection!");

        }
        
    }
    boolean scoreboardManager(){
        try{
            //get total problems in the contest
            stmt = conn.createStatement();
            String sql = "SELECT `value` FROM `" + cDB + "`.`settings` WHERE `name`='problemCount' ";
            rs = stmt.executeQuery(sql);
            if (rs.next()) {
                problemCount = rs.getInt("value");
                System.out.println("number of problems=  "+problemCount);

            } else {
                System.out.println("fetching problemCount failed!");
                return false;
            }
            
            //getting penalty per wrong submission
            stmt = conn.createStatement();
            sql = "SELECT `value` FROM `" + cDB + "`.`settings` WHERE `name`='penalty' ;";
            rs = stmt.executeQuery(sql);
            if(rs.next()){
                ppenalty=rs.getInt("value");
                System.out.println("Penalty set to : "+ppenalty);
            }
            else {
                ppenalty=0;
                System.out.println("Penalty Time fetching failed !!! assumed 0\n\n\n\n\n\n\n\n\n ");
            }
            ////
            
            //getting scores of each problem
            pscore=new int[problemCount];
            stmt = conn.createStatement();
            sql = "SELECT `score`,`cpid` FROM `" + cDB + "`.`problem` ;";
            rs = stmt.executeQuery(sql);
            while(rs.next()){
                pscore[rs.getInt("cpid")]=rs.getInt("score");
            }
            ////
            
            ///checeking score
            for(int i=0;i<problemCount;i++)
                System.out.println("i= "+i+" scr= "+pscore[i]);
            
            
            ///
            
            
            
            
            
            
            
         } catch (SQLException se) {
//Handle errors for JDBC
            se.printStackTrace();
        } catch (Exception e) {
//Handle errors for Class.forName
            e.printStackTrace();
        } finally {
//finally block used to close resources

        }//end try
        return true;
        
        
        
    }
    public static void main(String[] argv) throws SQLException {

        Scoreboard obj = new Scoreboard(argv[0]);
        obj.init();
        obj.connect();
        
        obj.scoreboardManager();
        
        
        obj.disconnect();



        System.out.println("Goodbye! " + obj.cDB);
		//////

    }//end main
}//end FirstExample
