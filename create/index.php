<?php
session_start();
define('create',true);
$userid=$_SESSION["matchdrobe_user"]["id"];
require("../sqlConfig.php");
include '../header.php';
  	?>

			  
<style>
.select_cat
{
z-index:100;

}

</style>	  
			  
			  
 <div id="main-container">
			  		
				
				
				
					 <div class="row-fluid">
  <div id="content" class="span6" style="margin-top:70px;float:right;width: 495px;
margin-left: -20px;
">

	
<ul class='horizontal'>


<li>

			<button id="clear"  class="shadow button" >Clear</button>
</li>
		<li>	<button id="texter"  class="shadow button" >Add Text</button></li>
 <li><button id=flip class="shadow button">flip</button></li>
  
 <li><button id=top class="shadow button">front</button></li>
  
 
 <li> <button id=crop class="shadow button">crop</button></li>
<li>					<button id="background" class="shadow button">background</button></li>
<li> 				<button id="publish" class="shadow button " >Publish</button>
</li>
		</ul>
<!--
<tr>

  <td colspan=4>
  Canvas Height:
  <input class="btn btn-small" type="range" id="canvasHeight" min="40" max="400" step="1" value="200">
</td></tr> -->


	<!--<td>
   <a href="#res">   <button id="generate" type="button" class="btn btn-small">Generate
        </button> </a>
 <li> <button id=remove class="shadow button">Remove</button></li>
<li>

<button id="preview"  class="shadow button">Preview</button> 
</li>

</td>
<ul class="horizontal">


 <!-- <td colspan=4>Size:  <input class="btn btn-small" type="range" id="canvasWidth" min="40" max="400" step="1" value="200">
     
  </td> 

			<li></li>
</ul>
		-->		
				 <div id="container" style="height:500px;border: solid 1px #a0a2a5;">

				 <h1 STYLE="margin-left:20px;color:#7d7d7d;position:absolute;top:300px;">YOUR OUTFIT OF THE WEEK GOES HERE<br/>
				
				<small> Create it by dragging the items and arranging them in this box.</small></h1></div>
	
	
<?php

include('editor.php'); //editor

?>
	  
	  </div>
	      <div  class="span6 panel" style="float:left;margin-left:0px;">

		<!--  

 
 -->

 <div id="otw_header">
 
 <div id="otw_icons">
 <div class="icon_container">
  <a id="otw_source" data-div="source_div" class="otw_filter"> </a>
  <br/>
 <p> Source</p>
  </div>
  <div>
    <div class="icon_container">
      <a id="otw_gender" data-div="gender_div" class="otw_filter"> </a>
	  <p> Gender</p>
  </div>
  <div class="icon_container">
   <a id="otw_cat"  data-div="cat_div" class="otw_filter"> </a>
   <br/>
 <p> Category</p>
  </div>
   </div>
   
  
       <div class="icon_container">

	        <a id="otw_search" data-div="search_div" class="otw_filter"> </a>
			  <p> Search</p>
  </div>
  
  
   <div class="icon_container">

	<a id="otw_color" data-div="color_div" class="otw_filter"> </a>
						
  <p> Color</p>
  </div>
  
     <div class="icon_container">

 <a id="otw_view" data-div="view_div" class="otw_filter"> </a>
  <p> View</p>
  </div>
  
</div>
 <!--
 <div id="forcat">
 <ul  style="list-style: none;display:initial;padding-left:5px;">
 <li CLASS="cats" style="padding-left:5px;float:left;position:relative;color:#ededed;background:#303030;width:135px;height:20px;font:normal 14px/1.5 calibri"> <span class="name">Gender</span>
 <img style="float:right" src="<?php echo $url; ?>create/images/arrowdown.png" />
 <ul class="select_cat dropdown shadow" style="z-index:100;position: absolute;DISPLAY:NONE;
top: 100%;
left: 0;
width: 92%;
padding-left:10px;
list-style: none;
margin: 0;">

