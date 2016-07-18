//package com.mkyong.common;
import java.io.*;
import java.nio.charset.Charset;
import java.sql.*;
import java.util.*;
import java.util.concurrent.TimeUnit;

public class DBConn {
    public static String dir;
    public static String conDB="slowjudge";
    public static String uDB="mosuser";


    public static Connection conn = null;
    public static Statement stmt = null;
    public static ResultSet rs = null;



    public static long holdTime = 1 * 0;//in sec
    public static int turn = 2;

    public static boolean init() {
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

    public static boolean connect() {

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

    public static void disconnect() {
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


    public static int  checker(int pid,String pathInput,String pathOutput,String pathAnswer,boolean mchk){//yes or no only
        int ret=0;
        String cpath="checker.exe";
        if(mchk)cpath="checker\\"+pid+"checker.exe";

        String []lst={cpath,pathInput,pathOutput,pathAnswer};
        ProcessBuilder pb=new ProcessBuilder(lst);
        pb.redirectOutput(new File("res.txt"));
        System.out.println(dir);
        pb.directory(new File(dir));
        try{
            Process pro=pb.start();

            pro.waitFor(5, TimeUnit.SECONDS);/////////////wait for how nuch time to check
            Scanner sc=new Scanner(new File(dir+"\\res.txt"));
            ret=sc.nextInt();

        }
        catch(Exception  e){
            e.printStackTrace();
        }

        return ret;
    }

    public static void judge(int id,int pid,int lang,int sid,boolean mchk){

        String pathSubmission="sub\\"+id+"\\Main.exe";
        String pathDirectory="C:\\windows\\";  ///misdirect user program!!!
        String pathInput="in\\"+pid+"\\"+sid+".txt";
        String pathOutput="sub\\"+id+"\\"+sid+".txt";
        String pathAnswer="out\\"+pid+"\\"+sid+".txt";
        String pathError="sub\\"+id+"\\err"+sid+".txt";


        //pathSubmission="compiler.exe";

       /* System.out.println(pathSubmission);
        System.out.println(pathInput);
        System.out.println(pathOutput);
        System.out.println(pathError);*/



        int verdict=0;
        int limit =5000;
        int TLE=1;
        int YES=0;
        int WA=2;
        int PE=3;
        int RE=-1;

        ProcessBuilder pb;

        pb=new ProcessBuilder(pathSubmission);
        pb=pb.directory(new File(pathDirectory));
        pb=pb.redirectInput(new File(pathInput));
        pb=pb.redirectOutput(new File(pathOutput));
        pb=pb.redirectError(new File(pathError));
        Process process;
        int ret=-1;



        long start_time=System.currentTimeMillis();
        try
        {

            process=pb.start();
            System.err.println("Running........");


            process.waitFor(limit, TimeUnit.MILLISECONDS);
            if(!process.isAlive())
                ret=process.exitValue();
            if(process.isAlive()){
                verdict=TLE;
                System.out.println("Time limit Exceeded!! :'( ");
                process.destroy();
            }



        }
        catch(Exception e){
            verdict=-100;
            System.out.println("Error In DataSet or Source");
            return ;

        }
        long execution_time=System.currentTimeMillis()-start_time;
        System.out.println(ret);
        System.out.println("Excecution: "+execution_time);
        if(verdict==TLE);
        else if(ret==0){
            verdict=checker(pid,pathInput,pathOutput,pathAnswer,mchk);


        }
        else verdict=-1;
        System.out.println("Final Verdict Is = "+verdict);
        String sql="UPDATE `"+conDB+"`.`submission` SET flag = "+verdict+" , runtime = "+execution_time+" WHERE id = "+id;
        System.err.println(sql);
        try{
        stmt=conn.createStatement();
        int cnt=stmt.executeUpdate(sql);
        }
        catch(Exception e){
            e.printStackTrace();
        }

    }

       public static void judgeManager(int id,int pid,int lang){

        judge(id,pid,lang,1,false);
        return;
    }


     public static boolean  hold(int id,String exceed) throws SQLException{//holding a submission
        stmt=conn.createStatement();
        String nl=" IS NULL ";
        if(!(exceed==null))
            nl= " = " +exceed ;
        //if(exceed.contains("null"));
        /*else exceed="";// =" IS NULL ";*/
        String sql="UPDATE `"+conDB+"`.`submission` SET `hold`="+(System.currentTimeMillis()/1000)+" WHERE `id`= "+id+" AND ( hold "+nl+" ) ;";
        //System.out.println(sql);
        int ret=stmt.executeUpdate(sql);
        System.out.println("hold = "+id);
        if(ret==1)return true;
        return false;
    }




    public static int fetchSub() {
        int cnt_r = 0;
        try {

            ////continuous sub judging
            stmt = conn.createStatement();
            long expireTime = (System.currentTimeMillis()/1000 - holdTime);

            String sql = "SELECT * FROM `"+conDB+"`.`submission` WHERE (`flag` IS NULL) AND(`hold` IS NULL OR `hold` < " + expireTime + " );";

            rs = stmt.executeQuery(sql);
//STEP 5: Extract data from result set
            while (rs.next()) {
//Retrieve by column name
                int id = rs.getInt("id");
                //System.out.println(id+" "+rs.getString("hold"));
                if(hold(id,rs.getString("hold"))){//look if it's still free
                    judgeManager(id,rs.getInt("pid"),rs.getInt("lang"));
                }
                cnt_r++;
            }
//STEP 6: Clean-up environment

        } catch (SQLException se) {
//Handle errors for JDBC
            se.printStackTrace();
        } catch (Exception e) {
//Handle errors for Class.forName
            e.printStackTrace();
        } finally {
//finally block used to close resources

        }//end try
        return cnt_r;

    }


    public static void main(String[] argv) throws SQLException {
        dir=System.getProperty("user.dir");/// dir
        init();
        connect();
        fetchSub();
        //query();


        ////fetch setting...
        System.out.println("Goodbye!");

    }//end main
}//end FirstExample
