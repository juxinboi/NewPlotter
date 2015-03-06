<?php	
	session_start();
	include('db.php');
		
	$page_id = 'view';
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
	
	if(!isset($_SESSION['islogin']))
	{
		//go back to login page
		header('location: index.php');
		exit();
	}
	else 
	{
		if(isset($_POST['add']))
		{
				$edpcode = trim($_POST['edpcode']);
				$subject = trim($_POST['subject']);	
				$stime = trim($_POST['stime']);	
				$etime = trim($_POST['etime']);	
				$days = trim($_POST['days']);		
				$room = trim($_POST['room']);
				$units = trim($_POST['units']);
				
				if($stime == $etime)
				{
					$error = 1;
					$message = 'Start time should be greater than 1 hour';
				}
				elseif($stime > $etime)
				{
					$error = 1;
					$message = 'Invalid time';
				}
				elseif($units > 10 || $units < 1) 
				{
					$error = 1;
					$message = 'Invalid unit';
				}
				else 
				{
					add_subject($edpcode, $subject, $stime, $etime, $days, $room, $units, $prereq);
					$message = 'Successfully Added';				
					$edpcode = '';	
					$subject = '';	
					$stime = '';	
					$etime = '';	
					$days = '';		
					$room = '';
					$units = '';
					$prereq = '';
				}
		}				
		
		$plotter = list_subject();
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
				<h3> Subject Lists</h3>
				<?php if(count($plotter) > 0): ?>
					<div class="table-responsive table subject-table">
						<table class="table table-striped table-condensed table-hover">
							<thead>
								<tr>
									<th width="150">EDP Code</th>
									<th>Subject</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Days</th>
									<th>Room</th>
									<th>Units</th>
									<th width="50"> </th>
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
										<a href="admin-edit.php?id=<?php echo htmlentities($n['subjNo']); ?>">
											<i class="glyphicon glyphicon-pencil"> </i>
										</a>
									</td>
									<td>
										<a href="subject-delete.php?id=<?php echo htmlentities($n['subjNo']); ?>"  onclick="return confirm('Are you sure?');">
											<i class="glyphicon glyphicon-trash"> </i>
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>					
				<?php else: ?>
					<div class="alert alert-danger" role="alert">
						<?php echo "No entries recorded yet!"; ?>
					</div>
				<?php endif; ?>
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
