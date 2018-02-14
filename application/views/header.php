<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<link rel="icon" href="<?=base_url();?>/assets/img/vvp.ico" type="image/png"> -->
	<title><?php echo utf8_encode($title);?></title>
	<?php 
		if(isset($css) && count($css) > 0)
		{
			assets_url($css,$type='css');
		}
	?>
	<script>
		var url = "<?php echo base_url(); ?>";
	</script>
</head>

<body>
	<input type="hidden" id="checkth">
	<section id="container">
	
		<header class="header white-bg">
		   <div class="sidebar-toggle-box">
			 
		   </div>
   
			<!--<a href="http://localhost:8888/remontee_adlp/" class="logo"><strong>logo</strong><span>&nbsp;Societe</span></a> -->
			<!--logo-vp-white-x2.png
			<a href="#" class="logo-tree">
    			<img alt="logo-OAA" src="http://aide-agent.vivetic.com:8888/ADLP/assets/images/adlp_logo.png">
  			</a>
  			assets/logo-vp-white-x2.png
			-->
			<a href="<?php echo base_url();?>" class="logo">Version <span><b>PRE-PRODUCTION</b></span></a>
			
			
			<div class="nav notify-row" id="top_menu">
            <!--  notification start -->

          </div>
		</header>
		<section id="main-content" style="margin-left: 0px;">
		
			<section class="wrapper">
			  <!-- page start-->
				<div class="row">
					<div class="col-lg-12">


