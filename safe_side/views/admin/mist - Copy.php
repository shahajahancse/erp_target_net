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


<script type="text/javascript">


ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


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



	<div id="container">
		
		<div id="header">
		
			<div id="header_top">
				<div id="logo">
					<a href=""><img border="0" src="image/h101.png" /></a>
				</div>
				<div id="header_right">
					Military Institute of Science and Technology (MIST)
				</div>
				<div id="header_right_bottom">
					<marquee>
						Technology for Advancedment. 
					</marquee>
				</div>			
				
			</div>
			
			<div id="menu">
				<div class="menu">		
<ul id="nav" class="dropdown dropdown-horizontal">
	<li><a href="index.php">Home</a></li>
    <li class="dir"> General
		 <ul>
			<li><a href="common_content.php?content_id=166703">About MIST</a></li>
			<li><a href="common_content.php?content_id=9056731">Location</a></li>
			<li><a href="common_content.php?content_id=2297749">Aim of MIST</a></li>
			<li><a href="common_content.php?content_id=9115571">Objectives</a></li>
			<li><a href="common_content.php?content_id=9484159"> Capabilities </a></li>
			<li><a href="common_content.php?content_id=7359211">Future Expansion</a></li>
			<li><a href="common_content.php?content_id=4288859">Code of conduct</a></li>
		</ul>
	</li>
	<li class="dir">&nbsp;&nbsp;Academic &nbsp;&nbsp;
		<ul>
			<li><a href="common_content.php?content_id=1494415">Dean</a></li>
			<li class="dir">Departments
				<ul>
					<li><a href="common_content_other.php?content_id=7870174">Department of Civil Engineering</a></li>
					<li><a href="common_content_other.php?content_id=7591522">Department of Computer Science and Engineering (CSE)</a></li>
					<li><a href="common_content_other.php?content_id=1747152">Department of Electrical Electronic and Communication Engineering</a></li>
					<li><a href="common_content_other.php?content_id=3987342">Dept of Mechanical Engineering (ME).</a></li>
					<li><a href="common_content_other.php?content_id=2927916">Dept of Aeronautical Engineering (AE).</a></li>
					<li><a href="common_content_other.php?content_id=9539341">Dept  of Science and Humanities (Sc &amp; H)</a></li>
				</ul>
			</li>
			<li><a href="common_content.php?content_id=7929319">Affiliation</a></li>
			<li><a href="common_content.php?content_id=90790">Withdrawl Policy</a></li>
			<li><a href="common_content.php?content_id=8531439">Program Details</a></li>
			<li><a href="common_content.php?content_id=5450721">Various Fees and Charges</a></li>
		</ul>
	</li>
	<li class="dir">Admission
		<ul>
			<li><a href="common_content.php?content_id=7073547">MIST Online Admission 2010</a></li>
		</ul>
	</li>
	<li class="dir"> Administration&nbsp;
		<ul>
			<li><a href="common_content.php?content_id=9509769">DAAQMG</a></li>
		</ul>
	</li>
	<li class="dir">&nbsp;Others &nbsp;&nbsp;
		<ul>
			<li><a href="common_content.php?content_id=2387990">Research  &amp; Development </a></li>
		</ul>
	</li>    
<li><a href="site_map.php">Site Map</a></li>
</ul>	
	</div>
			</div>
			
		<!--	<div id="slide">
	
				<div style="width:900px; height:10px; margin:0 auto; background:url(image/body_round_top.png) top center no-repeat;">					
				</div> 
				
				<div style="width:900px; height:150px; margin:0 auto; background:url(image/body_middle_repeat_banner.png) top center repeat-y;">
				</div>
				
				<div style="width:900px; height:10px; margin:0 auto; background:url(image/body_round_bottom.png) top center no-repeat;">					
				</div> 
				
			</div>-->
			 
		</div>
		
		<div id="main">
			
			<div style="width:900px; height:10px; margin:0 auto; background:url(image/body_round_top.png) top center no-repeat;">					
				</div> 
				
				<div style="width:900px; min-height:500px; height: auto; overflow:hidden; margin:0 auto; background:url(image/body_middle_repeat_banner.png) top center repeat-y;">
					
					<div style="width:24%; height:470px;; float:left; border-right:#9D9D9D solid 1px;">
						<div style="width:90%; height:450px; margin:0 auto; border:#CCCCCC 1px solid;">
							<div class="arrowlistmenu">

<h3 class="menuheader expandable">Menu1</h3>
<ul class="categoryitems">
<li><a href="index.php/admin/request">Booking Request</a></li>
<li><a href="index.php/admin/add_books">Add Books</a></li>
<li><a href="index.php/admin/journals">Add Journals</a></li>
<li><a href="index.php/admin/add_ebooks">Add E-Books</a></li>
<li><a href="index.php/admin/journals">Add CDs</a></li>
<li><a href="index.php/admin/journals">Sub-menu</a></li>
</ul>

<h3 class="menuheader expandable">Menu2</h3>
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
</ul>
</div>
						</div>
						
					</div>
					
					<div style="width:75%; float:right; min-height:500px; height: auto; overflow:hidden;">
						
						<div style="width:98%;  float:left; border:#CCCCCC 1px solid; min-height:450px; height: auto; overflow:hidden; position:relative;">
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
