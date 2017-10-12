	<?php
	$file = 'files/'.$_GET['file'];
	$json;
	if (is_file($file)) {
		chmod($file,0777);
		if(!unlink($file)) {
			echo false;
		}
		echo $json['success'] = true;
	} else {
		echo false;
	}
	?>