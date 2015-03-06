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
<!DOCTYPE>
<html>
	<head>
		<title> Online Subject Plotter</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>	
<body>
<?php include('header.php'); ?>		
	<div class="container">
		<div class="row">		
				<br>
				<div class="col-md-6">
					<div class="plot-left">
						<h3>2ND SEMESTER 2014 - 2015</h3>
					<div class="container-fluid">
						<div class="row">
							<div class="col-xs-2">
								12085262 
							</div>
							<div class="col-xs-8">
								Name: Limchiu, Arth Clarence Jonn C.
							</div>
							<div class="col-xs-2">
								BSIT-3
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
								<th> </th>
							</tr> 	
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
								<td><i class="glyphicon glyphicon-check"> </i></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
						</table>
					</div>
					<div>
						<center>
									<input type="submit" name="add" value="Submit" class="btn btn-default btn-lg">
									<input type="reset" name="submit" value="Cancel" class="btn btn-default btn-lg">
								</center>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<?php if(count($plotter) > 0): ?>
				<div class="plot-left">
				<div class="table-responsive table subject-table">
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
								<button><i class="glyphicon glyphicon-check"> </i></td>
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
<script>

</script>
</body>
</html>