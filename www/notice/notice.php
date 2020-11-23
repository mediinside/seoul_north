<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/_init.php';
include_once $GP -> INC_WWW . '/count_inc.php';

$title = "뉴고려커뮤니티";
$page_title = "소통/공감";

include_once "../inc/head.php";

$index_page = "notice.php";
$query_page = "query.php";

$jb_code = $_GET["jb_code"];
if($jb_code == "10" or $jb_code == "20"){	
	$index = "4";
	$index2 = "1";
}
elseif($jb_code == "30"){
	$index = "4";
	$index2 = "2";	
}
elseif($jb_code == "40" or $jb_code == "50" or $jb_code == "60"){
	$index = "4";
	$index2 = "3";	
}
elseif($jb_code == "70"){
	$index = "5";
	$index2 = "1";	
	$jb_mode = "twrite";
}
elseif($jb_code == "80"){
	$index = "5";
	$index2 = "2";	
}
?>

<body>
	<div id="wrap">
		<?php include_once "../inc/header.php"?>
		<section id="container" class="sub">
			<div id="sub-bnnr">
				<h2 class="text">소식·자료</h2>
				<img data-index="<?=$index?>" data-index2="<?=$index2?>" src="/resource/images/sub-bnnr04.png" alt="">
			</div>
			<!-- //end .sub-bnnr -->

			<?php include_once "../inc/location.php"?>			
            <?php include $GP -> INC_PATH ."/board_inc.php"; ?>           

		<?php include_once "../inc/footer.php"?>
	</div>
	<!-- //end #wrap -->
</body>

</html>