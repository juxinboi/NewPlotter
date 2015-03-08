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
		$studentid = $_SESSION['islogin'];	
		
		
		$approved = view_student_approved($status_a, $studentid);
		$pending = view_student_pending($status_p, $studentid);
		$canceled = view_student_cancel($status_c, $studentid);
		//print_r($plotter_approved);
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
	<?php include('header-student.php'); ?>
	
    <!-- Header -->
    <header>
        <div class="container">
			   <div class="plotter-admin-bg">
				<h3> Approved Plotter</h3>
				<?php if(count($approved) > 0): ?>
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
							<?php foreach($approved as $n): ?>
								<tr>
									<td><?php echo htmlentities($n['plotterid']); ?></td>
									<td><?php echo htmlentities($n['plotterdate']); ?></td>
									<td><?php echo htmlentities($n['plottersy']); ?></td>
									<td><?php echo htmlentities($n['plottersem']); ?></td>
									<td><?php echo htmlentities($n['studentid']); ?></td>																		
									<td><?php echo htmlentities($n['status']); ?></td>	
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
				<h3> Pending Plotter </h3>
				<?php if(count($pending) > 0): ?>
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
							<?php foreach($pending as $n): ?>
								<tr>
									<td><?php echo htmlentities($n['plotterid']); ?></td>
									<td><?php echo htmlentities($n['plotterdate']); ?></td>
									<td><?php echo htmlentities($n['plottersy']); ?></td>
									<td><?php echo htmlentities($n['plottersem']); ?></td>
									<td><?php echo htmlentities($n['studentid']); ?></td>	
									<td><?php echo htmlentities($n['status']); ?></td>	
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
			<div class="plotter-admin-bg">
					<h3> Canceled Plotter </h3>
					<?php if(count($canceled) > 0): ?>
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
								<?php foreach($canceled as $n): ?>
									<tr>
										<td><?php echo htmlentities($n['plotterid']); ?></td>
										<td><?php echo htmlentities($n['plotterdate']); ?></td>
										<td><?php echo htmlentities($n['plottersy']); ?></td>
										<td><?php echo htmlentities($n['plottersem']); ?></td>
										<td><?php echo htmlentities($n['studentid']); ?></td>
										<td><?php echo htmlentities($n['status']); ?></td>											
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
