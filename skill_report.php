<?php
    //connect mysql and fetch data
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '70187017';
    $dbname = 'test';

    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db($dbname);
    $count=$_REQUEST['count'];
    $start=$_REQUEST['start'];
    $key=$_REQUEST['key'];
    // $function = $_REQUEST['function'];
    // $email = $_REQUEST["email"];
    // $password = $_REQUEST["password"];
    // $friend_registerd=0;


    // if($function==1){//login
    //     $sql = "SELECT * FROM `debt_accounts` WHERE Email = '{$email}'";
    //     $result = mysql_query($sql) or die('MySQL query error');
    //     if(mysql_num_rows($result)== 0){
	   //      echo '{"login_result":"There is no such account."}';
    //     }
    //     else{
    // 	    $row = mysql_fetch_array($result);
 	 	//     if($row['Password']!=$password){
 	  //  	        echo '{"login_result":"Password is incorrect"}';
    //         }
    //         else{
 	  //           $name = $row['Name'];
    //             echo '{"login_result":"',$name,',You have logged in Chain Chain Lai!!!!"}';	
    //         }
    //     }
    // }
    // else if($function==2){ //query friends
        // $sql = "SELECT * FROM `debt_friends` WHERE Email = '{$email}'";
        // $result = mysql_query($sql) or die('MySQL query error');
        if($count==''){$count=10;}
        if($start==''){$start=1;}
        $result_json=array();
        // while($row = mysql_fetch_array($result)){
        //for($i=$start;$i<($start+$count);$i++){
        $sql = "SELECT * FROM `stoneage_skill` WHERE detail1 LIKE '%{$key}%' OR detail2 LIKE '%{$key}%' OR detail3 LIKE '%{$key}%' OR detail4 LIKE '%{$key}%' LIMIT {$start},{$count}";
        $result = mysql_query($sql) or die('MySQL query error');
        while($row = mysql_fetch_array($result)){
            array_push($result_json,array('pet_name'=>$row['title'],'mp_skill1'=>$row['sp1'],'skill1'=>$row['detail1'],'skill2'=>$row['detail2'],'skill3'=>$row['detail3'],'skill4'=>$row['detail4']));
        }
        //}
            
        // }
        // $sql = "SELECT * FROM `debt_friends_registered` WHERE Emai-l = '{$email}'";
        // $result = mysql_query($sql) or die('MySQL query error');
        
        // while($row = mysql_fetch_array($result)){
        //    $friend_email=$row['FriendEmail'];
        //    $sql = "SELECT * FROM `debt_accounts` WHERE Email = '{$friend_email}'";
        //    $result2 = mysql_query($sql) or die('MySQL query error');
        //    $row2 = mysql_fetch_array($result2);
        //     array_push($result_json,array('friend_name'=>$row2['Name'],'registered'=>'1'));
        // }
        //print_r($result_json);
        //echo array("result"=>$result_json),"";
        echo json_encode(array("result"=>$result_json,"name"=>"stan")),"";

    // } 
    // mysql_close($conn);

?> 
