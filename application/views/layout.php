<html>
	<head>
		<?php $this->load->view('header'); ?>
	</head>
	<body>
			<?php 
				if($content_view == 'company'){
					$this->load->view('company');
				}
			?>
	</body>
	<footer>
		<?php $this->load->view('footer'); ?>
	</footer>
</html>
