<?php
  $webroot =  dirname(dirname(__FILE__)) ;
  $originPath = str_replace("/var/www/eip","$webroot",ini_get("include_path"));
  ini_set("include_path",$originPath);

  error_reporting(E_ALL);
   /***
    * 註解
    * 判斷是否已登入
    * yes:至welcome
    * no:至passwd error
   */
  //這也是註解set cookie
  setcookie("isLogin", true);
  //setcookie("isLogin", false);
  //get cookie
  if (isset($_COOKIE['isLogin']) and $_COOKIE['isLogin']!==false)
  {
    //轉至welcome
    echo '已登入';
    $gUrl = "https://" . $_SERVER["SERVER_NAME"]."/welcome.php";
    Header("Location:$gUrl");
    exit();
  }
  else
  {
    //轉至login
    echo '未登入';
    $gUrl = "https://" . $_SERVER["SERVER_NAME"]."/login.php";
    Header("Location:$gUrl");
    exit();
  }
?>
