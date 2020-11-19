<?php

	include_once("../../_init.php");
	include_once($GP -> INC_ADM_PATH."/head.php");	
	
	include_once($GP -> CLS."/class.disabled.php");
    $C_disabled 	= new disabled;
    
    
	$args = "";
	$args['d_idx'] 	= $_GET['d_idx'];
	$rst = $C_disabled ->disabled_Info($args);
	
	if($rst) {
		extract($rst);	
    }
   
	
?>
<body>
<div class="Wrap_layer"><!--// 전체를 감싸는 Wrap -->
	<div class="boxContent_layer">
		<div class="boxContentHeader">
			<span class="boxTopNav"><strong>장애인 현황 수정</strong></span>
		</div>
		<form name="base_form" id="base_form" method="POST" action="?" enctype="multipart/form-data">
		<input type="hidden" name="mode" id="mode" value="disabled_MODI" />
		<input type="hidden" name="d_idx" id="d_idx" value="<?=$_GET['d_idx']?>" />		
		<div class="boxContentBody">			
			<div class="boxMemberInfoTable_layer">				
				<div class="layerTable">
					<table class="table table-bordered">
						<tbody>		                       												          							
							<tr>
								<th><span>*</span>년도</th>
								<td>
									<input type="text" class="input_text" size="20" name="d_year" id="d_year" value="<?=$d_year?>" />
								</td>
                                <th><span>*</span>구</th>
								<td>
									<input type="text" class="input_text" size="20" name="d_district" id="d_district" value="<?=$d_district?>" />
								</td>
                                <th><span>*</span>나이</th>
								<td>
									<input type="text" class="input_text" size="20" name="d_age" id="d_age" value="<?=$d_age?>" />
								</td>
							</tr>				
                            <tr>
								<th><span>*</span>지체</th>
								<td>
									<input type="text" class="input_text" size="20" name="d_content1" id="d_content1" value="<?=$d_content1?>" />
								</td>
                                <th><span>*</span>시각</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="d_content2" id="d_content2" value="<?=$d_content2?>" />       
								</td>
                                <th><span>*</span>청각</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="d_content3" id="d_content3" value="<?=$d_content3?>" />
								</td>
							</tr>	
                            <tr>
								<th><span>*</span>언어</th>
								<td>
									<input type="text" class="input_text" size="20" name="d_content4" id="d_content4" value="<?=$d_content4?>" />
								</td>
                                <th><span>*</span>지적</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="d_content5" id="d_content5" value="<?=$d_content5?>" />       
								</td>
                                <th><span>*</span>뇌병변</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="d_content6" id="d_content6" value="<?=$d_content6?>" />
								</td>
							</tr>		
                            <tr>
								<th><span>*</span>자폐성</th>
								<td>
									<input type="text" class="input_text" size="20" name="d_content7" id="d_content7" value="<?=$d_content7?>" />
								</td>
                                <th><span>*</span>정신</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="d_content8" id="d_content8" value="<?=$d_content8?>" />       
								</td>
                                <th><span>*</span>신장</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="d_content9" id="d_content9" value="<?=$d_content9?>" />
								</td>
							</tr>		
                            <tr>
								<th><span>*</span>심장</th>
								<td>
									<input type="text" class="input_text" size="20" name="d_content10" id="d_content10" value="<?=$d_content10?>" />
								</td>
                                <th><span>*</span>호흡기</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="d_content11" id="d_content11" value="<?=$d_content11?>" />       
								</td>
                                <th><span>*</span>간</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="d_content12" id="d_content12" value="<?=$d_content12?>" />
								</td>
							</tr>		
                            <tr>
								<th><span>*</span>안면</th>
								<td>
									<input type="text" class="input_text" size="20" name="d_content13" id="d_content13" value="<?=$d_content13?>" />
								</td>
                                <th><span>*</span>장루.요루</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="d_content14" id="d_content14" value="<?=$d_content14?>" />       
								</td>
                                <th><span>*</span>뇌전증</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="d_content15" id="d_content15" value="<?=$d_content15?>" />
								</td>
							</tr>																							
						</tbody>
					</table>
				</div>				
				<div class="btnWrap">
					<span class="btnRight">
						<button id="img_submit" class="btnSearch ">수정</button>
						<button id="img_cancel" class="btnSearch ">취소</button>
					</span>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>
</body>
</html>
<script type="text/javascript">


	function img_del(image, idx, type)
	{
		if(!confirm("삭제하시겠습니까?")) return;

		$.ajax({
			type: "POST",
			url: "./proc/disabled_proc.php",
			data: "mode=disabled_IMGDEL&d_idx=" + idx + "&file=" + image + "&type=" + type,
			dataType: "text",
			success: function(msg) {

				if($.trim(msg) == "true") {
					alert("삭제되었습니다");
					window.location.reload();
					return false;
				}else{
					alert('삭제에 실패하였습니다.');
					return;
				}
			},
			error: function(xhr, status, error) { alert(error); }
		});
	}

	$(document).ready(function(){	
		$('#img_cancel').click(function(){
				parent.modalclose();				
		});	
		
				
		$('#img_submit').click(function(){			
			
			$('#base_form').attr('action','./proc/disabled_proc.php');
			$('#base_form').submit();
			return false;
		});					
	
	});
</script>