<?php
$parent = mysql_query("select a.category_id ,a.category_name from categories_tbl as a,category_categories as b where a.category_id = b.category_child_id and b.category_parent_id = 0");
while($row = mysql_fetch_array($parent))
{

?>


 <li  ><a href="level2" style="color:black;font:normal 14px/1.5 calibri" class="level1 ct" data-id="<?php echo $row[0];?>"><?php echo $row[1];?></a></li> 
<?php
}
?>
 
 </ul>
 
 
 
 
 
 
 </li>
 
 <li id="level2" CLASS="cats" style="padding-left:5px;margin-left:20px;float:left;position:relative;color:#ededed;background:#303030;width:135px;height:20px;font:normal 14px/1.5 calibri">
    <span style="color:#b80941;font-weight:bold;position:absolute;left:-13px">></span>       <span class="name">   Category</span>
 
  <img style="float:right" src="<?php echo $url; ?>create/images/arrowdown.png" />

 <ul class="select_cat  dropdown shadow" style="z-index:100;position: absolute;DISPLAY:NONE;
top: 100%;
left: 0;
width: 92%;
padding-left:10px;
list-style: none;
margin: 0;">

  <li style="color:black;font:normal 14px/1.5 calibri" class="level2 ct " data-id="0">All Items</li> 

 </ul>
 
 </li>
 
  <li id="level3" CLASS="cats" style="padding-left:5px;margin-left:20px;float:left;position:relative;color:#ededed;background:#303030;width:135px;height:20px;font:normal 14px/1.5 calibri">
    <span style="color:#b80941;font-weight:bold;position:absolute;left:-13px">></span>       <span class="name">  Child Category</span>
 
  <img style="float:right" src="<?php echo $url; ?>create/images/arrowdown.png" />

 <ul class="select_cat  dropdown shadow" style="z-index:100;position: absolute;DISPLAY:NONE;
top: 100%;
left: 0;
width: 92%;
padding-left:10px;
list-style: none;
margin: 0;">

  <li style="color:black;font:normal 14px/1.5 calibri" class="level2 ct " data-id="0">All Items</li> 

 </ul>
 
 </li>
 <br/>

  <li CLASS="cats" style="margin-top:10px;padding-left: 7px !important;float:left;position:relative;color:#ededed;background:#303030;width:135px;height:20px;font:normal 14px/1.5 calibri" > <!-- colors -->
<!--
      All Colors  <img style="float:right" src="<?php echo $url; ?>create/images/arrowdown.png" />


              <ul class="select_cat palette" style="position: absolute;background:silver;DISPLAY:NONE;
