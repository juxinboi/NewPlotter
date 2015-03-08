<?php	
	$page_id = 'search';
	session_start();
	include('db.php');
	
	$search = '';
	
	if(isset($_GET['search']))
	{
		$search = trim($_GET['search']);
	}
	
	if($search == '')
	{
		$plotter = list_subject();
	}
	else 
	{
		$plotter = search_subject($search);
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
<body id="page-top" class="index">
	<?php include('header.php'); ?>	
    <!-- Header -->
    <header>
		<div class="container">
			<div class="search-admin-bg">
				<div class="row">
					<div class="col-xs-offset-9">
						<div class="pull-right">
							<form method="get" class="form-inline">
								<div class="input-group">
								<input type="text" name="search" value="<?php echo htmlentities($search); ?>" class="form-control input-small" placeholder="Search subjects here . . ">
								  <span class="input-group-btn">
									<button class="btn btn-default btn-large" type="submit"> Go</button>
								  </span>					  
								</div>			
							</form>
						</div>
					</div>
				</div>
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
										<a href="subject-edit.php?id=<?php echo htmlentities($n['subjNo']); ?>">
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
						<div class="text-info">
							<b><?php echo count($plotter); ?></b> matching record(s) found.
							<?php else: ?>
								<div class="alert alert-danger" role="alert">
									<?php echo "No entries record found!"; ?>
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

</body>

</html>
