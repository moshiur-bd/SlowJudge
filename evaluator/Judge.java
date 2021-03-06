//package com.mkyong.common;

import java.io.*;
import java.lang.management.*;

import java.nio.charset.Charset;
import java.nio.file.Files;
import java.nio.file.Path;
import java.sql.*;
import java.util.*;
import java.util.concurrent.TimeUnit;

public class Judge {

    boolean exitNow = false;
    String dir;
    String DB;
    String pre; //get later
    int  maxId = 2147483647;

    Connection conn = null;
    Statement stmt = null;
    PreparedStatement pstmt = null;
    ResultSet rs = null;

    long holdTime = 30;//in sec
    long execution_time = 0;//in milis

    int penalty=20;
    int problemCount;
    ThreadMXBean bean;

    //verdicts
    int TLE = 1;
    int YES = 0;
    int WA = 2;
    int PE = 3;
    int RE = -1;
    int CE = -2;
    int SubmissionError = 100;
    String ext="";

    public Judge(String SlowjudgeDir, String DB, String cDB_pre) {
        this.dir = SlowjudgeDir;
        this.pre = cDB_pre;
        this.DB = DB;
        System.err.println("Directory:" + this.dir);
        bean = ManagementFactory.getThreadMXBean();

    }
    /* ManagementFactory functions*/

    /**
     * Get CPU time in nanoseconds.
     */
    public long getCpuTime(int id) {
        ThreadMXBean bean = ManagementFactory.getThreadMXBean();
        return bean.isCurrentThreadCpuTimeSupported()
                ? bean.getThreadCpuTime(id) : 0L;
    }

    /**
     * Get user time in nanoseconds.
     */
    public long getUserTime(int id) {
        ThreadMXBean bean = ManagementFactory.getThreadMXBean();
        return bean.isCurrentThreadCpuTimeSupported()
                ? bean.getThreadUserTime(id) : 0L;
    }

    /**
     * Get system time in nanoseconds.
     */
    public long getSystemTime(int id) {
        ThreadMXBean bean = ManagementFactory.getThreadMXBean();
        return bean.isCurrentThreadCpuTimeSupported()
                ? (bean.getThreadCpuTime(id) - bean.getThreadUserTime(id)) : 0L;
    }

    /**
     * ****************************
     */
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

    int checker(int pid, String pathInput, String pathOutput, String pathAnswer, String pathSubmissionDir, boolean manualChecker,int sid) {//yes or no only
        int ret = 0;
        String cpath = "checker\\TrailingWhiteSpaceAllowed.exe";
        if (manualChecker) {
            cpath = "checker\\" + pid + "checker.exe";
        }

        String[] lst = {cpath, pathInput, pathOutput, pathAnswer};
        ProcessBuilder pb = new ProcessBuilder(lst);
        pb.redirectOutput(new File(pathSubmissionDir + "\\"+sid+".verdict"));
        pb.redirectError(new File(pathSubmissionDir + "\\"+sid+".checker"));
        pb.directory(new File(dir));
        try {
            Process pro = pb.start();

            pro.waitFor(10, TimeUnit.SECONDS);/////////////wait for how nuch time to check
            Scanner sc = new Scanner(new File(pathSubmissionDir + "\\"+sid+".verdict"));
            ret = sc.nextInt();
            sc.close();

        } catch (Exception e) {
			ret=SubmissionError;
            e.printStackTrace();

        }
        System.err.println("Checker says: " + ret);

        return ret;
    }

    long judge(int id, int pid, int lang, int sid, boolean manualChecker, long limit) {

        String pathWatcher = "watcher.exe";
        String pathSubmission = dir + "\\sub\\" + id + "\\Main.exe";
        String pathSubmissionDir = dir + "\\sub\\" + id ;

        String pathDirectory = "C:\\sandbox\\";  ///misdirect user program!!!
        String pathInput = "in\\" + pid + "\\" + sid + ".txt";
        String pathOutput = "sub\\" + id + "\\" + sid + ".txt";
        String pathAnswer = "out\\" + pid + "\\" + sid + ".txt";
        String pathError = "sub\\" + id + "\\err" + sid + ".txt";
        String pathInfo = dir + "\\sub\\" + id + "\\info" + sid + ".txt";

        //pathSubmission="compiler.exe";
        //System.out.println(pathSubmission);
        /*
         System.out.println(pathInput);
         System.out.println(pathOutput);
         System.out.println(pathError);*/
        long verdict = 0;

        ProcessBuilder pb;

        String cmdline[] = {pathWatcher, pathSubmission, "" + limit, "512", pathInfo};

        pb = new ProcessBuilder(cmdline);
        pb = pb.directory(new File(pathDirectory));
        pb = pb.redirectInput(new File(pathInput));
        pb = pb.redirectOutput(new File(pathOutput));
        pb = pb.redirectError(new File(pathError));
        Process process;
        int ret = -1;
        long start_time = System.currentTimeMillis(); //System.currentTimeMillis();//change
        try {

            process = pb.start();
            System.err.println("Running........");

            process.waitFor(410000, TimeUnit.MILLISECONDS);//MAXLIMIT

            Scanner rep = new Scanner(new File(pathInfo));
            verdict = -100;
            if (rep.hasNext()) {
                execution_time = rep.nextInt();
            }
            if (rep.hasNext()) {
                verdict = rep.nextLong();
            }
            rep.close();

            System.out.println("watcher:"+execution_time+" "+verdict);

        } catch (Exception e) {
            verdict = -100;
            System.out.println("Error In DataSet or Source");
            return SubmissionError;

        }

        if (verdict == TLE);
        else if (verdict == 0) {
            verdict = checker(pid, pathInput, pathOutput, pathAnswer,pathSubmissionDir, manualChecker,sid);

        } else {
            verdict = RE;
        }

        return verdict;

    }

