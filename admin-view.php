<?php	
	session_start();
	include('db.php');
	$page_id = 'view';
	$plotter = '';	
	$plotterid = '';
	$status_p = 0;
	$status_a = 1;	
	$status_c = 2;			
	if(!isset($_SESSION['islogin']))
	{
		//go back to login page
		header('location: index.php');
		exit();
	}
	else 
	{			
		if(isset($_GET['id']))
		{
			$plotterid = $_GET['id'];
			update_student_plotted_subject($status_a, $plotterid);
		}
		
		if(isset($_GET['pid']))
		{
			$plotterid = $_GET['pid'];	
			delete_student_plotter_subject($status_c, $plotterid);
		}
		
		$plotter_pending = pending_student_plotter_subject($status_p);
		$plotter_approved = approved_student_plotter_subject($status_a);
		//$plotter = list_student_plotter();
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
</head>

<!-- Header -->
<body id="page-top" class="index">
	<?php include('header.php'); ?>
	
    <!-- Header -->
    <header>
        <div class="container">
			   <div class="plotter-admin-bg">
				<h3> Pending Plotter</h3>
				<?php if(count($plotter_pending) > 0): ?>
					<div class="table-responsive table subject-table">
						<table class="table table-striped table-condensed table-hover">
							<thead>
								<tr>
									<th width="150">Plotter ID</th>
									<th>Date Submitted</th>
									<th>Year</th>
									<th>Plotter Semester</th>
									<th>Student ID</th>
									<th width="50"> Status </th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($plotter_pending as $n): ?>
								<tr>
									<td><?php echo htmlentities($n['plotterid']); ?></td>
									<td><?php echo htmlentities($n['plotterdate']); ?></td>
									<td><?php echo htmlentities($n['plottersy']); ?></td>
									<td><?php echo htmlentities($n['plottersem']); ?></td>
									<td><?php echo htmlentities($n['studentid']); ?></td>									
									<td>
										<center>
												<a href="admin-view.php?id=<?php echo htmlentities($n['plotterid']); ?>">										    	
													<button type="submit" class="btn btn-warning btn-xs" name="login" onclick="return confirm('Are you sure?');">Pending </button>													
												</a>
										</center>
									<td>
										<center>
												<a href="admin-view.php?pid=<?php echo htmlentities($n['plotterid']);  ?>">	
													<i class="glyphicon glyphicon-remove" onclick="return confirm('Are you sure?');"> </i> 
												</a>
										</center>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>					
				<?php else: ?>
					<div class="alert alert-danger" role="alert">
						<?php echo "No pending recordeds!"; ?>
					</div>
				<?php endif; ?>
			</div>	
			<div class="plotter-admin-bg">
				<h3> Approved Plotters </h3>
				<?php if(count($plotter) > 0): ?>
					<div class="table-responsive table subject-table">
						<table class="table table-striped table-condensed table-hover">
							<thead>
								<tr>
									<th width="150">Plotter ID</th>
									<th>Date Submitted</th>
									<th>Year</th>
									<th>Plotter Semester</th>
									<th>Student ID</th>
									<th width="50"> Status </th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($plotter_approved as $n): ?>
								<tr>
									<td><?php echo htmlentities($n['plotterid']); ?></td>
									<td><?php echo htmlentities($n['plotterdate']); ?></td>
									<td><?php echo htmlentities($n['plottersy']); ?></td>
									<td><?php echo htmlentities($n['plottersem']); ?></td>
									<td><?php echo htmlentities($n['studentid']); ?></td>									
									<td>
										<center>
										<?php if($n['status'] == 0): ?>
										    <a href="admin-view.php?id=<?php echo htmlentities($n['plotterid']); ?>">										    	
												<button type="submit" class="btn btn-warning btn-xs" name="login">Pending </button>
												<i class="glyphicon glyphicon-remove"> </i> 
										    </a>
										<?php else: ?>
											<a href="admin-view.php?id=<?php echo htmlentities($n['plotterid']); ?>"  onclick="return confirm('Are you sure?');">
												<button type="submit" class="btn btn-primary btn-xs" name="login">Approved </button>
												
										    </a>
										<?php endif; ?> 
										</center>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>					
				<?php else: ?>
					<div class="alert alert-danger" role="alert">
						<?php echo "No approved recorded!"; ?>
					</div>
				<?php endif; ?>
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
