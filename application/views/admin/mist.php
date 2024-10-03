<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <title><?php echo $title; ?></title>
 <base href="<?php echo base_url();?>" />
<link rel="stylesheet" href="<?php base_url();?>css/style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/dpstyles.css">

<script type="text/javascript" src="<?php base_url();?>js/jquery-1.2.6.min.js"></script>

<script type="text/javascript" src="<?php base_url();?>js/ddaccordion.js">

/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
***********************************************/

</script>



<style type="text/css">

.arrowlistmenu{
width: 180px; /*width of accordion menu*/
margin:0 auto;
}

.arrowlistmenu .menuheader{ /*CSS class for menu headers in general (expanding or not!)*/
font: bold 14px Arial;
color: white;
background-color:#2D3691;
margin-bottom: 10px; /*bottom spacing between header and rest of content*/
text-transform: uppercase;
padding: 4px 0 4px 10px; /*header text is indented 10px*/
cursor: hand;
cursor: pointer;
}

.arrowlistmenu .openheader{ /*CSS class to apply to expandable header when it's expanded*/
background-image: url(titlebar-active.png);
}

.arrowlistmenu ul{ /*CSS for UL of each sub menu*/
list-style-type: none;
margin: 0;
padding: 0;
margin-bottom: 8px; /*bottom spacing between each UL and rest of content*/
}

.arrowlistmenu ul li{
padding-bottom: 2px; /*bottom spacing between menu items*/
}

.arrowlistmenu ul li a{
color: #A70303;
background: url(arrowbullet.png) no-repeat center left; /*custom bullet list image*/
display: block;
padding: 2px 0;
padding-left: 19px; /*link text is indented 19px*/
text-decoration: none;
font-weight: bold;
border-bottom: 1px solid #dadada;
font-size: 90%;
}

.arrowlistmenu ul li a:visited{
color: gray;
}

.arrowlistmenu ul li a:hover{ /*hover state CSS*/
color: #A70303;
background-color: #F3F3F3;
}

.arrowlistmenu ul li a:active{
color:#006600;
clear:both;
text-decoration:underline;

}





</style>





</head>

<body  >





<!--<h3 class="menuheader expandable">Menu1</h3>-->
<br />
<div style="margin:0 auto; width:100%; height:auto; overflow:hidden; padding-right:10px;">
	<span style="float:right;">
	<?php 
	
	if($this->session->userdata('admin_logged_in')==true)
	{
		echo "Welcome, <b>".$this->session->userdata('admin')."</b>";
		echo "<a href='index.php/admin/logout/'> Logout</a>";
	}
	else
	{
		redirect("index.php/admin");
	}
	?>
	</span>
</div>
<div style="margin:0 auto; width:100%; height:auto; overflow:hidden;">

<div style="margin:0 auto; width:20%; height:auto; overflow:hidden; float:left;">	
<ul class="arrowlistmenu">
<li><a href="index.php/admin/member">Add Member</a></li>
<li><a href="index.php/admin/list">List all user</a></li>
</ul>


<!--<h3 class="menuheader expandable">Menu2</h3>
<ul class="categoryitems">
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
</ul>

<h3 class="menuheader expandable">Menu3</h3>
<ul class="categoryitems">
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
</ul>

<h3 class="menuheader expandable">Menu4</h3>
<ul class="categoryitems">
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
<li><a href="#">Sub-menu</a></li>
</ul>-->
</div>
		
					<div style="width:75%; float:right; min-height:500px; height: auto; overflow:hidden; padding:10px;">
						
						<div style="width:98%;  float:left; border:#CCCCCC 1px solid; min-height:510px; height: auto; overflow:hidden; position:relative; padding:10px;">
						 <?php $this->load->view($main);?>
						</div>
						
					</div>
										
				</div>
				
				<div style="width:900px; height:10px; margin:0 auto; background:url(image/body_round_bottom.png) top center no-repeat;">					
				</div> 
			
		</div>
		
		<div id="footer">
		</div>
		
	</div>

</body>
</html>
