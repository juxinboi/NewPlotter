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
	
	function find_subject($subjNo)
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
?>