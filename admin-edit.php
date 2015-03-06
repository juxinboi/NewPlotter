<?php
	session_start();
	include('db.php');
	$page_id = 'update';
	$message = '';
	$edpcode = '';	
	$subject = '';	
	$stime = '';	
	$etime = '';	
	$days = '';		
	$room = '';
	$units = '';
	$prereq = '';
	$message = '';
	
	if(!isset($_GET['id']))
	{
		//note id is not specified go back to notes-list page
		header('location: admin.php');
		exit();
	}
	
	$subjNo = intval($_GET['id']);
	
		if(isset($_POST['add']))
		{
				$edpcode = trim($_POST['edpcode']);
				$subject = trim($_POST['subject']);	
				$stime = trim($_POST['stime']);	
				$etime = trim($_POST['etime']);	
				$days = trim($_POST['days']);		
				$room = trim($_POST['room']);
				$units = trim($_POST['units']);
								
			
				update_subject($subjNo, $edpcode, $subject, $stime, $etime, $days, $room, $units, $prereq);
				$message = 'Successfully Updated';				
				$edpcode = '';	
				$subject = '';	
				$stime = '';	
				$etime = '';	
				$days = '';		
				$room = '';
				$units = '';
				$prereq = '';
		}
		else 
		{
			$plotter = find_subject($subjNo);
			if($plotter)
			{
				$edpcode = $plotter['edpcode'];
				$subject = $plotter['subject'];	
				$stime = $plotter['stime'];	
				$etime = $plotter['etime'];	
				$days = $plotter['days'];		
				$room = $plotter['room'];
				$units = $plotter['units'];
			}
			else
			{
				$message = "Record not found.";
			}
		}	
?> 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Landing Page - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">Online Subject Plotter</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
 
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
<div class="intro-header">
<body id="page-top" class="index">
	<?php include('header.php'); ?>
	
    <!-- Header -->
    <header>
        <div class="container">
            <div class="plotter-admin-bg">
				<div class="admin-header">
					<h3>2ND SEMESTER 2014 - 2015</h3>
					<p> Date: 2-25-2016 </p>
					
				<h4><?php echo "Subject No: $subjNo"; ?></h4>
				</div>
			<div class="table-responsive">
				<div class="table">
					<form class="form" method="post">
							<table class="table">
								<tr>							
									<th>EDP Code</th>
									<th>Subject</th>
									<th>Start Time</th>
									<th>Start Time</th>
									<th>Days</th>
									<th>Room</th>
									<th>Units</th>
								</tr>						
								<tr>
									<td><input type="text" class="form-control" name="edpcode" value="<?php echo htmlentities($edpcode); ?>" placeholder="EDP Code" required /></td>
									<td><input type="text" class="form-control" name="subject" value="<?php echo htmlentities($subject); ?>" placeholder="Subject" required /></td>							
									<td><input type="text" class="form-control" name="stime" value="<?php echo htmlentities($stime); ?>" placeholder="Start Time" required/></td>
									<td><input type="text" class="form-control" name="etime" value="<?php echo htmlentities($etime); ?>" placeholder="End Time" required/></td>
									<td><input type="text" class="form-control" name="days" value="<?php echo htmlentities($days); ?>" placeholder="Days" required/></td>
									<td><input type="text" class="form-control" name="room" value="<?php echo htmlentities($room); ?>" placeholder="Room" required/></td>
									<td><input type="text" class="form-control" name="units" value="<?php echo htmlentities($units); ?>" placeholder="Units" required/></td>
								</tr>
							</table>
							<?php if($message != ''): ?>
									<div class="alert alert-success" role="alert">
										<?php echo $message; ?>
									</div>
							<?php endif; ?>
							<div class="form-group">
								<center>
									<input type="submit" name="add" value="Update" class="btn btn-primary btn-lg">									
								</center>
							</div>
					</form>
				</div>
			</div>
         </div>
	</div>
    </header>

    
   

   
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>
