<?php
	include_once("../../_init.php");
	include_once($GP -> INC_ADM_PATH."/head.php");	
	$disabled_select = $C_Func -> makeSelect_Normal('d_type', $GP -> disabled_TYPE2, $d_type, '', '::선택::');	
?>
<body>
<div class="Wrap_layer"><!--// 전체를 감싸는 Wrap -->
	<div class="boxContent_layer">
		<div class="boxContentHeader">
			<span class="boxTopNav"><strong>후원신청 등록</strong></span>
		</div>
		<form name="base_form" id="base_form" method="POST" action="?" enctype="multipart/form-data">
		<input type="hidden" name="mode" id="mode" value="disabled_REG" />
		<div class="boxContentBody">			
			<div class="boxMemberInfoTable_layer">				
				<div class="layerTable">
					<table class="table table-bordered">
						<tbody>		
                             <tr>
								<th><span>*</span>분류</th>
								<td>
									<?=$disabled_select?>
								</td>
							</tr> 												          							
							<tr>
								<th><span>*</span>제목</th>
								<td>
									<input type="text" class="input_text" size="70" name="d_title" id="d_title" />
								</td>
							</tr>
							<!-- <tr>
								<th><span>*</span>설명</th>
								<td>
									<input type="text" class="input_text" size="70" name="d_descrition" id="d_descrition"/>
								</td>
							</tr> -->
							<tr>
								<th><span>*</span>링크</th>
								<td>
                                    <input type="text" class="input_text" size="70" name="d_link" id="d_link" />
                                    ex) https://www.youtube.com/embed/fa-URCbJm4A 
                                     <!--<p class="colorIdt"></p>-->
								</td>
							</tr>
							<!-- tr>
								<th><span>*</span>내용</th>
								<td>
									<textarea name="d_content" id="d_content" style="width:98%; height:100px;  overflow:auto;" ></textarea>
								</td>
							</tr -->
							<tr>
								<th><span>*</span>노출여부</th>
								<td>
									<label>
										<input type="radio" name="d_show" id="d_show" value="Y" checked/> 노출
									</label>
									<label>
										<input type="radio" name="d_show" id="d_show" value="N"  /> 비노출
									</label>
								</td>
							</tr>
                            <tr>
								<th><span>*</span>이미지</th>
								<td>
									<input type="file" name="d_img" id="d_img" size="30" class="input_text">(578 X 163)
								</td>
							</tr>
							<!-- <tr>
								<th><span>*</span>새창여부</th>
								<td>
									<label>
										<input type="checkbox" name="d_type" id="d_type" value="Y"/> 새창
									</label>
								</td>
							</tr> >
							
							<tr id="mobile_img">
								<th><span>*</span>오른쪽 배너</th>
								<td>
									<input type="file" name="d_img2" id="d_img2" size="30" class="input_text"><span id="size_m"></span>
								</td-->
							</tr>
						</tbody>
					</table>
				</div>				
				<div class="btnWrap">
					<span class="btnRight">
						<button id="img_submit" class="btnSearch ">등록</button>
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

	$(document).ready(function(){	
														 
		$('#img_cancel').click(function(){
				parent.modalclose();				
		});	
		
		$('#d_type').change(function(){
			size_guide();
		});

		function size_guide(){
			var type = $("#d_type option:selected").val();
			if (type == 'main') {
				$('#size_pc').text('(1398*600)');
				$('#size_m').text('(720*420)');
				$('#mobile_img').show();
			}else if (type == 'left') {
				$('#size_pc').text('(200*360)');
				$('#size_m').text('(720*180)');
				$('#mobile_img').show();
			}else{
				$('#size_pc').text('(360*200)');
				$('#mobile_img').hide();
			}
		}
		
		$('#img_submit').click(function(){			
			
			/*
			if($('#d_descrition').val() == '') {
				alert('소제목을 입력하세요');
				$('#d_descrition').focus();
				return false;
			}		
			
			if($('#d_title').val() == '') {
				alert('제목을 입력하세요');
				$('#d_title').focus();
				return false;
			}	
			
			if($('#d_content').val() == '') {
				alert('내용을 입력하세요');
				$('#d_content').focus();
				return false;
			}
			
			
			if($('#d_img').val() == '') {
				alert('이미지를 선택하세요');
				$('#d_img').focus();
				return false;
			}*/
			
			
			$('#base_form').attr('action','./proc/disabled_proc.php');
			$('#base_form').submit();
			return false;
		});					
	
	});
</script>