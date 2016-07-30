//package com.mkyong.common;

import java.io.*;
import java.nio.charset.Charset;
import java.sql.*;
import java.util.*;
import java.util.concurrent.TimeUnit;

public class JudgeCDB {

    String dir;
    String DB ;
    String pre; //get later
    int conid = 28, maxId = 2147483647;

    Connection conn = null;
    Statement stmt = null;
    ResultSet rs = null;

    long holdTime = 30;//in sec
    long execution_time = 0;//in milis

    int penalty;
    int problemCount;

    //verdicts
    int TLE = 1;
    int YES = 0;
    int WA = 2;
    int PE = 3;
    int RE = -1;
    int CE = -2;
    int SubmissionError = 100;

    public JudgeCDB(String s, String s1, String s2) {
        dir = s;
        pre = s2;
        DB = s1;

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

    void clear() {//clears stmt object
        try {
            if (stmt != null) {
                stmt.close();
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
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

    int checker(int pid, String pathInput, String pathOutput, String pathAnswer, boolean manualChecker) {//yes or no only
        int ret = 0;
        String cpath = "checker.exe";
        if (manualChecker) {
            cpath = "checker\\" + pid + "checker.exe";
        }

        String[] lst = {cpath, pathInput, pathOutput, pathAnswer};
        ProcessBuilder pb = new ProcessBuilder(lst);
        pb.redirectOutput(new File("res.txt"));
        pb.directory(new File(dir));
        try {
            Process pro = pb.start();

            pro.waitFor(5, TimeUnit.SECONDS);/////////////wait for how nuch time to check
            Scanner sc = new Scanner(new File(dir + "\\res.txt"));
            ret = sc.nextInt();

        } catch (Exception e) {
            e.printStackTrace();
        }
        System.err.println("Checker says: " + ret);

        return ret;
    }

    int judge(int id, int pid, int lang, int sid, boolean manualChecker, long limit) {

        String pathSubmission = "sub\\" + id + "\\Main.exe";
        String pathDirectory = "C:\\sandbox\\";  ///misdirect user program!!!
        String pathInput = "in\\" + pid + "\\" + sid + ".txt";
        String pathOutput = "sub\\" + id + "\\" + sid + ".txt";
        String pathAnswer = "out\\" + pid + "\\" + sid + ".txt";
        String pathError = "sub\\" + id + "\\err" + sid + ".txt";

        //pathSubmission="compiler.exe";

        /* System.out.println(pathSubmission);
         System.out.println(pathInput);
         System.out.println(pathOutput);
         System.out.println(pathError);*/
        int verdict = 0;

        ProcessBuilder pb;

        pb = new ProcessBuilder(pathSubmission);
        pb = pb.directory(new File(pathDirectory));
        pb = pb.redirectInput(new File(pathInput));
        pb = pb.redirectOutput(new File(pathOutput));
        pb = pb.redirectError(new File(pathError));
        Process process;
        int ret = -1;

        long start_time = System.currentTimeMillis();
        try {

            process = pb.start();
            System.err.println("Running........");

            process.waitFor(limit, TimeUnit.MILLISECONDS);
            if (!process.isAlive()) {
                ret = process.exitValue();
            }
            if (process.isAlive()) {
                verdict = TLE;
                System.out.println("Time limit Exceeded!! :'( ");
                process.destroy();
            }

        } catch (Exception e) {
            verdict = -100;
            System.out.println("Error In DataSet or Source");
            return SubmissionError;

        }
        execution_time = System.currentTimeMillis() - start_time;
        System.out.println(ret);
        System.out.println("Excecution: " + execution_time);
        if (verdict == TLE); else if (ret == 0) {
            verdict = checker(pid, pathInput, pathOutput, pathAnswer, manualChecker);

        } else {
            verdict = RE;
        }

        return verdict;

    }

    
    
    int getScoreICPC(int passed,int dscnt){
        return passed==dscnt?100:0;
    }
    
    void scoreBoardHandler(int id,int pid,int verdict,String cDB,int pscore,int uid) {

        Statement stmt2;
        ResultSet rs2;
        String sql;
        int cpid = 0;
        int facid = 0;
        ///get cpid,uid
        try {
            //getcpid
            sql = "SELECT `cpid` FROM `" + cDB + "`.`problem` WHERE `pid`= " + pid;
            stmt2 = conn.createStatement();
            rs2 = stmt2.executeQuery(sql);
            if (rs2.next()) {
                cpid = rs2.getInt("cpid");
                System.err.println("cpid= " + cpid);
            } else {
                System.err.println("couldn't get cpid");
            }
            if (stmt2 != null) {
                stmt2.close();
            }
       

            //get AC sub< id
            sql = "SELECT `firstac" + cpid + "` FROM `" + cDB + "`.`scoreboard` WHERE `uid`=" + uid;
            stmt2 = conn.createStatement();
            rs2 = stmt2.executeQuery(sql);
            if (rs2.next()) {
                facid = rs2.getInt("firstac" + cpid);
            } else {
                System.err.println("getting firstAcid failed!");
            }

            System.err.println("facid=" + facid);

            if (stmt2 != null) {
                stmt2.close();
            }

        } catch (SQLException se) {
//Handle errors for JDBC
            se.printStackTrace();
        } catch (Exception e) {
//Handle errors for Class.forName
            e.printStackTrace();
        }

        if (verdict == 0) {
            System.err.println("------updating Scoreboard.........");

            try {

                if (facid > id) ///if and only if new ac id is less than prev        
                {

                    //get WA sub< id
                    int wsub = 0;
                    sql = "SELECT COUNT(`id`) FROM `" + DB + "`.`submission` WHERE `id` <= " + id + " AND `uid`=" + uid + " AND `pid`= " + pid + " AND `conid` = " + conid + " AND `countable`= 1";
                    stmt2 = conn.createStatement();
                    rs2 = stmt2.executeQuery(sql);
                    if (rs2.next()) {
                        wsub = rs2.getInt("COUNT(`id`)");
                    } else {
                        System.err.println("Counting Wrong submission failed!");
                    }
                    if (stmt2 != null) {
                        stmt2.close();
                    }
                    System.err.println("wsub= " + wsub);

                    //update wrong submission count
                    sql = "UPDATE `" + cDB + "`.`scoreboard` SET `wrong" + cpid + "` = " + wsub + " WHERE `uid`= " + uid;
                    stmt2 = conn.createStatement();
                    if (stmt2.executeUpdate(sql) == 0) {
                        System.err.println("wrongCount update failed!!");
                    }
                    if (stmt2 != null) {
                        stmt2.close();
                    }

                    //get arrivaltime&calculate penalty
                    int pen = 0, arr = 0;
                    sql = "SELECT `arrtime` FROM `" + cDB + "`.`submission` WHERE `id`=" + id;
                    stmt2 = conn.createStatement();
                    rs2 = stmt2.executeQuery(sql);
                    if (rs2.next()) {
                        arr = pen = rs2.getInt("arrtime") / 60;//in minutes
                    } else {
                        System.err.println("Counting arrival time failed!");
                    }
                    if (stmt2 != null) {
                        stmt2.close();
                    }
                    System.err.println("arr= " + pen);

                    pen += (penalty * wsub);
                    //remove privious penalty and add new one
                    String sql2, sql3;
                    sql = "UPDATE `" + cDB + "`.`scoreboard` SET `firstac" + cpid + "` = " + id
                            + ", `penalty`=`penalty`-`penalty" + cpid + "` ,"
                            + "`score`=`score`-`score" + cpid + "` WHERE `uid`=" + uid + ";";
                    // 

                    sql2 = "UPDATE `" + cDB + "`.`scoreboard` SET `penalty" + cpid + "` = " + pen + ", `score" + cpid + "` = " + pscore
                            + " ,`penalty`=`penalty`+`penalty" + cpid + "` , `score`=`score`+`score" + cpid + "` WHERE `uid` = " + uid + ";";

                    stmt2 = conn.createStatement();
                    if (stmt2.executeUpdate(sql) == 0) {
                        System.err.println("score clac pt-1 failed! ");
                    }
                    if (stmt2 != null) {
                        stmt2.close();
                    }
                    stmt2 = conn.createStatement();
                    if (stmt2.executeUpdate(sql2) == 0) {
                        System.err.println("score clac pt-2 failed! ");
                    }
                    if (stmt2 != null) {
                        stmt2.close();
                    }

                    System.err.println("Updated scoreboard");

                } else {
                    System.err.println("Result is already better. quitting!");
                }

            } catch (SQLException se) {
//Handle errors for JDBC
                se.printStackTrace();
            } catch (Exception e) {
//Handle errors for Class.forName
                e.printStackTrace();
            }

        } else {//wrong sub //countable modify later

            try {
                int wsub = 0;
                sql = "SELECT COUNT(`id`) FROM `" + DB + "`.submission WHERE `countable`=1 AND `pid`= " + pid + " AND `uid`=" + uid + " AND `conid`= " + conid;
                System.err.println("sql count: " + sql);
                stmt2 = conn.createStatement();
                rs2 = stmt2.executeQuery(sql);
                if (rs2.next()) {
                    wsub = rs2.getInt("COUNT(`id`)");
                } else {
                    System.err.println("wsub counting failed - it's a wrong submission");
                }

                sql = "UPDATE `" + cDB + "`.`scoreboard` SET `score" + cpid + "`= 0 , `penalty" + cpid + "` = 0  ,"
                        + " `firstac" + cpid + "`= " + maxId + " , `wrong" + cpid + "` = " + wsub + " WHERE `uid`= " + uid + " AND `firstac" + cpid + "` >= " + id;
                System.err.println(sql);
                if (stmt2.executeUpdate(sql) == 0) {
                    System.err.println("couldn't update wrong sub- this is a wrong sub");
                }

                if (stmt2 != null) {
                    stmt2.close();
                }
            } catch (SQLException se) {
//Handle errors for JDBC
                se.printStackTrace();
            } catch (Exception e) {
//Handle errors for Class.forName
                e.printStackTrace();
            }

        }

    }

    void judgeManager(int id, int pid, int lang,String cDB,int uid) {

        int verdict = 0;
        execution_time=0;
        
        ///compile the code. then run

        String cmd[] = {"compiler.exe ", "" + lang,};
        ProcessBuilder pb = new ProcessBuilder(cmd);
        try {
            pb.directory(new File(dir + "\\sub\\" + id + "\\"));
            Process compiler = pb.start();
            compiler.waitFor(10, TimeUnit.SECONDS); //maxcompile time =10 sec
            verdict = compiler.exitValue();
        } catch (Exception e) {
            System.err.println("Compiler execution failed!!");
            verdict = SubmissionError;
            e.printStackTrace();
        }

        //compiling finished!
        long runtime = 0;

        long tl = 5000;
        int dsCnt = 0;
        int passedTest=0;

        String sql = "SELECT * FROM `" + DB + "`.problem WHERE `pid`=" + pid;
        try {
            Statement stmt2 = conn.createStatement();
            ResultSet rs2 = stmt2.executeQuery(sql);
            if (rs2.next()) {
                tl = rs2.getInt("tl");
                dsCnt = rs2.getInt("dscnt");
            }
            if (stmt2 != null) {
                stmt2.close();
            }
        } catch (SQLException se) {
//Handle errors for JDBC
            se.printStackTrace();
        } catch (Exception e) {
//Handle errors for Class.forName
            e.printStackTrace();
        }

        System.err.println("\n\n*Starting judgement of submission: " + id + " of problem: " + pid + " with ds= " + dsCnt);
        
        for ( passedTest = 0; passedTest < dsCnt; passedTest++) {
            if (verdict != 0) {
                break;
            }
            verdict = judge(id, pid, lang, passedTest, false, tl);//calling the judge here
            if (verdict != 0) {
                break;
            }
            runtime = Math.max(runtime, execution_time);
        }
        sql = "UPDATE `" + DB + "`.`submission` SET flag = " + verdict + " , runtime = " + execution_time + " WHERE id = " + id;
        // System.err.println(sql);
        try {
            Statement stmt2 = conn.createStatement();
            int cnt = stmt2.executeUpdate(sql);
            if (stmt2 != null) {
                stmt2.close();
            }
        } catch (SQLException se) {
//Handle errors for JDBC
            se.printStackTrace();
        } catch (Exception e) {
//Handle errors for Class.forName
            e.printStackTrace();
        }

        System.err.println("# Judgement Complete with verdict: " + verdict + " with runtime= " + runtime + "\n\n");

        scoreBoardHandler(id,pid,verdict,cDB,getScoreICPC(passedTest, dsCnt),uid);

        return;
    }

    boolean hold(int id, String exceed) throws SQLException {//holding a submission
        stmt = conn.createStatement();
        String nl = " IS NULL ";
        if (!(exceed == null)) {
            nl = " = " + exceed;
        }
        //if(exceed.contains("null"));
        /*else exceed="";// =" IS NULL ";*/
        String sql = "UPDATE `" + DB + "`.`submission` SET `hold`=" + (System.currentTimeMillis() / 1000) + " WHERE `id`= " + id + " AND ( hold " + nl + " ) ;";
        //System.out.println(sql);
        int ret = stmt.executeUpdate(sql);
        System.out.println("hold = " + id);
        if (ret == 1) {
            return true;
        }
        return false;
    }

    int fetchSub() {
        int cnt_r = 0;
        try {

            ////continuous sub judging
            stmt = conn.createStatement();
            long expireTime = (System.currentTimeMillis() / 1000 - holdTime);

            String sql = "SELECT * FROM `" + DB + "`.`submission` WHERE (`flag` IS NULL) AND(`hold` IS NULL OR `hold` < " + expireTime + " );";

            rs = stmt.executeQuery(sql);
//STEP 5: Extract data from result set
            while (rs.next()) {
//Retrieve by column name
                int id = rs.getInt("id");
                //System.out.println(id+" "+rs.getString("hold"));
                if (hold(id, rs.getString("hold"))) {//look if it's still free
                    judgeManager(id, rs.getInt("pid"), rs.getInt("lang"),pre+rs.getInt("conid"),rs.getInt("uid"));
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

        JudgeCDB obj = new JudgeCDB(System.getProperty("user.dir"), argv[0], argv[1]);
        obj.init();
        obj.connect();
        obj.fetchSub();
        //query();

        ////fetch setting...
        System.out.println("Goodbye!");

    }//end main
}
