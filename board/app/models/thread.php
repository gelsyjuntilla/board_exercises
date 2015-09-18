<?php
    /**
    * 
    */
    class Thread extends AppModel
    {
    	
    	public static function getAll()
    	{
    		$threads = array();

    		$db = DB::conn();

    		$rows = $db->rows('Select * FROM thread');

    		foreach ($rows as $row) {
    			$threads[] = new Thread($row);
    		}
    		return $threads;
    	}

    	public static function get($id)
    	{
    		$db = DB::conn();

    		$row = $db->row('SELECT * FROM thread WHERE id = ?', array($id));

    		if(!$row){
    			throw new RecordNotFoundException('No Record Found');
    		}
    		return new self($row);
    	}
    }
?>