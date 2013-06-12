<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define("goback",$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
if(!isset($_SESSION["matchdrobe_token"]))
{
$_SESSION["matchdrobe_token"] = substr(md5(rand()),0,12);


}

$token = (isset($_SESSION["matchdrobe_token"]) ? $_SESSION["matchdrobe_token"] : "") ;
if(isset($_SESSION["matchdrobe_user"])){
	$checku = mysql_query("
	SELECT prelogin
	FROM user_profile WHERE id = '".$_SESSION["matchdrobe_user"]["id"]."'
	")or die(mysql_error());
	$pre_val=mysql_fetch_array($checku);
	if($pre_val[0]=="no"){
	if($_SERVER["REQUEST_URI"]!="/prelogin.php")
	header("Location: ".$url."prelogin.php");
	} 
}else
{
	if($_SERVER["REQUEST_URI"]!="/catalogue.php")
		header("Location: ".$url);
}
	if (!defined("IS_SITE"))
{
}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html id="html" style="" xmlns="http://www.w3.org/1999/xhtml"  lang="" dir="" >
<head>
<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>wardrobe.css" />
<script type="text/javascript" src="<?php echo $url;?>asset/scripts/jquery/jquery-1.7.min.js"></script>



<!--	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'> 
				 Stylesheets -->

<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->


<?php
if(defined("create")) //if create is active page
{

?>
<script src="http://d3lp1msu2r81bx.cloudfront.net/kjs/js/lib/kinetic-v4.5.2.js"></script>

  <script type="text/javascript" src="js/polyclip.js"></script>
   
   
   <?php
   }
   
   ?> 
   

   
	<script type="text/javascript" src="<?php echo $url;?>asset/scripts/jquery/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>asset/scripts/jquery/jquery-ui-1.8.22.custom.min.js"></script>

		<link href="<?php echo $url;?>catalog/scroll/jquery.mCustomScrollbar.css" rel="stylesheet" />
	<script src="<?php echo $url;?>catalog/scroll/jquery.mCustomScrollbar.concat.min.js"></script>
	          <script type="text/javascript" src="<?php echo $url;?>catalog/script/jquery.mlens-1.0.min.js"></script>


<script>
function url(){
	return "<?php echo $url; ?>";
}
</script>
	
	<script>

		$(function() {
//  $('#zoom_01').elevateZoom();

//close button
$(".close_pop").click(function()
{
$("#overlay").click();

}); 
$(document).on("click","li.cats",function(){ 
	$(this).children().slideToggle();
}); 
			
//wardropbe upload popup
$("#upload_like").live("click",function()
{
var wid = $(this).attr("href");
$.post("<?php echo $url;?>function/wardrobe.php",{"wid_like":wid,"token":"<?php echo $token;?>"},function(e)
{

});

if( $("span",this).text() == "Like this item ")
{
$("span",this).text("Unlike this item ");
$("img",this).attr("src","http://matchdrobe.com/catalog/icons/unlike.png");
}
else
{
$("span",this).text("Like this item ");
$("img",this).attr("src","http://matchdrobe.com/catalog/icons/like.png");

}
return false;
});      //like item on wardrobe
$("#go").click( function(){  //upload pop up
$("#con").load("<?php echo $url;?>wardrobe/wardrobe-upload-ajax.php?return=<?php echo goback; ?>",function()
{

$('.swatches').empty();

       $("#blah").attr("src","<?php echo $url; ?>images/upload-pic.png");        
});
	 
$("#overlay").fadeIn();
popup("#main"); 
$("#main").fadeIn();
return false;
});		
$(".header-cont ").mouseleave(function()
{

$("a.highlight").animate({
    backgroundColor: "#b80941"
  }, 'fast');
  $("a.highlight").attr('style', 'color: white !important');
});
		$("ul#site-menu li a").mouseenter(function() {
  $(this).animate({
    backgroundColor: "#b80941"
  }, 'fast');
  
  $(this).css('color','white');
   
   if($(this).hasClass('highlight'))
   {
     $("a.highlight").attr('style', 'color: white !important');

   
   }
   else
   {
   $("a.highlight").animate({
    backgroundColor: "#eeeeee"
  }, 'fast');
  
  $("a.highlight").attr('style', 'color: black !important');
  }

});

		$("ul#site-menu li a").mouseleave(function() {
  $(this).animate({
    backgroundColor: "#eeeeee"
  }, 'fast');
  
    $(this).css('color','black');
 
});


		setInterval(function(){
				$('#feedback a').animate( { backgroundColor:'#b80941' }, 1000).animate( { backgroundColor:'#ff145f' }, 1000);

		
		
		},1000);
		$(".span_close").live("click",function()
		{
		
		$("#overlay").click();
		});
		$("div.search").click(function()
		{
		
		$("#search_content").toggle();
		});
		$("div.heart").live("click",function()
		{
		ward();
		});
		function ward()
		{
	$("#header_wd div#wd_cont").empty().load("<?php echo $url;?>wardrobe/ajaxloader.php", function()
		{
		$("img.image").width(65).height(65);
				$("input.check").width(10).height(10).css("right","5px");
				$("div.wardrobe-item").css({"margin":"3px","padding-bottom":"5px"});
			$("div.w-item-thumb label").width(15).height(15).css({"background-size":"100%","right":"0px","padding":"0px"});
		$("a.wardrobe-name").remove();
		$("div#header_wd div#wd_cont").mCustomScrollbar({
					
				});	
		});
		
		}
		$("#cart").click(function()
		{
		if($("#header_wd div#wd_cont").html().length ==2)
		{
		
		ward();
		}
		$("#header_wd").toggle();
		
		})
		setInterval(function() {
		$("#num").load("<?php echo $url;?>notification/notify.php");
}, 4000);
		$("body").append('<div id="ask_advice" class="pop" style="display:none;background-color:white;position:fixed;width: 980px; height: 620px; z-index: 8990; overflow: hidden;"><div id="ask_page"></div></div>');
		$("body").append('<div id="agreement" class="pop" style="display:none;background-color:white;position:fixed;width: 480px; height: 420px; z-index: 8990; overflow: hidden;"><div id="agreement_page" align="center" style="font-size:20px;;width:390px;margin:auto;padding-top:20px;">By becoming an activated user of Matchdrobe - you agree to our conditions that all material and content in Matchdrobe may not be published, broadcast, rewritten or redistributed in whole or part with out the express written permission. Any user found to be in violation of the above Agreement will be held liable for damages. This includes but is not limited to: monetary cost for building of databases, HTML mark up, fees charged by hosting company, and any other costs associated with creations to the web pages. Contact redber2009@gmail.com.</div></div>');
		$(".del_noti").live('click',function()
		{
		$(this).closest("tr").remove();
		$.post("<?php echo $url;?>ajax_noti.php",{del : $(this).attr("href")});
		
		return false;
		
		});
		$('div#notif').live('click', function()
		{
		$.post("<?php echo $url;?>notification/notify.php",{"unread":'1'});
		if( $('#noti_div').html() === '' ) {
		$('#noti_div').load("<?php echo $url;?>ajax_noti.php");
		}
		$('#noti_div').slideToggle();
		});
		$('a.noti').live('click', function()
		{
		 var feed_id = $(this).attr('href');
		 var type = $(this).attr('data-type'); //notification type
		$('#overlay').fadeIn();
			$("#single_noti #noti_body").load("<?php echo $url;?>ajax_feed.php",{'feed_id':feed_id,'noti_type': type});
						

			    $("#single_noti").fadeIn().addClass('pop');
						popup('#single_noti');

				return false;
		});
		$("div#profile").click(function(event)
		{
		
	 $('#profile_menu').slideToggle();
		}
		);
		
	
		
	$(document).click(function() {
   		// $('#profile_menu').slideUp();

});
		$("span#login").click(function()
		{
	    $("#overlay").fadeIn();
		popup('#login_div');
			    $("#login_div").fadeIn();
		
		});
		
		$("span#register").click(function()
		{
	    $("#overlay").fadeIn();
	popup('#reg_div');
			    $("#reg_div").fadeIn();
		
		});
		
		$("p#forgot_password").click(function()
		{
		$("body").append('<div id="forget_div"><p class="register-title calibri_bold">Forgot Password:</p><p id="forget_validation"></p><div align="center">Email : <input type="text" id="forget_email" /><input type="button" value="send" id="forget_send" /></div></div>');
	$("#login_div").fadeOut();
			$("#reg_div").fadeOut();
			popup('#forget_div');
			    $("#forget_div").fadeIn();
		
		});
		
		$("#forget_send").live("click",function()
		{
			var email_add=$("#forget_email").val();
			$.post("<?php echo $url; ?>component/login-form/forgot-password.php",{email:email_add},function(a,b){
				$("#forget_validation").text(a);
			});
		});

		$("#register-link a").click(function()
		{
	$("#login_div").fadeOut();
			popup('#reg_div');
			    $("#reg_div").fadeIn();
		
		});
		
		$("span#register").click(function()
		{
	    $("#overlay").fadeIn();
	popup('#reg_div');
			    $("#reg_div").fadeIn();
		
		});

		
		
		$("#overlay").click(function()
		{
		$("#con").empty();
		$("html").attr("class","");
		$("div.pop").fadeOut();
		$(this).fadeOut();
			$("#login_div").fadeOut();
			$("#reg_div").fadeOut();
			 $("#forget_div").fadeOut();
		});
			  $('.default-value').each(function() {
				var default_value = this.value;
				$(this).css('color', '#666'); // this could be in the style sheet instead
				$(this).focus(function() {
					if(this.value == default_value) {
						this.value = '';
						$(this).css('color', '#333');
					}
				});
				$(this).blur(function() {
					if(this.value == '') {
						$(this).css('color', '#666');
						this.value = default_value;
					}
				});
			});
			
			$("#feedback a").click(function()
			{
			//$("#MyIframe").attr("src","");
		setIframeHeight("#MyIframe");
		
		popup("#fb");
		$("#overlay").fadeIn();
			return false;
			});
			
			
			
			
			
			
			
			
			
			
			
			
			
			//header
			
			
			
			
			
			//end of header scripts
			
			
			
			
			
		});
		function redirectlogin(url)
		{
	    $("#overlay").fadeIn();
		popup('#login_div');
			    $("#login_div").fadeIn();
				$("#hdnurl").val("<?php echo $url;?>"+url);
		$("#fb-login").attr("href","<?php echo $url;?>component/login-form/facebook_login.php?url="+url);
		}
				function ask_advice(id)
{
$("#overlay").fadeIn();
popup("#ask_advice");

$("#ask_page").empty().load("<?php echo $url;?>component/recommendation/ask_advice.php?product_id="+id);
}
function agreement()
{
$("#overlay").fadeIn();
popup("#agreement");
}

		function popup(div)
	{
	
	var winH = $(window).height(),
    winW = $(window).width();
$(div).css('top', winH / 2 - $(div).height() / 2);
$(div).css('left', winW / 2 - $(div).width() / 2);
	$(div).fadeIn();

	}
	function url(){
	return '<?php echo $url;?>';
	}
		</script>
	<?php
if(defined("feed")) ///include feed csripts
{

include($url.'feeds/feed.js.php');

}
//include($url.'wardrobe/wardrobe.js.php');

?>
<script>
 $(function(){
 
  var add;
 function clear()
{
   clearInterval(add);


}







		<?php
if(defined("create")) //if create is active page
{

?>
$(".cat_container").mouseenter(function()
{

$("p",this).css("visibility","visible");
});
$(".cat_container").mouseleave(function()
{

$("p",this).css("visibility","hidden");
});

<?php
}

?>





<?php
		
		
		
		
		
		
		
		
		
		if(defined('catalogue'))
		{
          include($url.'catalog/catalog.js.php');
		
		
		}
		
		else
		{
		?>
		
		scroller();
		function scroller()
{
	
	$(".comment_div").mCustomScrollbar();
	$("#wrap").mCustomScrollbar({
	
	mouseWheelPixels: 400,
							advanced:{
							updateOnContentResize: true
									},
									callbacks:{
    whileScrolling: function(){
	
	
	  
	$(window).scroll();
	
	},
		
		onTotalScroll: function(){
			<?php
				if(defined('feed'))
		{
         
		
		?>
			//alert();
			$("#loadmore").click();
			
			<?php
		}
		
		?>
			
		}
	
	
	
	
	
}
						
							});
							//$("#main-container , #footer ").css("left",15);

}

		<?php
		}
		?>



function rons()
{


	
	var clickable = $("a.selected_banner");
	
	if(clickable.next("a").length == 0 )
	{
	$("#first_banner").click();
	}
	else
	{
		clickable.next("a").click();

	
	}
		
	

	
}
  var add = setInterval(rons,4000);
		
		
 var index = 100;
 $("#banner_nav a").click(function()
 {

 var ron= "#" + $(this).attr("href");
 
 
 var show = $(this).attr("data-show")
 $(".home_banner").fadeOut(3000);

 $(ron).fadeIn(3000, function()
 {
 
   clearInterval(add);

$(ron).addClass("active");
index++;
add = setInterval(rons, 4000);
		
 });
 
 
 
 $("#banner_nav a").removeClass("selected_banner");
 $(this).addClass("selected_banner");
 
 return false;
 });
 

						

     });
</script>	


<script type="text/javascript" src="<?php echo $url;?>component/recommendation/ask_advice.js"></script>
<script src="<?php echo $url; ?>component/recommendation/answer_recommendation.js"></script>
<script src="<?php echo $url; ?>component/recommendation/manasory.js"></script>
<script src="<?php echo $url; ?>infinitescroll.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo $url;?>wardrobe/assets/prettify.css" />
	<script src="<?php echo $url; ?>wardrobe/js/libs/modernizr-2.0.6.min.js"></script>
    <script src="<?php echo $url; ?>wardrobe/js/libs/jquery.lettering.js"></script>
	<script src="<?php echo $url; ?>wardrobe/js/libs/mustache.js"></script>
	<script src="<?php echo $url; ?>wardrobe/js/libs/quantize.js"></script>
	<script src="<?php echo $url; ?>wardrobe/js/color-thief.js"></script>
	<script src="<?php echo $url; ?>wardrobe/js/index.js"></script>
	<script src="<?php echo $url; ?>wardrobe/prettify.js"></script>
	<script><!-- wardrobe scripts -->
	
			$('input#price').live("keypress",function(event) { //price
    if(event.which < 46
    || event.which > 59) {
        event.preventDefault();
    } // prevent if not number/dot

    if(event.which == 46
    && $(this).val().indexOf('.') != -1) {
        event.preventDefault();
    } // prevent if already dot
});
	   $("#uploaditem").live('click',function() {    //validate before upload
      // validate and process form here
      $('.error').hide();
  	  var name = $("input#name").val();
  		if (name == "") {
        $("label#name_error").fadeIn();
        $("input#name").focus();
        return false;
      }
	  
	  
	   var price = $("input#price").val();
  		if (price == "") {
        $("label#price_error").fadeIn();
        $("input#price").focus();
        return false;
      }
	  
	   var desc = $("textarea#desc").val();
  		if (desc == "") {
        $("label#desc_error").fadeIn();
        $("textarea#desc").focus();
		
        return false;
      }
	  
	  
	  
	    var namec = $("div#con select#cat_id1").val();
  		if (namec == "") {
       $("label#cat_error").fadeIn();
        $("select#cat_id1").focus();
        return false;
      }
	   var st = $("div#con select#style_id1").val();
  		
	  
	    	  var occ = $("div#con select#occasion_id1").val();
  		
	   
	   var br = $("div#con select#brand_id1").val();
  		
	  
	  
	   var sto = $("div#con select#store_id1").val();
  		
     if($("input[type='file']").val()=='')
	 {
	  $("label#upload_error").fadeIn();
	        return false;

	 }
	
	

	  
	  
			$("div#uploading").show();

  
  		
    });
	</script>

</head> 

										  
<body id="body" >

        <div id="wrap">
        
	<div class="header-cont">
	
	<div id="header" >
                
				
								    <a style="float:left;" href="<?php echo $url; ?>"><img style="margin-top:7px;margin-bottom:7px;" src="<?php echo $url; ?>images/logo.png" alt="matchdrobe.com" /></a>

                  
<style>
 



a#logo {
float: left;
opacity: 0.8;
background: #fff url(<?php echo $url;?>images/logo.png) no-repeat;
width: 233px;
height: 76px;
}


#loginContainer {
position: relative;
float: right;
font-size: 12px;
}