top: 100%;
left: 0;
width: 100%;
list-style: none;
margin: 0;">


 

				
				
                    <li style="display:none" class="option selected root ajax" src=""><a href="#">All Colors</a></li>

                    <li class="option color ajax" style=" width:12px; float:left;background: #6d0101" src="6d0101"> </li>
			        <li class="option color ajax" style=" width:12px; float:left;background: #a0522c" src="a0522c"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #d3d100" src="d3d100"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #566b30" src="566b30"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #65cdaa" src="65cdaa"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #215260" src="215260"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #19196f" src="19196f"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #4b0081" src="4b0081"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #dd143e" src="dd143e"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #3d2000" src="3d2000"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #000000" src="000000"> </li>

					
					
					
					
					
					
					 <li class="option color ajax" style=" width:12px; float:left;background: #9a0002" src="9a0002"> </li>
			        <li class="option color ajax" style=" width:12px; float:left;background: #d16920" src="d16920"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #daa521" src="daa521"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #6a8e22" src="6a8e22"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #01ced1" src="01ced1"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #007575" src="007575"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #00007f" src="00007f"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #483d89" src="483d89"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #e20e5b" src="e20e5b"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #8c5d2f" src="8c5d2f"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #363636" src="363636"> </li>

					
					
					
					
					
					<li class="option color ajax" style=" width:12px; float:left;background: #a44042" src="a44042"> </li>
			        <li class="option color ajax" style=" width:12px; float:left;background: #fe8050" src="fe8050"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #ffd600" src="ffd600"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #016701" src="016701"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #34e4e4" src="34e4e4"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #018b8d" src="018b8d"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #0100cc" src="0100cc"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #510f3f" src="510f3f"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #fe1491" src="fe1491"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #8f7131" src="8f7131"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #636363" src="636363"> </li>

					
					
					
					
					
					<li class="option color ajax" style=" width:12px; float:left;background: #ce5c5c" src="ce5c5c"> </li>
			        <li class="option color ajax" style=" width:12px; float:left;background: #fe6200" src="fe6200"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #ffff00" src="ffff00"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #228b22" src="228b22"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #65f4c9" src="65f4c9"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #628c8b" src="628c8b"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #4269e2" src="4269e2"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #820f48" src="820f48"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #fe6ab6" src="fe6ab6"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #8c4414" src="8c4414"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #898989" src="898989"> </li>

					
					
					
					
					
					<li class="option color ajax" style=" width:12px; float:left;background: #fe0000" src="fe0000"> </li>
			        <li class="option color ajax" style=" width:12px; float:left;background: #ff7f00" src="ff7f00"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #edd54f" src="edd54f"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #00ae00" src="00ae00"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #77f6a7" src="77f6a7"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #62778c" src="62778c"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #4682b4" src="4682b4"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #b80940" src="b80940"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #d87093" src="d87093"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #ad5831" src="ad5831"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #b7b7b7" src="b7b7b7"> </li>

					
					
					
					
					
					<li class="option color ajax" style=" width:12px; float:left;background: #ff6448" src="ff6448"> </li>
			        <li class="option color ajax" style=" width:12px; float:left;background: #fea408" src="fea408"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #f0e78c" src="f0e78c"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #2e8a57" src="2e8a57"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #b3ffff" src="b3ffff"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #7c96b1" src="7c96b1"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #589ad6" src="589ad6"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #810081" src="81007f"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #f0807f" src="f0807f"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #d2b45a" src="d2b45a"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #d3d1d2" src="d3d1d2"> </li>

					
					
					
					
					
					<li class="option color ajax" style=" width:12px; float:left;background: #fa8073" src="fa8073"> </li>
			        <li class="option color ajax" style=" width:12px; float:left;background: #ffc548" src="ffc548"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #ffff6d" src="ffff6d"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #8ebc8e" src="8ebc8e"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #caff97" src="caff97"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #b0c4dd" src="b0c4dd"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #00bffe" src="00bffe"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #bb55d4" src="bb55d4"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #ffb6c1" src="ffb6c1"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #deb887" src="deb887"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #e7e7e7" src="e7e7e7"> </li>

					
					
					
					
					
					<li class="option color ajax" style=" width:12px; float:left;background: #ea967a" src="ea967a"> </li>
			        <li class="option color ajax" style=" width:12px; float:left;background: #f3a45f" src="f3a45f"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #ffffaf" src="ffffaf"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #adff30" src="adff30"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #d9ffb2" src="d9ffb2"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #8bc3fe" src="8bc3fe"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #89c4fe" src="89c4fe"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #dca0dc" src="dca0dc"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #ffdfee" src="ffdfee"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #f5deb2" src="f5deb2"> </li>
                    <li class="option color ajax" style=" width:12px; float:left;background: #ffffff" src="ffffff"> </li>

					
					
					
					
					
					

                </ul>

            </li>
 
 
 
  <li id="level3" CLASS="cats" style="display:none;float:left;position:relative;color:#ededed;background:#303030;width:135px;height:20px;font:normal 13pt calibri">Choose
 <ul class="select_cat" style="position: absolute;background:silver;DISPLAY:NONE;
top: 100%;
left: 0;
width: 100%;
list-style: none;
margin: 0;">


 </ul>
 
 </li>
 
 
