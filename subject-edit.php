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
<!DOCTYPE>
<html>
	<head>
		<title> Online Subject Plotter</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	
<body>
	<?php include('header.php'); ?>	
	<?php include('nav-header.php'); ?>	
	<div class="container">
		<div class="plotter-admin-bg">
			<h3>2ND SEMESTER 2014 - 2015</h3>
			<p> Date: 2-25-2016 </p>
			<div class="pull-left">
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
									<input type="submit" name="add" value="Update" class="btn btn-default btn-lg">									
								</center>
							</div>
					</form>
				</div>
			</div>
		</div>
</body>
</html>