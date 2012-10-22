<?php 
	
	/* This is the functions file. Similar to the wordpress functions file */

	function encryption_hard($word, $salt = 'iwantcady'){
	 	$string = $salt . $word;
	 	return sha1($string);
	}

	function render_partial($renderView, $view, $data=array()){
		// render view - name of the partial you want to render for example contactAdd_partial.php you would supply contactAdd.
		// $view is the directory that your partial exists in.
		include("application/views/{$view}/partials/{$renderView}_partial.php");
	}

	function render($path, $data=null, $noInclude=false){
		if($noInclude == true){
			$this->load->view($path, $data);
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view($path, $data);
			$this->load->view('templates/footer');
		}
	}


	function dateDiff($start, $end) {

		$start_ts = strtotime($start);

		$end_ts = strtotime($end);

		$diff = $end_ts - $start_ts;

		return round($diff / 86400);

	}

	function get_types_of_tasks(){
		$this->load->model('task_model');
		return $task_types = $this->task_model->get_task_types();
	}


	function format_seconds($time){

		$time = intval($time);
		$years   = floor($time / (365*60*60*24)); 
		$months  = floor(($time - $years * 365*60*60*24) / (30*60*60*24)); 
		$days    = floor(($time - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$hours   = floor(($time - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24)/ (60*60)); 
		$minutes  = floor(($time - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60)/ 60); 

		$time = sprintf("%d months, %d days, %d hours, %d minuts\n", $months, $days, $hours, $minutes);
		return $time;
	}

	function time_to_sec($time) {
	    $hours = substr($time, 0, -6);
	    $minutes = substr($time, -5, 2);
	    $seconds = substr($time, -2);

	    return $hours * 3600 + $minutes * 60 + $seconds;
	}

	$result=time_to_sec('01:00:00');
?>