<li style="   margin-top: 9px;
margin-left: 18px !important;
width: 140px;
float: left;
margin-left: 25px;
border: solid 1px !important;
height: 20px;
border-right: none !important;
}">
<input placeholder="Type in keyword here.." style="font-size: 10px;
border: transparent !important;
height: 16px;
width: 115px;position:relative;top:-2px;
" type="text" id="create_search" size=10 />
<img style="float:right;margin-top: -23px;
margin-left: 7px;
" src="<?php echo $url;?>create/images/search.png" />
</li>
 <!--
 <li >
 <button class="button shadow bold" style="   margin-top: 9px;
margin-left: 19px !important;"> Reset all</button>
 
 </li>
 
 </ul>
 
 </div>
 
 
 <div id="forwd" style="display:none">
 
<ul style="margin-top: 5px;
margin-left: -60px;
">

<li id="wtypes"  class="cats" style="padding-left:5px;margin-left:20px;float:left;position:relative;color:#ededed;background:#303030;width:135px;height:20px;font:normal 14px/1.5 calibri">
       <span class="name">  Type</span>
 
  <img style="float:right" src="<?php echo $url; ?>create/images/arrowdown.png" />

 <ul class="select_cat  dropdown shadow" style="z-index:100;position: absolute;DISPLAY:NONE;
top: 100%;
left: 0;
width: 92%;
padding-left:10px;
list-style: none;
margin: 0;">

<li style="color:black;font:normal 14px/1.5 calibri" class="level2 wds" data-id="">All Items</li> 
  <li style="color:black;font:normal 14px/1.5 calibri" class="level2 wds" data-id="uploaded">Uploaded</li> 
  <li style="color:black;font:normal 14px/1.5 calibri" class="level2 wds" data-id="catalog">Wishlist</li> 
  <li style="color:black;font:normal 14px/1.5 calibri" class="level2 wds" data-id="liked">Liked</li> 
 </ul>
 
 </li>
 
 <li id="wtags" class="cats" style="padding-left:5px;margin-left:20px;float:left;position:relative;color:#ededed;background:#303030;width:135px;height:20px;font:normal 14px/1.5 calibri">
       <span class="name"> Tags</span>
 
  <img style="float:right" src="<?php echo $url; ?>create/images/arrowdown.png" />

 <ul class="select_cat  dropdown shadow" style="z-index:100;position: absolute;DISPLAY:NONE;
top: 100%;
left: 0;
width: 92%;
padding-left:10px;
list-style: none;
margin: 0;">

  <li style="color:black;font:normal 14px/1.5 calibri" class="level2 wds" data-id="0">All Items</li> 
  <?php 
  
 $tag = mysql_query("select * from wardrobe_tags where user_id ='".$userid."'");
 
 while($rt = mysql_fetch_array($tag))
 {
 
 ?>
 
   <li style="color:black;font:normal 14px/1.5 calibri" class="level2 wds" data-id="<?php echo $rt['id']; ?>"><?php echo $rt['tag']; ?></li> 

 
 <?php
 
 }
  
  ?>

 </ul>
 
 </li>

</ul>
 </div>
 -->
 </div>
 
 
 

 
 <div  style="width:480px;height:520px;border:solid 1px #9d9fa2;border-top:none;">
 
<div id="load">
   
   
   
   </div> <!-- loaded items -->
 
 
 
 </div>
 
		  
		  

</div>
	
	</div>		
				
				
				
				
				
				
</div>			  


	 
 </div>
 
	
	
<script>



 
	
