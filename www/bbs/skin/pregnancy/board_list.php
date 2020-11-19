<div id="sub-bnnr">
			<img src="/resource/images/notice-bnnr02.png" alt="" class="mb-hide">
			<img src="/resource/images/notice-bnnr02-m.png" alt="" class="mb-show">
			<h2>
				<small>커뮤니티</small>
				<span>임신을 축하합니다</span>
			</h2>
		</div>
		<div id="container-box" class="sub">
			<section class="container">
				<?php include_once "../inc/location.php"; ?>

				<div id="celebration">
					<h4 class="sub-title-s">
						라팡에서 산모님들의 <br class="mb-show"><span>임신을 진심으로 축하드립니다.</span><br>
						건강하게 순산하시길 기원합니다.
						<img src="/resource/images/title-line.png" alt="">
					</h4>
					<ul>
							<?php include $GP -> INC_PATH . "/${skin_dir}/board_list_inc.php";	?>
                            </ul>

                    <div id="btn-box">
                        <a href="#none" class="btn">더보기</a>
                    </div>
                    </div>
                    <!-- //end #celebration -->
                    </section>
                    </div>
					<script type="text/javascript">
					$(document).ready(function(){
						$('#search_submit').click(function(){
							$('#search_form').submit();
							return false;
						});

						$('#page_row').change(function(){
							var val = $(this).val();
							location.href="?dep1=<?=$_GET['dep1']?>&dep2=<?=$_GET['dep2']?>&search_key=<?=$_GET['search_key']?>&search_keyword=<?=$_GET['search_keyword']?>&page=<?=$_GET['page']?>&page_row=" + val;
						});

						$('#twrite_btn').click(function(){
							alert("로그인 후 이용가능 합니다.");
							location.href ='/member/login.html?reurl=/community/page03.html';
						});
					});
					</script>