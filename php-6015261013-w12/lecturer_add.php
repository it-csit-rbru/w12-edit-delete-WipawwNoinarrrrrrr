<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-id-w10</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: cornflowerblue;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                <h4>เพิ่มชื่ออาจารย์</h4>    
                <?php
                    if(isset($_GET['submit'])){
                        $lct_fname = $_GET['lct_fname'];
                        $lct_lname = $_GET['lct_lname'];
                        $sql = "insert into lecturer (lct_fname) values ('$lct_fname')";
                        $sql = "insert into lecturer (lct_lname) values ('$lct_lname')";
                        echo $sql;
                        include 'connectdb.php';
                        if(mysqli_query($conn,$sql)){
                            echo"เพิ่มชื่ออาจารย์ $lct_fname,$lct_lname เรียบร้อยแล้ว<br>";
                        }else{
                            echo"เพิ่มชื่ออาจารย์ $lct_fname,$lct_lname ผิดพลาด";
                        }
                        mysqli_close($conn);
                        echo "<br>";
                        echo '<a href="lecturer_list.php">แสดงชื่ออาจารย์ทั้งหมด</a>';
                    }else{
                ?>
                    <form class="form-horizontal" role="form" name="lecturer_add" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <div class="form-group">
                            <label for="lct_fname" class="col-md-2 col-lg-2 control-label">ชื่ออาจารย์</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="lct_fname" id="lct_fname" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="lct_lname" class="col-md-2 col-lg-2 control-label">นามสกุลอาจารย์</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="lct_lname" id="lct_lname" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div>
                    </form>
                <?php
                    }
                ?>
                </div>    
            </div>
            <div class="row">
                <address>คณะวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ</address>
            </div>
        </div>    
    </body>
</html>