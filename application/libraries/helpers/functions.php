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

	 
?>