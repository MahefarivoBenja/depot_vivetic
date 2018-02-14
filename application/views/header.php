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
            <ul class="nav top-menu">
              <li id="header_notification_bar" class="dropdown">
                  <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false" style='background:#1a333c !important;color:white !important;'>
						<i class="fa fa-tasks" ></i>
                  </a>
                  <ul class="dropdown-menu extended notification">
                      <div class="notify-arrow notify-arrow-yellow"></div>
                      <li>
                          <p class="yellow">Divers administrations  :</p>
                      </li>
						<li>
							<a href="<?php echo base_url(); ?>">
								<span class="label label-info" style='background:#58c9f3 !important;color:white !important;'>
									<i class="fa fa-home"></i>
								</span>
                                SUIVI DES COMMUNICATIONS
                            </a>
						</li>
						<li>
							<a href="<?php echo base_url("theme"); ?>">
								<span class="label label-info" style='background:#58c9f3 !important;color:white !important;'>
									<i class="fa fa-bookmark-o"></i>
								</span>
								ADMINISTRATION THEME
							</a>
						</li>
						<li>
							<a href="<?php echo base_url("typologie"); ?>">
								<span class="label label-info" style='background:#58c9f3 !important;color:white !important;'>
									<i class="fa fa-leaf"></i>
								</span>
								ADMINISTRATION TYPOLOGIE  
							</a>
						</li>
                  </ul>
              </li>
              <!-- notification dropdown end -->
          </ul>
          </div>
		</header>
		<section id="main-content">
		
			<section class="wrapper">
			  <!-- page start-->
				<div class="row">
					<div class="col-lg-12">
					<!--breadcrumbs start -->
						<ul class="breadcrumb" style="border-left: 9px solid #58c9f3!important; color:#58c9f3!important;font-weight:bold;">
							<li ><i class="fa fa-home">&nbsp;</i><?php echo $page;?></li>
						</ul>
						<!--breadcrumbs end -->