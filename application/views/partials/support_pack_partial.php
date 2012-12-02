<?php foreach($current_support_packs as $packs){ 	
	echo $packs['name'] . '<ul><li><span>Task Date:- </span>' . date('d-m-Y', strtotime($packs['reminder_when'])) . '</li><li><span>Notes:- </span>' . $packs['notes'] . '</li></ul>';
} ?>