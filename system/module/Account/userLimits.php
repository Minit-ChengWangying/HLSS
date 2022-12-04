<?php
/* ----------------------------------------------------------
* Software: [HLSS 龙泉高中学分管理系统]
* -----------------------------------------------------------
* Author: 王迈新
* Copyright (c) 2022, www.minitegi.xyz. All Rights Reserved.
* ----------------------------------------------------------- */
namespace Module\Account;

class user_limits {
    protected $db = 'DataBaseMaintaining';
    /**
     * Author: WangMaixin
     * version: 202211052128
     * @return
     */
    public function __construct() {
        $host = 'rm-bp1923307guk6ks3fxo.mysql.rds.aliyuncs.com';
        $databaseuser = 'minit';
        $password = 'minit000666!';
        $databasename = 'hlss';
        // Connect database
        $this->db = mysqli_connect( $host, $databaseuser, $password, $databasename);
        // Define encoding UTF-8
        $this->db->query("SET NAMES UTF8");
        // var_dump($this->db);
    }
    public function get() {
        // $this->connectMysql();
        var_dump($this->db);
    }
    
    /** 
     *  Author: WangMaixin
     *  version: 202211052041
     *  @package
     */
    public function Limits($Limits) {
        // self::connectMysql();
        $Username = $_SESSION['loginState'];
        // var_dump($Username);
        $selectUserLimits = "select * from user where username = '$Username' AND limits like '%$Limits%';";
        $selectUserLimits_result = $this->db->query($selectUserLimits)->fetch_array( MYSQLI_ASSOC );
        // var_dump($selectUserLimits_result);
        if($selectUserLimits_result == NULL) {
            echo '<script>alert("请联系管理员申请访问！");history.back();</script>';
            return 'NoLimit';
            exit;
        }
    }
}
?>