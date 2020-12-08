<!DOCTYPE html>
<html>
<head>

	<title>HUMANIAN - HRM</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=width-device, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-glyphicons.css" >

    <link rel="stylesheet" href="../css/styles.css"  media="all">

   <script src="../js/bootstrap.min.js"></script>

</head>
<body id="top">

    <?php 
        include("../sidebar-hrm.php");
        include("../connect.php");

        $id = $_GET['id'];
        $view = $connect->query("SELECT * FROM tblfeeds WHERE feedId = '$id'");

        while($row = $view->fetch_array()){
            $title = $row['feedTitle'];
            $type = $row['feedType'];
            $content = $row['feedContent'];
        }
        
    ?>
    
	<div class="row">
        <div class="col-md-2 lg-2">
        </div>
        <div class="col-md-10 lg-10 ">
            <div class="container" id="dashboard-container">
    
                <div class="row">
                    <div class="col-md-8 lg-8 sm-8">
                        <div class="panel" style="height:100px;box-shadow: 0px 0px 17px 0px #ccc;padding:12px;">
                            <div class="row">
                                <dïv class="col-md-6 lg-6 sm-6">
                                  <h4 class="text-left" style="color:#008076;font-weight: bold; margin-top: 14px;"><?php echo $title;?></h4>
                                    <h5 class="text-left"><?php echo $type?></h5>
                                </dïv>
                                <div class="col-md-4 lg-4 sm-4">
                                   
                                </div>
                            </div>
                        </div>
                        <div class="panel" style="height:300px;box-shadow: 0px 0px 17px 0px #ccc;">
                              <h5 class="text-left" id="card-header">ANNOUNCEMENT CONTENT:</h5><hr/>
                                <p class="text-left" style="text-indent: 50px;"><?php echo $content;?></p>
                        </div>
                    </div>
                    <div class="col-md-4 lg-4 sm-4">
                        <div class="panel" style="height:420px;box-shadow: 0px 0px 17px 0px #ccc;">
                        </div>
                        
                    </div>


                </div>

                <div class="row">
                    <div class="col-md-2 lg-2 sm-2">
                        <a href="" class="btn btn-block btn-success" style="background-color: #008076;border-radius:25px;font-weight: bold;">UPDATE</a>
                    </div>
                    <div class="col-md-2 lg-2 sm-2">
                        
                    </div>
                    <div class="col-md-2 lg-2 sm-2">
                        
                    </div>
                    <div class="col-md-2 lg-2 sm-2">
                    </div>
                    <div class="col-md-2 lg-2 sm-2">
                    </div>
                    <div class="col-md-2 lg-2 sm-2">
                        <a href="on-boarding.php" class="btn btn-block btn-danger" style="border-radius:25px;font-weight: bold;">CANCEL</a>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <script src ="../js/jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

    <script>window.jQuery || document.write(\script src="../js/jquery-1.8.2.min.js\><\/script>")</script>

    <script src="../js/script.js"></script>

</body>
</html>