</script>
	
	<style>
  
  #dragtext
  {
  font-weight:bold;
  font-size:25px;
  
  }
  </style>
	
        

        <div id="footer" class="calibri">

        

            <div class="left ">

                <a href="#">About  |</a>

                <a href="#">Blog   |</a>

                <a href="#">Contact Us   |</a>

                <a href="#">FAQs   |</a>

                <a href="#">Terms of Services   |</a>

                <a href="#">Privacy Policy</a>

            </div>

            

            <div class="right">

                <table border="0" cellpadding="0" cellspacing="0" style="height: 100%">

                    <tr>

                        <td valign="middle">

                            <a href="#" title="Like us on Facebook"><img src="<?php echo $url;?>asset/images/fb-footer.png" alt="Facebook" /></a>

                            <a href="#" title="Follow us on Twitter"><img src="<?php echo $url;?>asset/images/twitter-footer.png" alt="Twitter" /></a>      

                        </td>

                        <td valign="middle" style="padding-left: 10pt; padding-right: 10pt">

                            <span>Matchdrobe &copy; 2013. All Rights Reserved.

                        </td>

                        <td valign="middle">


                        </td>

                    </tr>

                </table>

            </div>

        </div>

		
		
		
    </div>
	

    </body>
	
	<div id="overlay" > 
		
		
		</div>
		
			
		<div id="login_div" class="calibri">
		<p class="login-title calibri_bold">
				Login to your account</p>
				<div id="register-link">
						Don't have an account yet? 
						<a href="#" style="color:#b80941;text-decoration:none;"> Register now! </a>
					</div>
		<?php
		include("component/login-form/login.php");
		?>
		</div>
		
		
		<div id="reg_div">
			<?php
		include("component/login-form/register.php");
		?>
		
		</div>
		
		
<?php

include 'addtext.php';



?>
		
		
			
		<div id="imageprev" style="display:none;font: normal 10pt futura_std_book, arial, sans-serif;
height: 500px;
width: 600px;
position: fixed;
z-index: 1002;
display: none;
background-color: white;
opacity: 1;" class="pop">
	 <div style="font-weight:bold;text-align:center;background:#b80941;color:white;padding:5px">Preview<span class="span_close" style="float:right;margin-right:10px">x</span></div> 

		<img id="sample" src="" style="height: 600px;
width: 600px;"/>



		</div>
		
		<!-- publish otw  -->
		
		
		<div id="bg_div" style="display:none;font: normal 10pt futura_std_book, arial, sans-serif;
height:200px;
width: 600px;
position: fixed;
z-index: 1002;
display: none;
background-color: white;
opacity: 1;" class="pop">

					 <div style="font-weight:bold;text-align:center;background:#b80941;color:white;padding:5px">Choose / Upload Background <span class="span_close" style="float:right;margin-right:10px">x</span></div> 
	   <form id="fileUploadForm" method="POST" action="" enctype="multipart/form-data" style="height:25px">
<br/>
       <input style="" type="file" id="up" class="wuploader select shadow" style="overflow:hidden;float:left;" name="file" accept="image/x-png, image/gif, image/jpeg"  />
	  <br/><br/>
</form>

		<br/>
		<br/>
		<img class="bg" src="images/1.jpg" style="width:70px;height:70px" />
				<img class="bg" src="images/2.jpg" style="width:70px;height:70px" />
		<img class="bg" src="images/3.jpg" style="width:70px;height:70px" />
		<img class="bg" src="images/4.jpg" style="width:70px;height:70px" />
		<img class="bg" src="images/5.jpg" style="width:70px;height:70px" />
		<img class="bg" src="images/1.jpg" style="width:70px;height:70px" />
<img class="bg" src="images/2.jpg" style="width:70px;height:70px" />
<img class="bg" src="images/3.jpg" style="width:70px;height:70px" />
<hr style="margin: 6px 0;" />

		
		</div>
		
		
			<div id="publishdiv" style="display:none;font: normal 10pt futura_std_book, arial, sans-serif;
height: 400px;
width: 720px;
position: fixed;
z-index: 1002;
display: none;
background-color: white;
opacity: 1;" class="pop shadow">
 <div  style="font-weight:bold;text-align:center;background:#b80941;color:white;padding:5px">Publish Outfit<span class="span_close" style="float:right;margin-right:10px">x</span></div> 

	<table class="table  " style="padding:10px" cellspacing=5>
	<form action="ajax.php" method="POST">
	<tr><td colspan=2 rowspan=4>	<img id="sample2" src="" style="height: 340px;
width: 380px;"/></td></tr>
<input type="hidden" name="data" value="" id="otw_id" />
<input type="hidden" name="prods" value="" id="prods" />

	<tr><td>Title</td><td><input style="width:220px" name="title" class="span3"  type=text /></td></tr>
		<tr><td valign=top>Description</td><td><textarea style="width:220px"  rows=15  name="desc" ></textarea></td></tr>
		<tr><td colspan=2 align=right><input type=submit class="button shadow" value="Publish" /></td></tr>