.avatar {
float: left;
}


#loginButton {
display: inline-block;
float: right;
position: relative;
z-index: 30;
cursor: pointer;
}
#loginBox {
position: absolute;
top: 34px;
right: 0;
display: none;
z-index: 29;
}

#loginForm {
width: 128px;
position: relative;
background: #ab0d3f;
opacity: 0.9;
left: -14px;
position: relative;
}





#login_submit
{
padding: 6px;
font-weight: bold;
font-size: 15px;
text-align: right;

}

ul.sub {

display:none;
}


#forget_div
{
background: #dcdcdc !important;

height: 171px;
width: 360px;
position: fixed;
z-index: 1002;
display:none;
background-color:white;
opacity:1;

}

#single_noti
{ 
min-height: 280px;
width: 450px;
position: fixed;
z-index: 1002;


display:none;
background-color:white;
opacity:1;

}
#login_div , #alert ,#fb
{
height: 300px;
width: 310px;
position: fixed;
z-index: 1002;


display:none;
background-color:white;
opacity:1;

}


	
#login_div table td
{
text-align:center
}


#overlay
{
display:none;
width:100%;
height:100%;
left:0px;
top:0px;
position:fixed;
z-index:1000;
background-color:black;
opacity:.8;

}

#loading
{
display:none;
width:100%;
height:100%;
left:0px;
top:0px;
position:fixed;
z-index:1004;
background-color:white;
opacity:.8;

}


