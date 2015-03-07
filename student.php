<?php	
	session_start();
	include('db.php');
		
	$page_id = 'home';
	$edpcode = '';	
	$subject = '';	
	$stime = '';	
	$etime = '';	
	$days = '';		
	$room = '';
	$units = '';
	$prereq = '';
	$message = '';
	$error = '';
	$s_plotter = '';
	$ecode=array();
	
	if(!isset($_SESSION['islogin']))
	{
		//go back to login page
		header('location: admin.php');
		exit();
	}
	else 
	{
		if(!isset($_SESSION['islogin']))
		{
			//go back to login page
			header('location: index.php');
			exit();
		}
		else 
		{		
			$studentid = $_SESSION['islogin'];		
			$student = search_student($studentid);
			$plotter = list_subject();
		}
		
		if(isset($_GET['id']))
		{
			$subjNo = trim($_GET['id']);		
			$s_plotter = find_subject($subjNo);
					
			if($s_plotter)
			{
				echo $s_plotter['edpcode'];
				echo $s_plotter['subject'];	
				echo $s_plotter['stime'];	
				echo $s_plotter['etime'];	
				echo $s_plotter['days'];		
				echo $s_plotter['room'];
				echo $s_plotter['units'];
			}
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
	<?php include('header-student.php'); ?>
	
    <!-- Header -->
    <header>
		<div class="container">
			<div class="row">		
				<div class="col-md-6">
					<form class="form" method="post">
					<div class="plotter-admin-bg">
							<h3>2ND SEMESTER 2014 - 2015</h3>
						<div class="container-fluid">
						<div class="table">
							<table class="table table-condensed">
								<tr>
									<th>Id Number</th>
									<th>Student Name</th>
									<th>Course-Year</th>
								</tr>
							</table>
						</div>
							<div class="row">
								<div class="col-xs-2">
									<?php echo htmlentities($student['studentid']); ?>
								</div>
								<div class="col-xs-8">
									<?php echo htmlentities($student['lname']) . " , "; ?>
									<?php echo htmlentities($student['fname']); ?>
									<?php echo htmlentities($student['mname']) . "."; ?>
									
								</div>
								<div class="col-xs-2">
									<?php echo htmlentities($student['course']); ?>
									<?php echo htmlentities($student['year']); ?>
								</div>
							</div>
						</div>
						<div class="table">
							<table class="table table-condensed">
								<tr>
									<th>Subject</th>
									<th>EDP Code</th>
									<th>Time</th>
									<th>Days</th>
									<th>Room</th>
									<th>Units</th>
								</tr> 	
							<tbody>
								<?php if($s_plotter): ?>
									<tr>
										<td><?php echo htmlentities($s_plotter['edpcode']); ?></td>
										<td><?php echo htmlentities($s_plotter['subject']); ?></td>
										<td><?php echo htmlentities($s_plotter['stime']); ?></td>
										<td><?php echo htmlentities($s_plotter['etime']); ?></td>
										<td><?php echo htmlentities($s_plotter['days']); ?></td>
										<td><?php echo htmlentities($s_plotter['room']); ?></td>
										<td><?php echo htmlentities($s_plotter['units']); ?></td>
									</tr>
								<?php endif; ?>
							</tbody>
							</table>
						</div>
						<div>
							<center>
								<input type="submit" name="add" value="Submit" class="btn btn-primary btn-lg">&nbsp&nbsp
								<input type="reset" name="submit" value="Cancel" class="btn btn-warning btn-lg">
							</center>
						</div>
					</div>
				</div>
				<div class="col-md-6">			
					<?php if(count($plotter) > 0): ?>
					<div class="plotter-admin-bg">
						<div class="table-responsive table subject-table">							
							<h2> Subject Lists </h2>
							<table class="table table-striped table-condensed table-hover">
								<thead>
									<tr>
										<th width="150">Subject</th>
										<th>EDP Code</th>
										<th>Start Time</th>
										<th>End Time</th>
										<th>Days</th>
										<th>Room</th>
										<th>Units</th>
										<th width="50"> </th>
									</tr>
								</thead>
								<tbody>							
								<?php foreach($plotter as $n): ?>
									<tr>
										<td><?php echo htmlentities($n['edpcode']); ?></td>
										<td><?php echo htmlentities($n['subject']); ?></td>
										<td><?php echo htmlentities($n['stime']); ?></td>
										<td><?php echo htmlentities($n['etime']); ?></td>
										<td><?php echo htmlentities($n['days']); ?></td>
										<td><?php echo htmlentities($n['room']); ?></td>
										<td><?php echo htmlentities($n['units']); ?></td>
										<td>
											<a href="student.php?id=<?php echo htmlentities($n['subjNo']); ?>">
												<i class="glyphicon glyphicon-check"></i>
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>	
					</div>
					<?php else: ?>
						<div class="alert alert-danger" role="alert">
							<?php echo "No entries recorded yet!"; ?>
						</div>
					<?php endif; ?>
				</div>	
			  </form>
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