</form>
	
	</table>


		</div>
		
		
		
		<div id="source_div"  class="pop shadow">
 <div  style="font-weight:bold;text-align:center;background:#b80941;color:white;padding:5px">Select Source<span class="span_close" style="float:right;margin-right:10px">x</span></div> 
<center>
<a  id="wd" ></a>


<a class="ct" style=""></a>


</center>

		</div>
		
		
		<div id="cat_div"  class="pop shadow">
 <div  style="font-weight:bold;text-align:center;background:#b80941;color:white;padding:5px">Category<span class="span_close" style="float:right;margin-right:10px">x</span></div> 
<center>

<div id="female_cat">
<div class="cat_container">
	<a id="fem_top"></a>
		<p>TOPS & OUTERWEAR</p>

</div>
<div class="cat_container">
<p>DRESSES</p>
	<a id="fem_dress"></a>
</div>
<div class="cat_container">

	<a id="fem_skirt"></a>
	<p>SKIRTS</p>

</div>
<div class="cat_container">
<p>PANTS & JEANS</p>

	<a id="fem_jeans"></a>
</div>
<div class="cat_container">

	<a id="fem_short"></a>
	<p>SHORTS</p>

</div>
<div class="cat_container" style="height: 250px;">

	<a id="fem_under"></a>
	<p>
	INTIMATES, SWIMWEAR,
& SLEEPWEAR</p>
</div>
<div class="cat_container">

	<a id="fem_shoes"></a>
	<p>
SHOES</p>
</div>
<div class="cat_container">

	<a id="fem_bag"></a><br/>
	<p>
	BAGS</p>
</div>
<div class="cat_container">

	<a id="fem_ribbon"></a><br/>
	<p>
	ACCESSORIES</p>
</div>

<div class="cat_container">

	<a id="fem_lips"></a><br/>
	<p>BEAUTY
ESSENTIALS</p>
</div>
</div>
</div>


</center>

		</div>
		
			<div id="gender_div" class="pop shadow">
 <div  style="font-weight:bold;text-align:center;background:#b80941;color:white;padding:5px">Select Gender<span class="span_close" style="float:right;margin-right:10px">x</span></div> 
<center> 
<a href="1" id="otw_men"></a>
<a href="2" id="otw_women"></a>
</center>

		</div>
		
		<!-- end publish -->
</html>
<script>
$(".otw_filter").click(function()
{
showdiv = "#"+$(this).attr("data-div");
popup(showdiv);
$(showdiv).fadeIn();
$("#overlay").fadeIn();


});
$("#background").click(function()
{

popup("#bg_div");
$("#overlay").fadeIn();
$("#bg_div").fadeIn();

});
$("#textsubmit").click(function()
{
$("#overlay").click();
});
$('.tab').click(function()
{
$('.tab').removeClass('selected_tab');
$(this).addClass('selected_tab');

});

$("li.cats").click(function(){

$("ul", this).slideToggle();



});


$("a.level1").click(function()
{
$('#'+$(this).attr('href')).show();
$(".togglelist").hide();

$("#level2 ul").load("<?php echo $url;?>create/ajaxcat.php",{parent: $(this).attr("data-id")});
$(this).parent('li').click();
return false;
});


$("#level2 li").live("click",function()
{


$("#level3 ul").load("<?php echo $url;?>create/ajaxcat.php",{parent: $(this).attr("data-id")});
$(this).parent('li').click();
return false;
});




 $("li.color").click (function() {
  if ($(this).hasClass ("selected_color")) {
  $("li.option").removeClass ("selected_color");


 }
 else
 {
 
   $("li.option").removeClass ("selected_color");

   $(this).addClass ("selected_color");

 
 }
 
 color = $(this).attr("src");
});

</script>
 <?php
 
 
 include ("style.php");
 
 
 ?>
 
