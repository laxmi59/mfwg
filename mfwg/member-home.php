<?php
$main_page='current_page_item';
include_once('classes/class.system.php');
include_once("classes/class.js.php");
include_once('includes/checksession.php');

$obj=new System();
$obj->dbconn();
$page=(isset($_GET['page']))?$_GET['page']:0;
$data=$obj->get_news($page,RESULTS_PER_PAGE)

?>
<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Fitness Website Gurus</title>
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<!--[if lt IE 9]>
<script src="js/html5.js" type="text/javascript"></script>
<![endif]-->
</head>
<body>
<?php include('includes/header.php'); ?>
 <div class="site-image" id="site-image"> 
<div class="hfeed" id="page">
  <div id="main">
    <form method="post" enctype="multipart/form-data">
      <div id="primary" class="member-home pd30">
        <h1> <span>Welcome  to</span> Fitness  Website  Gurus   Member   Section</h1>
        <div class="content"> <img src="images/member-home-pic.png" width="537" height="369" align="right">
          <p>Welcome to the Fitness Website Gurus Member Section, and thanks for signing up! This is your primary dashboard (which is exclusive to members), and from here you can do a variety of things: view and edit your site to your heart's content; access detailed statistics/analytics to see how your site is doing; be the first to know about new features that we're offering; browse your library and bone up on fitness marketing; and upgrade your account with our intuitive shopping cart. This is where you control the show, so have fun and stay fit.</p>
        </div>
        <h2><span>Latest</span> NEWS</h2>
        <div class="content">
          <div class="newspost">
           
			<?php

if(is_array($data) && $data['total']>0)
{?>
 <ul>
<?php
$i=0;
	foreach($data['title'] as $each_news)
	{?>
              <li><span class="top"></span>
                <div class="date"><?php echo date('M jS Y',strtotime($data['date'][$i])); ?><br/>
				<?php echo date('g:i a',strtotime($data['date'][$i])); ?>
				</div>
                <div class="newscontent">
                  <h2><?php echo $each_news;?></h2>
                  <?php echo html_entity_decode($data['description'][$i]); 
				  $i++;
				  ?>
                </div>
                <span class="bottom"></span> </li>
             
    <?php }  ?>
            </ul>
            
			  <div class="pn">
		<?php
		if($page>0)
	{
	
	echo '<a href="?page='.($page-1).'" class="prev"> </a>';
	}
	for($m=1;$m<=ceil($data['total']/RESULTS_PER_PAGE) ;$m++)
	{
		if($page==$m-1)
		{
			echo $m;
		}
		else
		{
			echo '<a href="?page='.($m-1).'">'.$m.'</a>';
		}
	}
	if($page+1!=ceil($data['total']/RESULTS_PER_PAGE))
	{
		echo '<a href="?page='.($page+1).'" class="next">';
	}
	}
	?>
			
			
          </div>
        </div>
      </div>
    </form>
    <!-- #content -->
  </div>
  <div class="pkgpage-shadow"></div>
  <div class="clr" > </div>
  <!-- #primary -->
</div>
<!-- #main -->
</div>
<!-- site-image -->
<?php include('includes/footer.php'); ?>
</body>
</html>
