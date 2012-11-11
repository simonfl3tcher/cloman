<?php 
	

	class Meeting_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function add_meeting(){
			$data = array(

				'name' => $_POST['eventTitle'],
				'start' => $_POST['startDate'],
				'end' => $_POST['endDate'],
				'who' => $this->session->userdata('user_id')
			);
			$this->db->insert('meetings', $data);
		}

		public function update_meeting(){
			$data = array(

				'name' => $_POST['eventTitle'],
				'start' => $_POST['startDate'],
				'end' => $_POST['endDate'],
				'updated_by' => $this->session->userdata('user_id')
			);
			$this->db->where('meeting_id', $_POST['id']);
			$this->db->update('meetings', $data);
		}

		public function get_json_meetings(){
			$sql ="SELECT  DATE_FORMAT(start, '%Y-%m-%dT%TZ') as start, DATE_FORMAT(end, '%Y-%m-%dT%TZ') as end, who, meeting_id as id, name as title from meetings ";
			$query = $this->db->query($sql);
			return json_encode($query->result_array());
		}
	}