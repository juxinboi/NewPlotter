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
	$ctr = '';
	$plotted_subject = '';
	$duplicate = '';
		
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
			$ctr = list_student_plotter(); //#of plotter
			$ctr = count($ctr);		
		}		
		
		if(isset($_GET['edp']))
		{
			$edpcode = trim($_GET['edp']);		
			//$s_plotter = find_edpcode($edpcode);
			
			$duplicate = search_student_plotted_subject ($ctr, $edpcode);
			$plotted_subject = show_student_plotted_subject($ctr);
			
			if($duplicate['plotterid'] == $ctr and $duplicate['edpcode'] == $edpcode)
			{
				$error = 1;
				$message = "EDP Code already exist";
			}
			elseif (count($plotted_subject) >= 10)
			{
				$error = 1;
				$message = "Subject plotter is full";
			}
			else 
			{
				add_student_plotted_subject($ctr,$edpcode);	
				
				$error = 0;
				$message = 'Subject Added';				
			}
		}			
		
		if(isset($_POST['add']))
		{
			$plottersy = 2014;
			$plottersem = '1st';			
			
			add_student_plotter($plottersy, $plottersem, $studentid);
			$plottersy = '';
			$plottersem = '';
			$error = 0;
			$message = '';
			
			++$ctr;		
		}
		
		if(isset($_GET['id']))
		{
			$id = trim($_GET['id']);	
			delete_student_plotted_subject($id);
			$error = 0;
			$message = 'Subject sucessfully deleted'; 
		}
		
		$plotted_subject = show_student_plotted_subject($ctr);		
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
			<div class="row">		
				<div class="col-md-6">
					<div class="plotter-admin-bg">
						<h3>2ND SEMESTER 2014 - 2015</h3>
						<div class="container-fluid">
							<div class="row">
								<div class="col-xs-2">
									<?php echo htmlentities($student['studentid']); ?>
								</div>
								<div class="col-xs-8">
									<?php echo htmlentities($student['lname']) . " , "; ?>
									<?php echo htmlentities($student['fname']); ?>
									<?php echo htmlentities($student['mname']) ; ?>
								</div>
								<div class="col-xs-2">
									<?php echo htmlentities($student['course']); ?>
									<?php echo htmlentities($student['year']); ?>
								</div>
							</div>
						</div>									
						
					<?php if(count($plotted_subject) > 0): ?>
						<div class="pull-left">
							<h4>
								Plotter ID: <?php echo ++$ctr; ?>
							</h4>
						</div>	
						<div class="table">
							<table class="table table-condensed">
								<thead>
									<tr>
										<th>EDP Code</th>
										<th>Subject</th>
										<th>Start Time</th>
										<th>End Time</th>
										<th>Days</th>
										<th>Room</th>
										<th>Units</th>
									</tr> 	
								</thead>
								<tbody>				
									<?php foreach($plotted_subject as $p): ?>
										<tr>
											<td><?php echo htmlentities($p['edpcode']); ?></td>
											<td><?php echo htmlentities($p['subject']); ?></td>
											<td><?php echo htmlentities($p['stime']); ?></td>
											<td><?php echo htmlentities($p['etime']); ?></td>
											<td><?php echo htmlentities($p['days']); ?></td>
											<td><?php echo htmlentities($p['room']); ?></td>
											<td><?php echo htmlentities($p['units']); ?></td>											
											<td>
												<a href="student.php?id=<?php echo htmlentities($p['edpcode']); ?>"  onclick="return confirm('Are you sure?');">
													<i class="glyphicon glyphicon-trash"> </i>
												</a>
											</td>
										</tr>
									<?php endforeach; ?>									
								</tbody>
							</table>
						</div>							
						<?php if($error == 1): ?>
							<div class="alert alert-danger error" role="alert">
								<?php echo $message; ?>
							</div>
						<?php elseif($error == 0 and $message != ''): ?>
							<div class="alert alert-success success" role="alert">
								<?php echo $message; ?>
							</div>
						<?php endif; ?>
						<div>							
							<form method="post" class="form">
								<center>
									<input type="submit" name="add" value="Submit" class="btn btn-default btn-lg">
									<input type="reset" name="submit" value="Cancel" class="btn btn-default btn-lg">
								</center>
							</form>
						</div>	
					<?php else: ?>
							<div class="alert alert-danger error" role="alert">
								<?php echo 'Click check button to add subjects'; ?>
							</div>
					<?php endif; ?>
						
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
										<th>EDP Code</th>
										<th>Subject</th>
										<th>Start Time</th>
										<th>End Time</th>
										<th>Days</th>
										<th>Room</th>
										<th>Units</th>
										<th width="40"> </th>
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
											<a href="student.php?edp=<?php echo htmlentities($n['edpcode']); ?>">
												<center><i class="glyphicon glyphicon-check"></i> </center>
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
