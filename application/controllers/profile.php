<?php 	

	class Profile extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->isAuthorised();
			$this->load->model('profile_model');
		}

		public function my_timesheets(){
			$data['title'] = 'Timesheets';
			$data['timesheets'] = $this->profile_model->get_tasksheets();
			$this->render_view('profile/timesheets', $data);
		}

		public function remove_users_time($task_time_id){
			$this->profile_model->remove_users_time($task_time_id);
			return true;
		}

		public function edit_timesheet($id){
			$data['info'] = $this->profile_model->get_task_time_details($id);
			$data['title'] = 'Update Time';
			$this->render_view('profile/edit_timesheet', $data);

			if($this->request->isPost()){

				if($this->profile_model->update_timesheet($id)){
					redirect('/profile/my_timesheets', 'refresh');
				}
			}
		}
	}
?>