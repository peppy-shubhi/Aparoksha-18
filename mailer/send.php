<?php
	
		session_start();
		if(!isset($_SESSION['user'])){  
	  		echo '<script language="javascript">';
            echo 'alert("What? Dude login first :P")';
            echo '</script>';   
            header("Refresh: 1; url=index.php"); 
            exit();
		}
		else{
			  $user = $_SESSION['user'];
      	$id = $_SESSION['id'];
		}
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Mailer</title>
	<!--Stylesheets-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

</head>

<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Aparoksha Mailer</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="sent.php">Sent Mails</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

  <h2 class="text-center"> <b> Enter details to send mail: </b></h2>
  <br>

  <div class="alert alert-info col-sm-12" id="info" style="margin-bottom:1em; 
  <?php if(isset($_SESSION['confirm'])){echo("display:block;");} else {echo("display:none;");} ?> ">
  <?php if(isset($_SESSION['confirm'])){echo("{$_SESSION['confirm']}"); unset($_SESSION['confirm']);} ?>
 </div>

  <form class="form-horizontal" method="POST" action="php-mailer.php">
  <div class="form-group">
    <label for="inputText2" class="col-sm-2 control-label">Company Name<sup>*</sup></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputText2" placeholder="Company Name" name="company_name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputText9" class="col-sm-2 control-label">Mail Type<sup>*</sup></label>
    <div class="radio col-sm-8" id="inputText9">
      <label><input type="radio" name="mail_type" value="personal" id="employee_radio">Employee Email</label>
      <label><input type="radio" name="mail_type" value="company" id="company_radio" checked>Company Email</label>
    </div> 
  </div>
  <div class="form-group" id="employee_name">
    <label for="inputText11" class="col-sm-2 control-label">Employee Name<sup>*</sup></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputText11" placeholder="Employee Name" name="employee_name">
    </div>
  </div>
  <div class="form-group" id="employee_email">
    <label for="inputText10" class="col-sm-2 control-label">Employee Email<sup>*</sup></label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputText10" placeholder="Employee Email" name="employee_email">
    </div>
  </div>
  <div class="form-group" id="company_email">
    <label for="inputText3" class="col-sm-2 control-label">Company Email<sup>*</sup></label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputText3" placeholder="Company Email" name="email">
    </div>
  </div>
  <div class="form-group">
    <label for="inputText8" class="col-sm-2 control-label">Company Type<sup>*</sup></label>
    <div class="radio col-sm-8" id="inputText8">
      <label><input type="radio" name="company_type" value="Domestic" checked>Domestic</label>
      <label><input type="radio" name="company_type" value="International">International</label>
    </div> 
  </div>
  <div class="form-group">
    <label for="inputText4" class="col-sm-2 control-label">CC</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputText4" placeholder="Add cc" name="cc">
    </div>
  </div>
  <div class="form-group">
    <label for="inputText5" class="col-sm-2 control-label">BCC</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputText5" placeholder="Add bcc" name="bcc">
    </div>
  </div>
  <div class="form-group">
    <label for="inputText6" class="col-sm-2 control-label">Sender Name<sup>*</sup></label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputText6" placeholder="Sender Name" name="sender_name" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputText7" class="col-sm-2 control-label">Sender Contact<sup>*</sup></label>
    <div class="col-sm-8">
      <input type="tel" pattern="{0-9}[10]" class="form-control" id="inputText7" placeholder="Sender Contact" name="sender_contact" required>
    </div>
  </div>
  
  
  <div class="form-group text-center" style="margin-left: 12%;">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" name="sub">Submit</button>
    </div>
  </div>

</form>

  
    <footer class="footer">
      <div class="container">
        <b><p class="text-muted" style="float: left;">&copy; Aparoksha 2018</p></b>
        <b><p class="text-muted" style="float: right; padding-right: 10px;">Credits: Shreyansh Dwivedi & Pradeep Gangwar </p></b>        
      </div>
    </footer>
 

<!-- Scripts -->

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>