<?php include 'include/header.php';?>
<?php $table_heading = "";?> 
<?php include 'include/sidebar.php';?>
<?php include 'include/body-top.php';?>

<?php 
$tbl_name="slide";
$user_no =$_SESSION['user']['user_no'];
$CURR_TIME = date('Y-m-d H:i:s');
if(isset($_POST['submit']))
  {
  	$eid=$_GET['editid'];
  	//Getting Post Values
    $S_TITLE=$_POST['S_TITLE'];
    $S_LINK=$_POST['S_LINK'];
	$S_LINK_TEXT=$_POST['S_LINK_TEXT'];

    //Query for data updation
     $query=mysqli_query($con, "update  $tbl_name set S_TITLE='$S_TITLE', S_LINK='$S_LINK',S_LINK_TEXT='$S_LINK_TEXT',IS_UPDATED=1,UPDATED_BY='$user_no'  where SLIDE_NO='$eid'");
     
    if ($query) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='index.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title></title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
	color: #fff;
	background: #63738a;
	font-family: 'Roboto', sans-serif;
}
.form-control {
	height: 40px;
	box-shadow: none;
	color: #969fa4;
}
.form-control:focus {
	border-color: #5cb85c;
}
.form-control, .btn {        
	border-radius: 3px;
}
.signup-form {
	width: 450px;
	margin: 0 auto;
	padding: 30px 0;
  	font-size: 15px;
}
.signup-form h2 {
	color: #636363;
	margin: 0 0 15px;
	position: relative;
	text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
	content: "";
	height: 2px;
	width: 30%;
	background: #d4d4d4;
	position: absolute;
	top: 50%;
	z-index: 2;
}	
.signup-form h2:before {
	left: 0;
}
.signup-form h2:after {
	right: 0;
}
.signup-form .hint-text {
	color: #999;
	margin-bottom: 30px;
	text-align: center;
}
.signup-form form {
	color: #999;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #f2f3f7;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.signup-form .form-group {
	margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
	margin-top: 3px;
}
.signup-form .btn {        
	font-size: 16px;
	font-weight: bold;		
	min-width: 140px;
	outline: none !important;
}
.signup-form .row div:first-child {
	padding-right: 10px;
}
.signup-form .row div:last-child {
	padding-left: 10px;
}    	
.signup-form a {
	color: #fff;
	text-decoration: underline;
}
.signup-form a:hover {
	text-decoration: none;
}
.signup-form form a {
	color: #5cb85c;
	text-decoration: none;
}	
.signup-form form a:hover {
	text-decoration: underline;
}  
</style>
</head>
<body>
<div class="signup-form">
<form  method="POST">
<?php
$eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from $tbl_name where SLIDE_NO='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
		<h2>Update </h2>
		<p class="hint-text">Update Slide info.</p>

	    <div class="form-group">
            <img src="profilepics/<?php  echo $row['S_IMG'];?>" width="120" height="120">
            <a href="slide_change-image.php?userid=<?php echo $row['SLIDE_NO'];?>">Change Image</a>
		</div>

        <div class="form-group">
				<input type="text" class="form-control" name="S_TITLE" value="<?php  echo $row['S_TITLE'];?>" />       	
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="S_LINK" value="<?php echo $row['S_LINK'];?>" />
        </div>  
		<div class="form-group">
            <input type="text" class="form-control" name="S_LINK_TEXT" value="<?php echo $row['S_LINK_TEXT'];?>" />
        </div>   

<?php 
}?>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
    </form>

</div>
</body>
</html>