/*--- DROPDOWN ---*/


 .selectedsub{
		color:#b80941;
	}
 a#Male1.parent_catmenu{
	width: 
 }
</style>

	
	
	
			  <div style="float: right;
width:500px">  
			  <?php
			 if(!empty($_SESSION['matchdrobe_user'])) // if not logged in
		{
		
		?>
			  	  <div id="notif">
								
								<a id=num></a>


								
															<div id="noti_div" style="top: 40px;
left: 800px;display:none;padding:10px;background:white;z-index:100;position:absolute;border:solid 3px  #eeeeee;"></div>

								
								</div>
								<?php
								}
								?>

                                <div class="profile" id="profile" style="">

								
								<?php 
		
		if(empty($_SESSION['matchdrobe_user'])) // if not logged in
		{
		
		?>
		
				<span id="register" class="button" >REGISTER</span>

		
		 	<span id="login" class="button" >LOGIN</span>
			
			
			
			
					
			
			
			<?php
			}else 
			
			{
			?>
			
		
			
			<?php
			$user_id = $_SESSION["matchdrobe_user"]["id"];

	$username=$_SESSION["matchdrobe_user"]["username"];

		$user_select=mysql_query("
		SELECT * FROM user_profile WHERE id='$user_id';
		");
		$fetch_user=mysql_fetch_array($user_select);
		$avatar_select=mysql_query("
		SELECT * FROM user_profile_avatar WHERE user_profile_id='".$fetch_user["id"]."';
		");
		$has_avatar=mysql_num_rows($avatar_select);
		if($has_avatar==1){
			$fetch_avatar=mysql_fetch_array($avatar_select);
			if($fetch_avatar["avatar_thumb"]!="")
			{
				$fetch_avatar=$fetch_avatar["avatar_thumb"];
			}else{
				$fetch_avatar=$fetch_avatar["avatar"];
			}
		}else{
			$fetch_avatar="images/avatar/default.png";
		}
	$pattern = '/facebook.com/';
	if( preg_match( $pattern, $fetch_avatar ) != 1 ) {
		$fetch_avatar=$url.$fetch_avatar;
	}
	?>

	
	

	
	
	   <div class="nameplate">

                                        <a href="#"><?php echo $fetch_user["name"]; ?></a> <img id="toggle" src="<?php echo $url;?>images/down.png" />
<br/>
                                      

                                    </div>
  <div id="profile_menu" class="options" >
<br/>
<center>
                                          <a  href="<?php echo $url;?>profile.php">My Matchdrobe</a><br/>

                                            <a style="margin-top:10px;"  href="<?php echo $url;?>my-matchdrobe/account-settings.php">Account Settings</a><br/>
                                           
                                          <BR/>

                                           <a  href="<?php echo $url;?>component/login-form/logout-process.php">Log Out</a>

										   </center>
                                        </div>
	
	<div class="profile-pic" style="position:relative;float:right">

                                     		<img width="45" height="45" src="<?php echo $fetch_avatar; ?>?ver=<?php echo date("Y-m-d H:i:s");?>" />


                                    </div>
                                    
                                    

                                 

                              
								
								
								
								
							
		
		
		<?php }?>
		
		
		
		
		
	  </div><!-- end of profile -->

<div style="float:right">
			
			 <a href ="main"   <?php 
if(!isset($_SESSION["matchdrobe_user"])){echo "onclick='redirectlogin(\"index.php\");return false;'";} else { echo 'id=go';  } ?> ><span style="top: 22px;margin-right: 10px;
position: relative;color:#b80941;font: normal 14px 'futura', sans-serif !important;" >UPLOAD</span></a>
   

      	 <a href ="" onclick="ask_advice('');return false;" ><span style="top: 22px;
position: relative;color:#b80941;font: normal 14px 'futura', sans-serif !important;" > ADVISE ME</span></a>
   

<!--   <span id="createlink"  >
							
								
							
						                                        <a style=" margin-left:10px;top: 10px;
position: relative;color:#919191;<?php if(defined('create')){ echo 'color:#b80941 !important;';} ?>font: normal 13pt 'Calibri', sans-serif;" href="<?php echo $url;?>create/index2.php">CREATE</a> 
		
								</span>
                              
-->
	</div>
	
	
	
																
								
						</div><!-- end of right -->

		
		   <div id="header-items">

                    <div class="left">

                    

                        <ul id="site-menu" >
<!--
                            <li class="menu cufon futura_std_book">

                                <a href="<?php echo $url;?>" class="megamenu mm_advice_me <?php if (defined('home')) {
    echo home;
}?>">Home</a>

                            </li>     
-->
	
		  <li class="menu calibri_bold">

                                <a class="<?php if (defined('feed')) {
    echo feed;
}?>" href="<?php echo $url;?>feeds" class="megamenu mm_shop" <?php 
if(!isset($_SESSION["matchdrobe_user"])){echo 'onclick="redirectlogin(\'feeds\');return false;"';} ?>>DISCOVER</a>

                               
                            </li>
							
							  <li class="menu calibri_bold">

                                <a class="<?php if (defined('create')) {
    echo create;
}?>" href="<?php echo $url;?>create/index2.php" class="megamenu mm_shop" <?php 
if(!isset($_SESSION["matchdrobe_user"])){echo "onclick='redirectlogin(\"create/index2.php\");return false;'";} ?>>CREATE</a>

                               
                            </li>
							
							
							 <li class="menu calibri_bold"><a class="<?php if (defined('catalogue')) {
    echo catalogue;
}

