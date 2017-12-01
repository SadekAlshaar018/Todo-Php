<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<a href="index.php"><title>myTodo Task Manager</title></a>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
<!-- <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script> -->
</head>
<body>
 <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="brand" href="#">myTodo</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
             <!--RIGHT TOP CONTENT-->
             <a href="<?php  base_url();?>users/register">Register</a>
            </p>
            <ul class="nav">
              <li><a href="<?php  base_url();?>">Home</a></li>

                    <li><a href="#">My Lists</a></li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
          <div style="margin:0 0 10px 10px;">
			<!--SIDEBAR CONTENT-->
        <?php $this->load->view('users/login');  ?>
          </div>
          </div><!--/.well -->
        </div><!--/span-->

        <div class="span9">
   		<!--MAIN CONTENT-->
        <?php $this->load->view($main_content); ?>
        </div><!--/span-->
		</div><!--/row-->
      <hr>

      <footer>
        <p>&copy; Copyright 2017</p>
      </footer>
    </div><!--/.fluid-container-->
</body>
</html>