    int getScoreICPC(int passed, int dscnt) {
        return passed == dscnt ? 100 : 0;
    }

    void updateScoreSum(String cDB, int uid) {

        String sql = "SELECT `problemCount` FROM `" + cDB + "`.settings";
        try {
            Statement stmtsc = conn.createStatement();
            ResultSet rssc = stmtsc.executeQuery(sql);
            if (rssc.next()) {
                problemCount = rssc.getInt("problemCount");
            } else {
                System.err.println("No result found");
            }
            rssc.close();
            stmtsc.close();

        } catch (Exception e) {
            e.printStackTrace();
        }

        System.err.println("************ " + cDB + " *** " + problemCount);

        /*sql = "UPDATE `" + cDB + "`.scoreboard SET `score`=0,`penalty`=0  WHERE `uid`=" + uid;
        System.err.println(sql);
        try {
            Statement stmtsc = conn.createStatement();
            stmtsc.executeUpdate(sql);
            stmtsc.close();

        } catch (Exception e) {
            e.printStackTrace();
        }*/

        String scrstr = "`score`=0";
        for (int i = 0; i < problemCount; i++) {
            scrstr += "+`score" + i + "`";
        }

        String penstr = "`penalty`=0";
        for (int i = 0; i < problemCount; i++) {
            penstr += "+`penalty" + i + "`";
        }

        sql = "UPDATE `" + cDB + "`.scoreboard"+ext+" SET " + scrstr + " , " + penstr + "  WHERE `uid`=" + uid;
        try {
            Statement stmtsc = conn.createStatement();
            stmtsc.executeUpdate(sql);
            stmtsc.close();

        } catch (Exception e) {
            e.printStackTrace();
        }

    }