if (defined('home')) {
    echo home;
}
?>" href="<?php echo $url;?>catalogue.php">Catalogue</a></li>
                       	
	                        

                            <li class="menu calibri_bold"><a class="<?php if (defined('style')) {
    echo style; 
}?>" href="<?php echo $url;?>component/recommendation/recommendation_homepage.php" <?php 
if(!isset($_SESSION["matchdrobe_user"])){echo "onclick='redirectlogin(\"component/recommendation/recommendation_homepage.php\");return false;'";} ?>>Style Advice</a></li>
                       <!--     <li class="menu calibri_bold">

                                <a class="<?php if (defined('matchdrobe')) {
    echo matchdrobe;
}?>" href="<?php echo $url;?>profile.php" class="megamenu mm_shop">My Matchdrobe</a>

                               
                            </li> -->
							
							           

 
  
                           
                            
							

                            <li class="spaced" style="float: right;margin-right: 8px;">


                                <span class="search" style="display:block;height:27px;overflow:hidden">
<!--
                                        <input id="search" onfocus=" this.value = '';  " onblur="if(this.value == '') { this.value = 'Search Products'; } " type="text" name="q" value="Search Products"  />
-->
                                    <span id="searchtype">Search Products</span>    <input id="global_search" autocomplete="off" placeholder="" type="text" name="search" />
                                        <div class="search" class="shadow" >
                                        <div id="search_content" class="shadow" >
										<input type="submit" name="submit_btn" id="submit_btn" value='Products' style="display:none" />
										<div><input class="search_button" type="button" name="product" value="Search Products" /></div>
										<div> <input class="search_button" type="button" name="people" value="People" /></div>
										<div><input class="search_button" type="button" name="outfit" value="Outfit OTW" /></div>
							        	<div><input class="search_button" type="button" name="advice" value="Requests for Advice" /></div>


										</div>

										</div>

                                </span>



                            </li>
							
							<?php if(defined("feed"))
							{
							
							?>
							    <li class="spaced">

                               <button id="toggle_view" class="highlight" style="margin-top: 4px;
height: 31px!important;
cursor: pointer;
padding: 1px;
padding-left: 2px;
" title="toggle view" >
							   
							   <span class="toggle"> </span>
							  												   <span class="toggle"> </span>
							   <span class="toggle"> </span>
							   <span class="toggle"> </span>
		
							   
							   </button>
                            </li>
						<?php
						
						}
						?>
