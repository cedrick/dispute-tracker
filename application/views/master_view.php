<?PHP
header( 'Cache-Control: no-store, no-cache, must-revalidate' );
header( 'Cache-Control: post-check=0, pre-check=0', false );
header( 'Pragma: no-cache' );	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Singtel Dispute Tracker</title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>template/images/favicon.ico" type="image/x-icon" />
<link type="text/css" href="<?php echo base_url(); ?>template/style.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>library/ui-lightness/jquery-ui.css"  />
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>library/blue/style.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>library/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>library/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>library/jquery.tablesorter.min.js"></script>
</head>
<body>
<?php
if($this->session->userdata('username'))
		{
			$this->load->view('header2');
		}else
		{
			$this->load->view('header');
		}
 ?>

<?php  
	if (!isset($data)) {
		$data = NULL;
	}
	
	if(!isset($page))
	{
		$page = NULL;	
	} else {
		$this->load->view($page,$data); 
	}
?>

<?php  $this->load->view('footer');?>  

</body>
</html>