//package com.mkyong.common;
import java.io.*;
import java.nio.charset.Charset;
import java.sql.*;
import java.util.*;
import java.util.concurrent.TimeUnit;

public class Timer {

    String dir;
    String cDB = "slowjudge";
    String DB = "mosuser";

    Connection conn = null;
    Statement stmt = null;
    ResultSet rs = null;

    long delay = 5000;//in milis
    long remaining = 5000;//in milis
    long duration = 5000;//in milis

    public Timer(String s) {
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
    void clear() throws SQLException{//clears stmt object
        if(stmt != null) {
            stmt.close();
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

    long increaseTime() {
        long elapsed = 0;
        long stamp = 0;
        try {
            //get previous time record
            stmt = conn.createStatement();
            String sql = "SELECT `elapsed`,`stamp` FROM `" + cDB + "`.`time` ";
            rs = stmt.executeQuery(sql);
            if (rs.next()) {
                elapsed = rs.getLong("elapsed");
                stamp = rs.getLong("stamp");
            } else {
                System.err.println("No result found for getTime");
            }
            if (elapsed >= duration) {//contest duration over
                return elapsed;
            }

            long now = System.currentTimeMillis();
            long dist = now - stamp;
            //check if system got shut!!
            if (dist > (delay + 1000)) {
                sql = "UPDATE `" + cDB + "`.`time` SET `stamp`=" + now + " WHERE 1;";
                stmt = conn.createStatement();
                int ret = stmt.executeUpdate(sql);
                if (ret != 1) {
                    System.out.println("Something wrong in updating time after shutdown/pause!");
                }

                System.out.println("Timer/System got shut");

            } else {

                elapsed += dist;
                sql = "UPDATE `" + cDB + "`.`time` SET `elapsed`=" + elapsed + ", `stamp`=" + now + " WHERE 1;";
                stmt = conn.createStatement();
                int ret = stmt.executeUpdate(sql);
                if (ret != 1) {
                    System.out.println("SOmething wrong in update op");
                }

            }

        } catch (SQLException se) {
//Handle errors for JDBC
            se.printStackTrace();
        } catch (Exception e) {
//Handle errors for Class.forName
            e.printStackTrace();
        } finally {
//finally block used to close resources

        }//end try

        return elapsed;

    }

    void timeManager() {
        try {
            //get duration &delay
            stmt = conn.createStatement();
            String sql = "SELECT * FROM `" + cDB + "`.`settings`";
            rs = stmt.executeQuery(sql);
            if (rs.next()) {
                duration = rs.getLong("duration");
                delay = rs.getLong("delay");

            } else {
                System.out.println("fetching settings failed!");
            }
            clear();


            //continuous time upgrading....
            while (true) {
                //know if the contest is running or not!
                stmt = conn.createStatement();
                sql = "SELECT `status` FROM `" + cDB + "`.`settings`";
                rs = stmt.executeQuery(sql);
                if (rs.next()) {
                    String status = rs.getString("status");
                    if (status.equals("running")) {
                        remaining = duration - increaseTime();
                        long sleepTime = Math.min((2*delay)/3, remaining);
                        System.out.println("Sleeping for " + sleepTime);
                        if (remaining <= 0) {
                            System.out.println("Contest is over!");
                            sql = "UPDATE `" + cDB + "`.`settings` SET `status`='finished';";
                            //stmt is used so new declaration
                            Statement stmt2 = conn.createStatement();
                            int ret = stmt2.executeUpdate(sql);
                            if (ret != 1) {
                                System.out.println("Someting wrong updating contest status!");
                            }
                            //clear stmt
                            if(stmt2 != null) {
                                stmt2.close();
                             }

                            return;
                        } else {
                            Thread.sleep(sleepTime);
                        }
                    } else {
                        System.err.println("Contest is " + status);
                        return;
                    }
                } else {
                    System.out.println("contest status fetching failed!");
                    break;
                }
            }

        } catch (SQLException se) {
//Handle errors for JDBC
            se.printStackTrace();
        } catch (Exception e) {
//Handle errors for Class.forName
            e.printStackTrace();
        } finally {
//finally block used to close resources

        }//end try

    }

    public static void main(String[] argv) throws SQLException {

        Timer obj = new Timer(argv[0]);
        obj.init();
        obj.connect();

        obj.timeManager();
        obj.disconnect();

        System.out.println("Goodbye! " + obj.cDB);

    }//end main
}
