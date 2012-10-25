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
		$minutes  = floor(($time - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60); 

		$time = sprintf("%d months, %d days, %d hours, %d minuts\n", $months, $days, $hours, $minutes);
		return $time;
	}

	function time_to_sec($time) {
	    $hours = substr($time, 0, -6);
	    $minutes = substr($time, -5, 2);
	    $seconds = substr($time, -2);

	    return $hours * 3600 + $minutes * 60 + $seconds;
	}

	function secondsToTime($secs) {
        $sec_numb    = floor($secs);
        $hours   = floor($sec_numb / 3600);
        $minutes = floor(($sec_numb - ($hours * 3600)) / 60);
        $seconds = $sec_numb - ($hours * 3600) - ($minutes * 60);

        if ($hours   < 10) {$hours   = "0" . $hours;}
        if ($minutes < 10) {$minutes = "0" . $minutes;}
        if ($seconds < 10) {$seconds = "0" . $seconds;}
        $time    = $hours . ':' . $minutes . ':' . $seconds;
        return $time;
    } 

	function MyRenderTree ( $tree = array(array('name'=>'','depth'=>'')) ){

		$current_depth = 0;
		$counter = 0;

		$result = '<ul>';

		foreach($tree as $node){
		    $node_depth = $node['depth'];
		    $node_name = $node['name'];
		    $node_id = $node['task_id'];

		    if($node_depth == $current_depth){
		        if($counter > 0) $result .= '</li>';            
		    }
		    elseif($node_depth > $current_depth){
		        $result .= '<ul>';
		        $current_depth = $current_depth + ($node_depth - $current_depth);
		    }
		    elseif($node_depth < $current_depth){
		        $result .= str_repeat('</li></ul>',$current_depth - $node_depth).'</li>';
		        $current_depth = $current_depth - ($current_depth - $node_depth);
		    }
		    $dataUrl = '/tasks/complete/' . $node_id;

		    $result .= '<li id="c'.$node_id.'"';
		    $result .= $node_depth < 2 ?' class="open"':'';
		    $result .= '><input type="checkbox" name="completeTask" class="completeTask" data-url=' . $dataUrl . ' /><span>'.$node_name.'</span><br />';
		    ++$counter;
		}
		 $result .= str_repeat('</li></ul>',$node_depth).'</li>';

		$result .= '</ul>';

		return $result;
	}

?>