<script>
var selecteds ='Products';
$("#global_search").blur(function()
{
});
$("span.search").click(function()
{
 if(selecteds == 'Products')
{
$("#searchtype").text("Search Products: ");
}
$("#global_search").focus().animate({width:'165px'}, 500);
//$("#searchtype").text()+=':';
});
$(".search_button").click(function()
{
$("#submit_btn").val($(this).val());
selecteds =$(this).val();
$("#global_search").focus()
$("#searchtype").text($(this).val()+':');
$("#search_btn").val($(this).val());
//alert();
return false;
});

$("#global_search").keypress(function(e)
{
if(e.which == 13) {
 window.location = '<?php echo $url;?>search.php?search='+$("#global_search").val()+'&submit_btn='+selecteds;
 }
 $("#search_content").hide();
});



</script>
                          
                           <li class="spaced">

                        <!--        <span id="cart" style="margin-top:5px;"></span>
								
								<div id="header_wd"  style="display:none;margin-left: -180px;padding-top:15px;padding-left:5px;paddin-bottom:10px;
margin-top: 0px;
position: absolute;
z-index: 100;
height: 250px;
width: 250px;
background-image: url(http://matchdrobe.com/images/cart-box.png);
background-size: 100%;
background-repeat: no-repeat;">

<div id="wd_cont" style="height: 250px;
width: 250px;">

</div>
</div>
-->
                            </li>

                            

                           

                       

                        </ul>

                        

                    </div>

                </div>

                   
		<!-- end of header-items -->
		
             
	</div><!-- end of header-->
	</div>
	
	
	<div id="overlay" >
		
		
		</div>
		<script type="text/javascript">

function setIframeHeight( iframeId ) /** IMPORTANT: All framed documents *must* have a DOCTYPE applied **/
{
 var ifDoc, ifRef = document.getElementById( iframeId );

 try
 {   
  ifDoc = ifRef.contentWindow.document.documentElement;  
 }
 catch( e )
 { 
  try
  { 
   ifDoc = ifRef.contentDocument.documentElement;  
  }
  catch(ee)
  {   
  }  
 }
 
 if( ifDoc )
 {
  ifRef.height = 1;  
  ifRef.height = ifDoc.scrollHeight;
  
  /* For width resize, enable below.  */
  
  // ifRef.width = 1;
  // ifRef.width = ifDoc.scrollWidth; 
 }
}

</script>
		
				
		<div id="feedback" ><a href="">beta feedback</a></div>
			<div id="alert" class="pop">
		
		
		</div>
		
			<div id="fb" class="pop" style="height:500px;width:696px;">
		<p class="login-title" style="font-size:13px"> Feedback</p>
		
		
		<div style="overflow: auto;height:500px;"><iframe id="myIframe"  src="http://docs.google.com/forms/d/16k44HKbqfpBBw9aM_oInNPUR2y4PQ7JmaMbByKcGcuk/viewform" width="675" scrolling="no" height="6450">
  &lt;p&gt;Your browser does not support iframes.&lt;/p&gt;
</iframe>
</div>
		</div>
		<?php
	
	function nicetime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "from now";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}


	?>
	
	<style>
	.toggle
	{
	
   margin: 1px;
width: 10px;
display: block;
height: 10px;
float:left;
background: white;
position: relative;
	}
	#overlay
	{
	opacity:.7;
	
	}
	
	.feed-date {
width: 100px;
position: relative;
float: left;
margin-right: 40px;
color: #979797;
font-size: 0.750em;
font-family: Futura Std Book;
}
</style>
<div id="single_noti">

<div style="text-align:center;background:#b80941;color:white">Notification <span  style="float:right;margin-right:10px">x</span></div>
<div id="noti_body" style="padding:10px">

</div>
</div>



