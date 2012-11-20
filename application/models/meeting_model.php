<?php 
	

	class Meeting_Model extends CI_Model {

		public function __construct(){
			parent::__construct();
		}

		public function add_meeting(){

			var_dump($_POST);


			$data = array(

				'name' => $_POST['eventTitle'],
				'start' => date('Y-m-d H:i:s', strtotime($_POST['startDate'])),
				'notes' => $_POST['notes'],
				'business' => $_POST['business'],
				'end' => date('Y-m-d H:i:s', strtotime($_POST['endDate'])),
				'who' => $this->session->userdata('user_id'),
				'all_day' => $_POST['allDay']
			);

			if(isset($_POST['meetingRoom']) && $_POST['meetingRoom'] == 'checked'){
				$data['color'] = '#FF9244';
			}

			$this->db->insert('meetings', $data);

			$id = $this->db->insert_id();

			if(!empty($_POST['employees'])){
				$workers = explode(',', $_POST['employees']);

				foreach($workers as $w){
					$array = array(
						'meeting_id' => $id,
						'user_id' => $w 
					);
					$this->db->insert('meetings_to_users', $array);
				}
			}

			if(!empty($_POST['people'])){
				$people = explode(',',$_POST['people']);

				foreach($people as $p){
					$array = array(
						'meeting_id' => $id,
						'people_id' => $p
					);
					$this->db->insert('meetings_to_people', $array);
				}

			}

			return true;
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
			$sql ="SELECT  DATE_FORMAT(start, '%Y-%m-%dT%TZ') as start, DATE_FORMAT(end, '%Y-%m-%dT%TZ') as end, who, meeting_id as id, name as title, color as backgroundColor, color as borderColor, all_day as allDay from meetings ";
			$query = $this->db->query($sql);
			$query = $query->result_array();
			$count = 0;

			foreach($query as $row){

				foreach($row as $key => $value){
					if($key == 'allDay' && $value == 0){
						$query[$count][$key] = false;
					} else if($key == 'allDay' && $value == 1){
						$query[$count][$key] = true;
					}
				}
				$count++;
			}
			return json_encode($query);
		}

		public function get($id){
			$sql = "SELECT m.* from `meetings` as m 
left join businesses as b on b.`business_id` = m.`business`
where m.meeting_id = ?";
			$query = $this->db->query($sql, $id);
			$array  = array('standard' => $query->row_array());
			$sql = "SELECT p.name from meetings as m
inner join meetings_to_people as mp on mp.`meeting_id` = m.meeting_id
inner join people as p on p.`people_id` = mp.`people_id`
where m.meeting_id = ?";
			$query = $this->db->query($sql, $id);
			$array['people'] = $query->result_array();

			$sql = "SELECT u.name from `meetings` as m 
inner join `meetings_to_users` as mtu on mtu.`meeting_id` = m.`meeting_id`
inner join `users`as u on mtu.`user_id` = u.user_id
where m.meeting_id = ?";
			$query = $this->db->query($sql, $id);
			$array['users'] = $query->result_array();

			return $array;
		}

		public function delete($id){
			$this->db->delete('meetings', array('meeting_id' => $id)); 
		}
	}