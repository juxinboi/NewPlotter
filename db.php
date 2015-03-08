<?php
	
	function db_plotter ()
	{
		$user = 'root';
		
		$db = null;
		try
		{
			$db = new PDO('mysql:host=localhost;dbname=plotter;', $user, '');
		}
		catch(PDOException $e)
		{
			echo 'Connection failed.';
		}		
		
		return $db;
	}

/*----------subject table-------------*/

	function add_subject($edpcode, $subject, $stime, $etime, $days, $room, $units, $prereq)
	{
		$db = db_plotter();
		$sql = "insert into subject(edpcode, subject, stime, etime, days, room, units, prereq) values(?,?,?,?,?,?,?,?)";
		$st = $db->prepare($sql);
		$st->execute(array($edpcode, $subject, $stime, $etime, $days, $room, $units, $prereq));
		$db = null;
	}
	
	function list_subject()
	{
		$db = db_plotter();
		$sql = "select * from subject order by 1 desc";
		$st = $db->prepare($sql);
		$st->execute();
		$rows = $st->fetchAll();
		$db = null;
		
		return $rows;
	}
	
	function search_subject($keysearch)
	{
		$keysearch = '%' . $keysearch . '%';
		$db = db_plotter();
		$sql = "select * from subject where edpcode like ? or subject like ? or days like ? or room like ?";
		$st = $db->prepare($sql);
		$st->execute(array($keysearch,$keysearch,$keysearch,$keysearch));
		$rows = $st->fetchAll();
		$db = null;
		
		return $rows;
	}
	
	function update_subject($subjNo, $edpcode, $subject, $stime, $etime, $days, $room, $units, $prereq)
	{
		$db = db_plotter();
		$sql = "update subject set edpcode=?, subject=?, stime=?, etime=?, days=?, room=?, units=?, prereq=? where subjNo=?";
		$st = $db->prepare($sql);
		$st->execute(array($edpcode, $subject, $stime, $etime, $days, $room, $units, $prereq, $subjNo));
		$db = null;
	}
	
	function delete_subject($subjNo)
	{
		$db = db_plotter();
		$sql = "delete from subject where subjNo=?";
		$st = $db->prepare($sql);
		$st->execute(array($subjNo));
		$db = null;
	}
	
	function find_edpcode($subjNo)
	{
		$db = db_plotter();
		$sql = "select * from subject where subjNo=?";
		$st = $db->prepare($sql);
		$st->execute(array($subjNo));
		$row = $st->fetch();
		$db = null;
		
		return $row;
	}
	
	function find_duplicate($edpcode)
	{
		$db = db_plotter();
		$sql = "select * from subject where edpcode=?";
		$st = $db->prepare($sql);
		$st->execute(array($edpcode));
		$row = $st->fetch();
		$db = null;
		
		return $row;
	}

/*----------student table-------------*/	

	function find_student($user)
	{
		$db = db_plotter();
		$sql = "select * from student where studentno = ?";
		$st = $db->prepare($sql);
		$st -> execute(array($user));
		$row = $st->fetch();
		$db = null;
		
		return $row;
	}
		
	function search_student($studentid)
	{
		$db = db_plotter();
		$sql = "select * from student where studentid = ?";
		$st = $db->prepare($sql);
		$st -> execute(array($studentid));
		$row = $st->fetch();
		$db = null;
		
		return $row;
	}
	
/*----------plotter table-------------*/

	function add_student_plotter ($plottersy, $plottersem, $studentid)	
	{
		$db = db_plotter();
		$sql = "insert into plotter(plottersy, plottersem, studentid) values(?,?,?)";
		$st = $db->prepare($sql);
		$st -> execute(array($plottersy, $plottersem, $studentid));
		$db = null;		
	}
	
	function list_student_plotter ()
	{
		$db = db_plotter();
		$sql = "select * from plotter order by status, plotterid ";
		$st = $db->prepare($sql);
		$st -> execute();
		$row = $st->fetchAll();
		$db = null;
		
		
		return $row;
	}
	
		
	function pending_student_plotter_subject($status)
	{
		$db = db_plotter();
		$sql = "select * from plotter where status = ?";
		$st = $db->prepare($sql);
		$st ->execute(array($status));
		$row = $st->fetchAll();
		$db = null;
		
		return $row;
	}
	
	function approved_student_plotter_subject($status)
	{
		$db = db_plotter();
		$sql = "select * from plotter where status = ?";
		$st = $db->prepare($sql);
		$st ->execute(array($status));
		$row = $st->fetchAll();
		$db = null;
		
		return $row;
	}

	function delete_student_plotter_subject($status,$plotterid)
	{
		$db = db_plotter();
		$sql = "update plotter set status=? where plotterid = ?";
		$st = $db->prepare($sql);
		$st ->execute(array($status, $plotterid));
		$db = null;
	}
	
	function view_student_approved($status, $studentid)
	{
		$db = db_plotter();
		$sql = "select * from plotter where studentid = ? and status = ?";		
		$st = $db->prepare($sql);
		$st->execute(array($status, $studentid));
		$row = $st->fetchAll();
		$db = null;
		
		return $row;
	}
	
	function view_student_pending($status, $studentid)
	{
		$db = db_plotter();
		$sql = "select * from plotter where status = ? and studentid = ? ";		
		$st = $db->prepare($sql);
		$st->execute(array($status, $studentid));
		$row = $st->fetchAll();
		$db = null;
		
		return $row;
	}
	
	function view_student_cancel($status, $studentid)
	{
		$db = db_plotter();
		$sql = "select * from plotter where status = ? and studentid = ?";		
		$st = $db->prepare($sql);
		$st->execute(array($status, $studentid));
		$row = $st->fetchAll();
		$db = null;
		
		return $row;
	}
	
/*----------pltted_subject table-------------*/		

	function add_student_plotted_subject ($plotterid,$edpcode)
	{
		$db = db_plotter();
		$sql = "insert into plotted_subject (plotterid, edpcode) values(?,?)";
		$st = $db->prepare($sql);
		$st->execute(array($plotterid,$edpcode));
		$db = null;
	}
	
	function search_student_plotted_subject ($plotterid, $edpcode)
	{
		$db = db_plotter();
		$sql = "select * from plotted_subject where plotterid = ? and edpcode = ?";
		$st = $db->prepare($sql);
		$st -> execute(array($plotterid, $edpcode));
		$row = $st->fetch();
		$db = null;
		
		return $row;
	}
	
	function show_student_plotted_subject ($plotterid)
	{
		$db = db_plotter();
		//$sql = "select edpcode, subject, stime, etime, days, room, units from plotted_subjects, s.subject where plotterid = ? and s.edpcode = ?";
		//$sql = "select * from plotted_subject where plotterid = ?";
		$sql = "select s.edpcode, s.subject, s.stime, s.etime, s.days, s.room, s.units from subject s, plotted_subject p where p.plotterid = ? and s.edpcode = p.edpcode";
		$st = $db->prepare($sql);
		$st->execute(array($plotterid));
		$row = $st->fetchAll();
		$db = null;
		
		return $row;
	}	
	
	function delete_student_plotted_subject($edpcode)
	{
		$db = db_plotter();
		$sql = "delete from plotted_subject where edpcode = ?";
		$st = $db->prepare($sql);
		$st->execute(array($edpcode));
		$db = null;
	}
	
	function update_student_plotted_subject($status,$plotterid)
	{
		$db = db_plotter();
		$sql = "update plotter set status=? where plotterid = ?";
		$st = $db->prepare($sql);
		$st -> execute(array($status,$plotterid));
		$db = null;
	}
	

?>