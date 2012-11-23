<div class="one_half imageUploadArea">
	<br />
	<span>Upload Images</span><br />
	<?php if(isset($editinfo)){ 
		echo '<input type="hidden" name="currentImages" value="' . $editinfo['Image'] .'" class="currentImages" />';
		$images = explode('|', $editinfo['Image']);

		if(!empty($images[0])){
    		echo '<div class="allImageContainer">';
    		foreach($images as $image){
    			echo '<div class="imageContainer" data-imagename="' . $image . '"><img src="' . site_url('assets/uploads/customers/casestudies/' . $_SESSION['user']['User_ID'] . '/' . $image) . '" height="200" width="200" /><span class="removeImage">X</span><br /></div>';
    		}
    		echo '</div>';
    	}
	} ?>
	<?php echo form_upload(array('name' => 'images1', 'autocomplete' => 'off', 'value' => set_value('images'))); ?> <span class="addAnotherFile" data-number="1"> + Add Another Image</span>

</div>



-------------------------------------------------------------



<script type="text/javascript">
	$(document).ready(function(){
	$('.addAnotherFile').bind('click', function(){
		var num = parseInt($(this).attr('data-number'))+1;
		$('.imageUploadArea').append("<input type=\"file\" autocomplete=\"off\" value=\"\" name=\"images" + num + "\">");
		$(this).attr('data-number', parseInt($(this).attr('data-number'))+1);
	});

	$('.removeImage').bind('click', function(){
		$('.currentImages').val($('.currentImages').val().replace('|' + $(this).parent().attr('data-imagename'), ''));
		$('.currentImages').val($('.currentImages').val().replace($(this).parent().attr('data-imagename') + '|', ''));
		$('.currentImages').val($('.currentImages').val().replace($(this).parent().attr('data-imagename'), ''));
		console.log($('.currentImages').val());
		$(this).parent().remove();
	});
});

</script>




----------------------------------------------------------------
<?php

if(isset($_FILES) && !empty($_FILES)){

	$path = 'assets/uploads/customers/casestudies/' . $_SESSION['user']['User_ID'];

	if(!is_dir($path)){
		mkdir($path, 0777, true);
	}
	
	$config['upload_path'] =  $path;
	$config['allowed_types'] = 'gif|jpg|png';
	$this->load->library('upload', $config);
	$this->upload->initialize($config);


	$files = array();
	foreach($_FILES as $key => $value){
		if(!empty($value['name'])){
			if($this->upload->do_upload($key)){
				$files[] = $this->upload->data()['file_name'];
			} else {
				$data['error'] = 'There seems to have been an error uploading some of the images, please try again';
			}
		}
	}

	$images = '';
	$images = implode('|', $files);
}

?>