<?php
	include_once("../../_init.php");
    include_once($GP -> INC_ADM_PATH."/head.php");	
    
    $MULTI_select = $C_Func -> makeSelect_Normal('tm_select', $GP -> MULTI_TYPE, $tm_select, '', '::선택::');
?>
<body>
<div class="Wrap_layer"><!--// 전체를 감싸는 Wrap -->
	<div class="boxContent_layer">
		<div class="boxContentHeader">
			<span class="boxTopNav"><strong>센터 등록</strong></span>
		</div>
		<form name="base_form" id="base_form" method="POST" action="?" enctype="multipart/form-data">
		<input type="hidden" name="mode" id="mode" value="MULTI_REG" />
        <input type="hidden" name="tm_menu" id="tm_menu" value="center" />
		<div class="boxContentBody">			
			<div class="boxMemberInfoTable_layer">				
				<div class="layerTable">
					<table class="table table-bordered">
						<tbody>                         												          														                       
							<tr>
								<th><span>*</span>센터명</th>
								<td>
									<input type="text" class="input_text" size="100" name="tm_content1" id="tm_content1"/>
								</td>
                            </tr>	
                            <tr>
								<th><span>*</span>소속</th>
								<td>
									<input type="text" class="input_text" size="100" name="tm_content2" id="tm_content2"/>
								</td>
                            </tr>
                            <tr>
								<th><span>*</span>주소</th>
								<td>
									<input type="text" class="input_text" size="100" name="tm_content3" id="tm_content3"/>
                                    <!--label for="postFirst" class="srOnly">우편번호 앞자리</label>
											<input type="text" value="<?=$mb_post1?>" id="mb_post1" size="10" name="mb_post1" class="input_text" />
											<span class="txt">-</span>
											<label for="postEnd" class="srOnly">우편번호 뒷자리</label>
											<input type="text" value="<?=$mb_post2?>" id="mb_post2" size="10"  name="mb_post2" class="input_text" />
											<a href="javascript:;" class="btnPost" id="search_post">우편번호 찾기</a>
											<div class="add">
												
												<input type="text" id="mb_addr1" name="mb_addr1" size="100" class="input_text" value="<?=$mb_address1?>" readonly/>
											</div>
											<div class="inputBox add2">												
												<input type="text" id="mb_addr2" name="mb_addr2" size="100" class="input_text" value="<?=$mb_address2?>" placeholder="상세주소를 입력하십시오."/>
											</div-->
								</td>
                            </tr>
                            <tr>
								<th><span>*</span>번호</th>
								<td>
									<input type="text" class="input_text" size="100" name="tm_content4" id="tm_content4"/>
								</td>
                            </tr>     
                            <tr>
								<th><span>*</span>URL</th>
								<td>
									<input type="text" class="input_text" size="100" name="tm_content5" id="tm_content5"/>
								</td>
                            </tr>                                                                            
                            <tr>
								<th><span>*</span>노출여부</th>
								<td>
									<label>
										<input type="radio" name="tm_show" id="tm_show" value="Y" checked   /> 노출
									</label>
									<label>
										<input type="radio" name="tm_show" id="tm_show" value="N"  /> 비노출
									</label>
								</td>
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

        $('#search_post').click(function() {	
				window.open('address_pop.html?obj=mb_post1&obj1=mb_post2&obj2=mb_addr1&obj3=mb_addr2&obj4=mb_load_addr1&obj5=mb_load_addr2', 'ifm_addr', 'width=500,height=900,resizable=yes,scrollbars=no,status=no,toolbar=no' );
			});	
														 
		$('#img_cancel').click(function(){
				parent.modalclose();				
		});	
		
		$('#tm_type').change(function(){
			size_guide();
		});

		function size_guide(){
			var type = $("#tm_type option:selected").val();
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

			

			$('#base_form').attr('action','./proc/multi_proc.php');
			$('#base_form').submit();
			return false;
		});					
	
	});
</script>