    void scoreBoardHandler(int id, int pid, long verdict, String cDB, int pscore, int uid,int conid) {

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
            sql = "SELECT `firstac" + cpid + "` FROM `" + cDB + "`.`scoreboard"+ext+"` WHERE `uid`=" + uid;
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

        if (verdict == YES) {
            System.err.println("------updating Scoreboard in YES.........");

            try {

                if (facid >= id) ///if and only if new ac id is less than prev
                {

                    //get WA sub< id
                    int wsub = 0;
                    sql = "SELECT COUNT(`id`) FROM `" + DB + "`.`submission` WHERE `id` < " + id + " AND `uid`=" + uid + " AND `pid`= " + pid + " AND `conid` = " + conid + " AND `countable`= 1";
                    System.out.println(sql);
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
                    sql = "UPDATE `" + cDB + "`.`scoreboard"+ext+"` SET `wrong" + cpid + "` = " + wsub + " WHERE `uid`= " + uid;
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

                    pen += (penalty * (wsub));
                    System.err.println("***Total Penalty = " + pen + " p= "+penalty);

                    //remove privious penalty and add new one
                    String sql2, sql3;
                    sql = "UPDATE `" + cDB + "`.`scoreboard"+ext+"` SET `firstac" + cpid + "` = " + id
                            + ", `penalty`=`penalty`-`penalty" + cpid + "` ,"
                            + "`score`=`score`-`score" + cpid + "` WHERE `uid`=" + uid + ";";
                    //

                    sql2 = "UPDATE `" + cDB + "`.`scoreboard"+ext+"` SET `penalty" + cpid + "` = " + pen + ", `score" + cpid + "` = " + pscore
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

                    System.err.println("Updated scoreboard"+ext+"");

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
            System.err.println("------updating scoreboard"+ext+" in NO.........");
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

                sql = "UPDATE `" + cDB + "`.`scoreboard"+ext+"` SET `score" + cpid + "`= 0 , `penalty" + cpid + "` = 0  ,"
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

        updateScoreSum(cDB, uid);

    }

    void judgeManager(int id, int pid, int lang, String cDB, int uid, String subtype,int conid) {

        long verdict = 0;
        execution_time = 0;

        ///compile the code. then run
        String cmd[] = {"compiler.exe ", "" + lang,};
        ProcessBuilder pb = new ProcessBuilder(cmd);
        try {
            pb.directory(new File(dir + "\\sub\\" + id + "\\"));
            Process compiler = pb.start();
            compiler.waitFor(15, TimeUnit.SECONDS); //maxcompile time =15 sec
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
        int passedTest = 0;

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

        for (passedTest = 0; passedTest < dsCnt; passedTest++) {
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

        scoreBoardHandler(id, pid, verdict, cDB, getScoreICPC(passedTest, dsCnt), uid,conid);

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
        if (stmt != null) {
            stmt.close();
        }

        if (ret == 1) {
            return true;
        }
        return false;
    }

    boolean haltInterrupt() {//this function get the response from manager via database. if it returns 0 judging get stops. and exit from this program
        try {
            Statement stat = conn.createStatement();
            ResultSet res = stat.executeQuery("SELECT `status` FROM `" + DB + "`.judge");
            if (res.next()) {
                return exitNow = res.getString("status").equalsIgnoreCase("halting") || res.getString("status").equalsIgnoreCase("off");
            }
            if (stat != null) {
                stat.close();
            }

        } catch (SQLException e) {
            System.err.println("judge status fetching failed!");
            e.printStackTrace();

        }
        return false;
    }

    int on() {//set judge status to on
        try {
            Statement stat = conn.createStatement();

            int ret = stat.executeUpdate("UPDATE  `" + DB + "`.judge SET `status`='on' ");
            if (stat != null) {
                stat.close();
            }
            return ret;

        } catch (SQLException e) {
            System.err.println("judge status fetching failed!");
            e.printStackTrace();

        }
        return 0;
    }

    int off() {//set judge status to off
        try {
            Statement stat = conn.createStatement();

            int ret = stat.executeUpdate("UPDATE  `" + DB + "`.judge SET `status`='off' ");
            if (stat != null) {
                stat.close();
            }
            return ret;

        } catch (SQLException e) {
            System.err.println("judge status fetching failed!");
            e.printStackTrace();

        }
        return 0;
    }

    int fetchSub() {
        int cnt_r = 0;
        try {

            ////continuous sub judging
            stmt = conn.createStatement();
            long expireTime = (System.currentTimeMillis() / 1000 - holdTime);
            pstmt = conn.prepareStatement("SELECT * FROM `" + DB + "`.`submission` WHERE (`flag` IS NULL) AND(`hold` IS NULL OR `hold` < " + expireTime + "  ) AND `type`=? ;");

            pstmt.setString(1, "official");
            ext="";

            rs = pstmt.executeQuery();

            while (rs.next()) {

                int id = rs.getInt("id");
                //System.out.println(id+" "+rs.getString("hold"));
                if (hold(id, rs.getString("hold"))) {//look if it's still free
                    judgeManager(id, rs.getInt("pid"), rs.getInt("lang"), pre + rs.getInt("conid"), rs.getInt("uid"), "official",rs.getInt("conid"));
                }
                cnt_r++;
                if (haltInterrupt()) {
                    break;
                }

            }
            if (exitNow) {
                return cnt_r;
            }
            
            ext="unofficial";

            if (cnt_r == 0) {
                pstmt.setString(1, "unofficial");

                rs = pstmt.executeQuery();

                if (rs.next()) {

                    int id = rs.getInt("id");
                    //System.out.println(id+" "+rs.getString("hold"));
                    if (hold(id, rs.getString("hold"))) {//look if it's still free
                        judgeManager(id, rs.getInt("pid"), rs.getInt("lang"), pre + rs.getInt("conid"), rs.getInt("uid"), "unofficial",rs.getInt("conid"));
                    }
                    cnt_r++;

                }

            }

            if (pstmt != null) {
                pstmt.close();
            }
        } catch (SQLException se) {
//Handle errors for JDBC
            se.printStackTrace();
        } catch (Exception e) {
//Handle errors for Class.forName
            e.printStackTrace();
        } finally {

        }//end try
        return cnt_r;

    }

    public static void main(String[] argv) throws SQLException {
        Judge obj = new Judge(argv[0], argv[1], argv[2]);
        obj.init();
        obj.connect();

        obj.on();//set judge status on
        obj.haltInterrupt();
        while (true) {

            if (obj.haltInterrupt()) {
                break;
            }
            if (obj.fetchSub() == 0) {
                try {
                    int sleep_sec=7;
                    System.err.println("No Solution to judge. Sleeping for " + sleep_sec + " seconds");
                    Thread.sleep(sleep_sec * 1000);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }

        };

        obj.off();
        obj.disconnect();
        System.out.println("Goodbye!");

    }//end main
}
