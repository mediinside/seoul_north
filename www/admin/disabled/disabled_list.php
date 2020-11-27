<?php
	include_once("../../_init.php");
	include_once($GP -> INC_ADM_PATH."/head.php");
	
	include_once($GP->CLS."class.list.php");
	include_once($GP->CLS."class.disabled.php");
	include_once($GP->CLS."class.button.php");
	$C_ListClass 	= new ListClass;
	$C_disabled 	= new disabled;
	$C_Button 		= new Button;
	
	$args = array();
	$args['show_row'] = 10;
	$args['pagetype'] = "admin";
	$data = "";
	$data = $C_disabled->disabled_List(array_merge($_GET,$_POST,$args));
	
	$data_list 		= $data['data'];
	$page_link 		= $data['page_info']['link'];
	$page_search 	= $data['page_info']['search'];
	$totalcount 	= $data['page_info']['total'];
	
	$totalpages 	= $data['page_info']['totalpages'];
	$nowPage 		= $data['page_info']['page'];
	$totalcount_l 	= number_format($totalcount,0);
	
	$data_list_cnt 	= count($data_list);


	$cate1_select = $C_Func -> makeSelect_Normal('tt_cate', $GP -> CATE1, $tt_cate, '', '::선택::');

	$arr_year = $C_disabled ->disabled_YEAR();
?>
<body>
<div class="Wrap"><!--// 전체를 감싸는 Wrap -->
		<? include_once($GP -> INC_ADM_PATH."/header.php"); ?>
		<div class="boxContentBody" >
			<div class="boxSearch">
			<!--? include_once($GP -> INC_ADM_PATH."/inc.mem_search.php"); ?-->										
			
			<ul>
				<form name="base_form" id="base_form" method="GET">				
				<li>
					<strong class="tit">등록일</strong>
					<span><input type="text" name="s_date" id="s_date" value="<?=$_GET['s_date']?>" class="input_text" size="13"></span>
					<span>~</span>
					<span><input type="text" name="e_date" id="e_date" value="<?=$_GET['e_date']?>" class="input_text" size="13" /></span>
				</li>	          		
				<li>
					<strong class="tit">검색조건</strong>
					<span>
					<select name="search_key" id="search_key">
						<option value="">:: 선택 ::</option>
						<option value="tt_tag_name" <? if($_GET['search_key'] == "tt_tag_name"){ echo "selected";}?> >태그명</option>
					</select>
					</span>
					<span><input type="text" name="search_content" id="search_content" value="<?=$_GET['search_content']?>" class="input_text" size="17" /></span>
					<span><button id="search_submit" class="btnSearch ">검색</button></span>
				</li>
				</form>
				<li>
					<strong class="tit">전체삭제</strong>
					<span>
						<select name="year_key" id="year_key">
							<option value="">:: 년도 ::</option>
							<?
								for($i=0; $i<count($arr_year); $i++) {
									if($arr_year[$i]['d_year'] == $d_year) {
										echo "<option value='" . $arr_year[$i]['d_year']. "' selected>" . $arr_year[$i]['d_year'] . "</option>";
									}else{
										echo "<option value='" . $arr_year[$i]['d_year']. "'>" . $arr_year[$i]['d_year'] . "</option>";
									}
								}
							?>
						</select>
					</span>					
					<span><button class="btnSearch" id="year_delete">전체삭제</button></span>
				</li>
                <li>
					<strong class="tit">엑셀 업로드</strong>  
					<span><button class="btnExcel" onClick="layerPop('ifm_reg','./excel_upload.php?type=disabled', '600', '200')";>엑셀 파일등록</button>
                    <a href="disabled.csv" target="_blank" style="font-weight: bold;">* 업로드 샘플 파일 다운로드</a></span>                   
                </li>				
			</ul>
			
			</div>
		</div>
		<!--div style="margin-top:5px; text-align:right;">
		<button onClick="layerPop('ifm_reg','./disabled_reg.php', '100%', 650)"; class="btnSearch ">장애인 현황 등록</button>
		</div-->
		<div id="BoardHead" class="boxBoardHead">				
				<div class="boxMemberBoard">
					<table>
						<colgroup>
							<col />
							<col />
							<col />
							<col />
							<col />
							<col />
							<col />
							<col style="width:101px;" />
						</colgroup>
						<thead>
							<tr>
								<th>No</th>
                                <th>년도</th>
								<th>구</th>								
								<th>나이</th>
								<th>지체</th>
								<th>청각</th>
								<th>시각</th>
								<th>뇌병변</th>
								<th>지적</th>
								<th>정신</th>								
								<th>신장</th>								
								<th>자폐성</th>
								<th>언어</th>
								<th>장루.요루</th>
								<th>호흡기</th>															
								<th>간</th>
								<th>뇌전증</th>	
								<th>심장</th>	
								<th>안면</th>																																			
								<th>수정/삭제</th>
							</tr>
						</thead>
						<tbody>
							<?
								$dummy = 1;
								if($data_list_cnt > 0 ) {
									for ($i = 0 ; $i < $data_list_cnt ; $i++) {
										$d_idx        	= $data_list[$i]['d_idx'];
										$d_year 		= $data_list[$i]['d_year'];
										$d_district     = $data_list[$i]['d_district'];
										$d_age	        = $data_list[$i]['d_age'];
										for($j = 1 ; $j < 16 ; $j++)
										{
											${"d_content".$j}     = $data_list[$i]['d_content'.$j];
											
										}									

										$d_regdate    = $data_list[$i]['d_regdate'];																			
										
	
										$edit_btn = $C_Button -> getButtonDesign('type2','수정',0,"layerPop('ifm_reg','./disabled_edit.php?d_idx=" . $d_idx. "', '100%', 650)", 50,'');	
										$edit_btn .= $C_Button -> getButtonDesign('type2','삭제',0,"disabled_delete('" . $d_idx. "')", 50,'');
								?>
									<tr>
										<td><?=$data['page_info']['start_num']--?></td>										
										<td><?=$d_year?></td>	
                                        <td><?=$d_district?></td>									
										<td><?=$d_age?></td>
										<? for($j = 1 ; $j < 16 ; $j++) { ?>
										<td><?=${"d_content".$j}?></td>
										<?}?>																																																									
										<td><?=$edit_btn?></td>
									</tr>
									<?
										$dummy++;
									}
								}else{
									echo "<tr><td colspan='21' align='center'>데이터가 없습니다.</td></tr>";
								}
							?>							
						</tbody>
					</table>
				</div>			
			</div>
			<ul class="boxBoardPaging">
				<?=$page_link?>
			</ul>
		</div>
		<? include_once($GP -> INC_ADM_PATH."/footer.php"); ?>
	</div>
