<!DOCTYPE html>
<html>
<body>

<h1>Stone Age - reg</h1>


<?php
    //connect mysql and fetch data
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '70187017';
    $dbname = 'test';

    $conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
    mysql_query("SET NAMES 'utf8'");
    mysql_select_db($dbname);

    $pet_num=1;    
    // for($pet_num=1;$pet_num<=513;$pet_num++){
    $url="https://sadb.lisezdb.com/pets-{$pet_num}" ;
    echo $url;
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_HEADER,false);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:50.0) Gecko/20100101 Firefox/50.0");
    $temp=curl_exec($ch);
   // $temp="<div class=\"div-table-th\">2</div>";
    preg_match_all("/headline\">.*?<\/h1>/",$temp,$titlearray);
    
    $title=preg_replace("/headline\">/",'',$titlearray[0][0]);
    $title=preg_replace("/<\/h1>/",'',$title);
    echo "<br>----------------------------------{$title}";
    preg_match_all("/<div class=\"row\"> <div class=\"div-table\".*<\/p><\/div> <\/div> <\/div> <\/div>/",$temp,$matches);
    print_r($matches);
    echo "<br>----------------------------------<br>";
    $matches2=preg_split("/<div class=\"div-table-td\"><p>|<div class=\"div-table-th\">+/",$matches[0][0]);
    print_r($matches2);
    echo "<br>----------------------------------<br>";
    for($i=0;$i<count($matches2);$i++){//"<div class=\"row\">"
     $matches2[$i]=preg_replace("/<.*?>/",'',$matches2[$i]);
    }
    print_r($matches2);
    curl_close($ch);

 

    // $sql = "INSERT INTO `stoneage_skill`(title,sp1,detail1,detail2,detail3,detail4)     VALUES ('{$title}','{$matches2[4]}','{$matches2[5]}','{$matches2[8]}','{$matches2[11]}','{$matches2[14]}')";

    // $result = mysql_query($sql) or die('MySQL query error');
 

    // }
    

?> 
</body>
<p>Suggestions: <span id="addtest"></span></p>
</html> 