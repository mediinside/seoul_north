<?php	
	include_once("../../_init.php");
	include_once($GP -> INC_ADM_PATH."/head.php");
	$title = "이미지 업로드";
	

	if (is_array($_GET)) foreach ($_GET as $k => $v) ${$k} = $v;
	if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
?>
<!-- 팝업사이즈 365*270 -->
<div class="pop1">
	<h1 class="pop1_t">파일 업로드</h1>
	
	<!-- pop1_cont_layout -->
	<section class="pop1_cont_layout">
		<form id="frm_image" name="frm_image" action="?" method="post" enctype="multipart/form-data">
        <input type="hidden" name="mode" id="mode" value="<?=$type?>" />
			<fieldset>			
				
				<h2 class="pop1_t2">					
					<input type="file" class="inputTxt"  name="up_file" id="up_file"  /> 
					<input type="submit" id="img_submit" value="올리기"class="btnExcel">
				</h2>			
            
            </fieldset>         
		</form>
	</section>
	<!-- //pop1_cont_layout -->
</div>
<script type="text/javascript">
	
	$(document).ready(function(){
	
		//엔터키 막기
		$("*").keypress(function(e){
			if(e.keyCode==13) 
			{
				$('#serach_submit').click();
				return false;
			}
			else
			{
				return true;	
			}
		});	
		
		
		$('#img_submit').click(function(){
										
			if($('#up_file').val() == '') {
				alert("첨부파일을 선택하세요");
				return false;
			}
			
			$('#frm_image').attr('action','./proc/excel_proc.php');
			$('#frm_image').submit();
			return false;
			
		});
	
	});
</script>
</body>
</html>
