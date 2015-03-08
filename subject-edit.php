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
			$plotter = find_edpcode($subjNo);
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


</head>

<body>



  <!-- Header -->
<body id="page-top" class="index">
	<?php include('header.php'); ?>	
	<div class="container">
		<div class="plotter-admin-bg">
			<h3>2ND SEMESTER 2014 - 2015</h3>
			<p> Date: 2-25-2016 </p>
			<div class="pull-left">
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
									<td><input type="text" class="form-control" name="edpcode" pattern=".{5,5}" value="<?php echo htmlentities($edpcode); ?>" placeholder="EDP Code" maxlength="5" required /></td>
									<td><input type="text" class="form-control" name="subject" pattern=".{3,15}" value="<?php echo htmlentities($subject); ?>" placeholder="Subject" maxlength="15" required /></td>							
									<td><input type="time" class="form-control" name="stime" value="<?php echo htmlentities ($stime); ?>" placeholder="Start Time" maxlength="7" required /></td>
									<td><input type="time" class="form-control" name="etime" value="<?php echo htmlentities($etime); ?>" placeholder="End Time" maxlength="7" required /></td>
									<td>
										<select name="days" class="form-control">
											<optgroup label="Options"> Choose</option>
											<option value="M-F"> M-F </option>
											<option value="MW"> MW </option>
											<option value="MWF"> MWF </option>
											<option value="TTH"> TTH </option>
											<option value="TTH"> S </option>
										</select>
									</td>
									<td><input type="text" class="form-control" name="room" pattern=".{3,4}" value="<?php echo htmlentities($room); ?>" placeholder="Room" maxlength="4" required/></td>
									<td><input type="text" class="form-control" name="units" value="<?php echo htmlentities($units); ?>" placeholder="Units" maxlength="2" required/></td>
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
		
</body>
</html>