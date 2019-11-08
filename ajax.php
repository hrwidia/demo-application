<?php 
		$data = [
			'name' => $_POST['name'],
			'phone' => $_POST['phone'],
			'interested' => $_POST['interested'],
			'comment' => $_POST['comment']
		];
		echo json_encode($data);
 ?>