<?php  
ob_start();
include("../common/connection.php"); 
//$_SESSION["username"]="yen";
//$_SESSION['role']=1;
if (!isset($_SESSION["username"])) {
    echo "<script>alert('Vui lòng đăng nhập'); location.href='loginadmin.php';</script>";
}elseif ($_SESSION['role']==0) {
 echo "<script>alert('Bạn không đủ thẩm quyền vào trang này!'); location.href='../index.php';</script>";
} 

?>

<!DOCTYPE html>
<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="laptopmoi" />
    <link rel="shortcut icon" href="../upload/1.jpg">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link rel="stylesheet" href="css/monthly.css"><!-- lịch-->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <script src="js/jquery2.0.3.min.js"></script>
    <script src="js/raphael-min.js"></script>
    <!-- Biểu đồ quý theo tháng ngày năm-->
   
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/froala_editor.pkgd.min.css">
    <link rel="stylesheet" type="text/css" href="css/froala_style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
   
    <script>
      $(function() {
        $('textarea#froala-editor').froalaEditor()
    });
</script>
</head>
<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="admin.php" class="logo">
                    Máy tính
                </a>
            </div>

            <div class="top-nav clearfix" style="float: right;">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">

                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="./images/avata.png">
                            <span class="username">
                                <?php 
                                    //in ta thông tin session
                                if (isset($_SESSION["username"])) {
                                    echo $_SESSION["username"]["username"];
                                }
                                ?>  
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="admin.php?module=changpass"><i class="fa fa-key"></i> Đổi mật khẩu</a></li>
                            <li><a href="admin.php?module=logout"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <?php 
		require ("modules/menu.php"); ?>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <?php 
            if(isset($_GET["module"])){
              $module = $_GET["module"];
              require("modules/".$module.".php");
          }else{
            require("modules/dashboard.php");
            require("modules/footer.php");
        }?>

    </section>
</section>

<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->  

<script type="text/javascript" src="js/froala_editor.pkgd.min.js">
</script>

</body>
</html>