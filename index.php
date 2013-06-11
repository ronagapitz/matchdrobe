<?php
define("IS_SITE", true);
error_reporting(E_ALL);
//ini_set('display_errors', '1');
require("sqlConfig.php");
//define("home", " highlight", true);
?>

        <?php 
  	include 'header.php';
		?>
        
              <div id="main-container">
			  
			  <div id="banner_nav">
			  <a id="first_banner" class="selected_banner" href="b1" data-show="0" data-href="http://matchdrobe.com/feeds"></a>
			  <a href="b2"  data-show="980" data-href="http://matchdrobe.com/create/index2.php"></a>
			  <a href="b3"  data-show="0" data-href="http://matchdrobe.com/catalogue.php" ></a>
			  <a href="b4"  data-show="980"  data-href="http://matchdrobe.com/component/recommendation/recommendation_homepage.php"></a>
 
			  
			  
			  </div>
			  <div id="scroller" style="width:980px;overflow:hidden">
			  <div style="width:10000px;overflow:hidden">
			<div id="b1" class="home_banner active">
						<a href="http://matchdrobe.com/feeds">

			<img src="<?php echo $url;?>images/homepage/discover.jpg" />
			</a>
			</div>
				<div id="b2" class="home_banner">
										<a href="http://matchdrobe.com/create/index2.php">

			<img src="<?php echo $url;?>images/homepage/create.jpg" />
			</a>
			</div>	
			<div id="b3"  class="home_banner">
									<a href="http://matchdrobe.com/catalogue.php">

			<img src="<?php echo $url;?>images/homepage/own.jpg"  />
			</a>
			</div>
			
				<div  id="b4" class="home_banner">
			<a href="http://matchdrobe.com/component/recommendation/recommendation_homepage.php">
			<img src="<?php echo $url;?>images/homepage/advice.jpg"  />
			</a>
			</div>
			
			</div>
			</div>
			
			
	
</div>			  



	
	<style>
	.selected_banner
	{
	background: white !important;
	
	}
	#banner_nav
	{
margin-top: 14px;
margin-left: 813px;
display: block;
overflow: hidden;

position: absolute;
z-index: 1000;
	}
	#banner_nav a
	{
	margin-right:7px;
	background : #d40c4c;
	width:17px;
	height:17px;
	float:left;
	
	}
	.home_banner
	{
	

float:left;
position:relative;
	margin-right:0px;
	}
	.active
	{ 
	width:980px;
	display:block;
	
	}
	</style>
	
	
	
	
	
	
	
        
<?php include($url.'footer.php');?>

		
		
		
    </div>
	

    </body>
	
	<div id="overlay" > 
		
		
		</div>
		
			
	

</html>