</div><!-- 전체를 감싸는 Wrap //-->
</body>
</html>
<script type="text/javascript">

	$(document).ready(function(){														 
	
		callDatePick('s_date');
		callDatePick('e_date');

		$('#search_submit').click(function(){																			 

			if($.trim($('#search_content').val()) != '')
			{
				if($('#search_key option:selected').val() == '')
				{
					alert('검색조건을 선택하세요');
					return false;
				}
			}

			if($('#search_key option:selected').val() != '')
			{
				if($.trim($('#search_content').val()) == '')
				{
					alert('검색내용을 입력하세요');
					$('#search_content').focus();
					return false;
				}
			}


			$('#base_form').submit();
			return false;
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
/*
		$('#year_delete').click(function(){	
			//d_year = $('#search_key option:selected').val() ;
			alert("aa");
			if(!confirm("삭제하시겠습니까?")) return;

			$.ajax({
				type: "POST",
				url: "./proc/disabled_proc.php",
				data: "mode=disabled_year_DEL&d_year=" + d_year,
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

		}*/

		$('#year_delete').click(function(){
			d_year = $('#year_key option:selected').val() ;

			if(!confirm("전체삭제하시겠습니까?")) return;

			$.ajax({
				type: "POST",
				url: "./proc/disabled_proc.php",
				data: "mode=disabled_year_DEL&d_year=" + d_year,
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

											
		
			
		});

	});

	function disabled_delete(d_idx)
	{
		if(!confirm("삭제하시겠습니까?")) return;

		$.ajax({
			type: "POST",
			url: "./proc/disabled_proc.php",
			data: "mode=disabled_DEL&d_idx=" + d_idx,
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


</script>