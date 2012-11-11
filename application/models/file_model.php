<?php 
	

	class File_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		/* 
			Import function takes an array to iterate through to import or replace

			@table - the table that you want the data to be imported as.
			@array - an array of the data that you want to import into the table 
			(This array has to be formatted the same any other codeignter import array would be);

		*/

		public function import($table, $primary, $array){
			foreach($array as $group){
				$first_key = array_shift(array_values($group));
				$this->db->select('*');
				$this->db->from($table);
				$this->db->where($primary, array_shift(array_values($group)));
				$sql = "SELECT * from {$table} where {$primary} = {$first_key}";
				$query = $this->db->query($sql);
				$query = $query->result_array();

				if(!empty($query)){
					$ar = array();
					foreach($group as $key => $value){
						$ar[] = str_replace('"', '', $key) . ' = ' . $value;
					}
					$str = implode(", ", $ar);
					$sql = "UPDATE {$table} SET {$str} where {$primary} = {$first_key}"; 
					$query = $this->db->query($sql);
				} else {
					$keysString = implode(", ", array_keys($group));
					$valueString = implode(", ", $group);
					$sql = "INSERT INTO ({$table}) values ({$valueString})"; 
					$query = $this->db->query($sql);
				}
			}
			return true;
		}
	}

?>