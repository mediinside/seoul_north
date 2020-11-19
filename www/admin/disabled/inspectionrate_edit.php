<?php

	include_once("../../_init.php");
	include_once($GP -> INC_ADM_PATH."/head.php");	
	
	include_once($GP -> CLS."/class.inspectionrate.php");
    $C_inspectionrate 	= new inspectionrate;
    
    
	$args = "";
	$args['ir_idx'] 	= $_GET['ir_idx'];
	$rst = $C_inspectionrate ->inspectionrate_Info($args);
	
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
		<input type="hidden" name="mode" id="mode" value="inspectionrate_MODI" />
		<input type="hidden" name="ir_idx" id="ir_idx" value="<?=$_GET['ir_idx']?>" />		
		<div class="boxContentBody">			
			<div class="boxMemberInfoTable_layer">				
				<div class="layerTable">
					<table class="table table-bordered">
						<tbody>		                       												          							
							<tr>
								<th><span>*</span>년도</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_year" id="ir_year" value="<?=$ir_year?>" />
								</td>
                                <th><span>*</span>구</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_district" id="ir_district" value="<?=$ir_district?>" />
								</td>
                               
							</tr>				
                            <tr>
								<th><span>*</span>뇌전증</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_content1" id="ir_content1" value="<?=$ir_content1?>" />
								</td>
                                <th><span>*</span>안면</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content2" id="ir_content2" value="<?=$ir_content2?>" />       
								</td>
                                <th><span>*</span>지체</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content3" id="ir_content3" value="<?=$ir_content3?>" />
								</td>
							</tr>	
                            <tr>
								<th><span>*</span>시각</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_content4" id="ir_content4" value="<?=$ir_content4?>" />
								</td>
                                <th><span>*</span>청각</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content5" id="ir_content5" value="<?=$ir_content5?>" />       
								</td>
                                <th><span>*</span>지적</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content6" id="ir_content6" value="<?=$ir_content6?>" />
								</td>
							</tr>		
                            <tr>
								<th><span>*</span>간</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_content7" id="ir_content7" value="<?=$ir_content7?>" />
								</td>
                                <th><span>*</span>장루요루</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content8" id="ir_content8" value="<?=$ir_content8?>" />       
								</td>
                                <th><span>*</span>심장</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content9" id="ir_content9" value="<?=$ir_content9?>" />
								</td>
							</tr>		
                            <tr>
								<th><span>*</span>정신</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_content10" id="ir_content10" value="<?=$ir_content10?>" />
								</td>
                                <th><span>*</span>언어</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content11" id="ir_content11" value="<?=$ir_content11?>" />       
								</td>
                                <th><span>*</span>뇌병변</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content12" id="ir_content12" value="<?=$ir_content12?>" />
								</td>
							</tr>		
                            <tr>
								<th><span>*</span>신장</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_content13" id="ir_content13" value="<?=$ir_content13?>" />
								</td>
                                <th><span>*</span>호흡기</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content14" id="ir_content14" value="<?=$ir_content14?>" />       
								</td>
                                <th><span>*</span>자폐성</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content15" id="ir_content15" value="<?=$ir_content15?>" />
								</td>
							</tr>
                            <tr>
								<th><span>*</span>뇌전증수검률</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_content16" id="ir_content16" value="<?=$ir_content16?>" />
								</td>
                                <th><span>*</span>안면수검률</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content17" id="ir_content17" value="<?=$ir_content17?>" />       
								</td>
                                <th><span>*</span>지체수검률</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content18" id="ir_content18" value="<?=$ir_content18?>" />
								</td>
							</tr>	
                            <tr>
								<th><span>*</span>시각수검률</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_content19" id="ir_content19" value="<?=$ir_content19?>" />
								</td>
                                <th><span>*</span>청각수검률</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content20" id="ir_content20" value="<?=$ir_content20?>" />       
								</td>
                                <th><span>*</span>지적수검률</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content21" id="ir_content21" value="<?=$ir_content21?>" />
								</td>
							</tr>		
                            <tr>
								<th><span>*</span>간수검률</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_content22" id="ir_content22" value="<?=$ir_content22?>" />
								</td>
                                <th><span>*</span>장루요루수검률</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content23" id="ir_content23" value="<?=$ir_content23?>" />       
								</td>
                                <th><span>*</span>심장수검률</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content24" id="ir_content24" value="<?=$ir_content24?>" />
								</td>
							</tr>		
                            <tr>
								<th><span>*</span>정신수검률</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_content25" id="ir_content25" value="<?=$ir_content25?>" />
								</td>
                                <th><span>*</span>언어수검률</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content26" id="ir_content26" value="<?=$ir_content26?>" />       
								</td>
                                <th><span>*</span>뇌병변수검률</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content27" id="ir_content27" value="<?=$ir_content27?>" />
								</td>
							</tr>		
                            <tr>
								<th><span>*</span>신장수검률</th>
								<td>
									<input type="text" class="input_text" size="20" name="ir_content28" id="ir_content28" value="<?=$ir_content28?>" />
								</td>
                                <th><span>*</span>호흡기수검률</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content29" id="ir_content29" value="<?=$ir_content29?>" />       
								</td>
                                <th><span>*</span>자폐성수검률</th>
								<td>
                                    <input type="text" class="input_text" size="20" name="ir_content30" id="ir_content30" value="<?=$ir_content30?>" />
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
			url: "./proc/inspectionrate_proc.php",
			data: "mode=inspectionrate_IMGDEL&ir_idx=" + idx + "&file=" + image + "&type=" + type,
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
			
			$('#base_form').attr('action','./proc/inspectionrate_proc.php');
			$('#base_form').submit();
			return false;
		});					
	
	});
</script>