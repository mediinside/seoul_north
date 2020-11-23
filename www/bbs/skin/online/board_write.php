<script type="text/javascript" src="<?=$GP -> JS_SMART_PATH?>/HuskyEZCreator.js" charset="utf-8"></script>
<script type="text/javascript" src="<?=$GP -> INC_JS_PATH?>/jquery.base64.js"></script>
<form name="frm_Board" id="frm_Board" action="<?=$get_par;?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="jb_bruse_check" value="Y" checked>
<input type="hidden" name="img_full_name" id="img_full_name" />
<input type="hidden" name="upfolder" id="upfolder" value="jb_<?=$jb_code?>" />
<input type="hidden" name="jb_title" id="jb_title" value="온라인 신청" />
<div class="cont-tit">
	<h3>온라인 신청</h3>
    <p style="margin-top:30px;line-height: 1.4;">
        - 상담이 필요하신 분들은 온라인 상담 신청, 전화 상담 신청, 실시간 상담신청(카카오톡) 등 편하신 방법으로 연락주세요.<br>
        - 상담신청 후 신청된 정보는 담당자에게 전달되며, 지역장애인보건의료센터에서 연락 드립니다.
    </p>
</div>
<div class="s-inner">
    <form name="frm_Board" id="frm_Board" action="" method="post" enctype="multipart/form-data">
    <div class="tabMenu">
        <p class="mo-show"><a href="#none"></a></p>
        <ul>
            <li class="active"><a href="/notice/notice.php?jb_code=70">온라인 신청</a></li>
            <li><a href="/consulting/page01-2.html">실시간 상담</a></li>
            <li><a href="/consulting/page01-3.html">전화상담</a></li>
        </ul>
    </div>
    <!-- //end tab -->

        <h4 class="cont-sub-tit xl-m">
					온라인 상담
				</h4>
				<div class="agree_box">
					<div class="row">
						<h5>개인정보의 수집·이용목적</h5>
					</div>
					<div class="row">
						<h5>1. 신청 접수</h5>
						<p>- 신청서 접수를 통한 서비스 제공에 관련한 목적으로 개인정보를 처리(수집·이용)합니다.</p>
					</div>
					<div class="row">
						<h5>2. 수집·이용하려는 개인정보의 항목</h5>
						<p>- 필수항목 : 이름, 비밀번호, 연락처, 연령대, 장애유형, 상담목적</p>
						<p>- 선택항목 : 이메일, 상담내용</p>
					</div>
					<div class="row">
						<h5>3. 개인정보의 보유 및 이용기간</h5>
						<p>- 개인정보파일며 : 상담 신청자 정보</p>
						<p>- 보유 및 이용 기간 : 5년</p>
					</div>
					<div class="row" style="margin-bottom: 0;">
						<h5>4. 개인정보 수집 및 이용에 대한 동의를 거부할 수 있으며, 거부시 상담 신청에 제한이 있을 수 있습니다.</h5>
					</div>
				</div>
				<div class="input_box" style="margin-bottom:30px;text-align: right;font-size: 2rem;">
					<label><input type="checkbox" name="agree">위의 개인정보 수집 및 이용에 동의합니다.</label>
				</div>

				<div class="tableType-01 green no-border">
					<table class="writeType">
						<colgroup>
							<col style="width:180px">
							<col>
						</colgroup>
						<tbody>
                            <?php
                                //회원일 경우 비밀번호를 입력할 필요가 없다.
                                if(empty($check_id)) {
                                ?>
                                <tr>
                                <th scope="row">비밀번호</th>
                                <td><input type="text" class="i-input" title="비밀번호 입력" placeholder="비밀번호를 입력해 주세요." id="jb_password" name="jb_password" /></td>
                                </tr>
                                <?php
                                } else {
                                $password_key=md5($check_id);	
                                $tm=explode(" ",microtime());
                                $jb_password=$password_key . $tm[1];
                                echo ("<input type=\"hidden\" name=\"jb_password\" value=\"${jb_password}\">");
                                }
                            ?>
							<tr>
								<th>성명</th>
								<td>
									<input type="text" class="txtInput" style="width: 100%;" id="jb_name" name="jb_name">
								</td>
							</tr>
							<tr>
								<th>휴대전화번호</th>
								<td>
									<input type="text" class="txtInput" style="width: 100%;"id="jb_etc1" name="jb_etc1">
								</td>
							</tr>
							<tr>
								<th>구분</th>
								<td>
									<div class="input_box">
										<label><input type="radio" id="jb_etc2" name="jb_etc2" value="소아청소년">소아청소년</label>
										<label><input type="radio" id="jb_etc2" name="jb_etc2" value="성인">성인</label>
									</div>
								</td>
							</tr>
							<tr>
								<th>거주지역</th>
								<td>
									<div class="input_box">
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="마포구">마포구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="서대문구">서대문구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="은평구">은평구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="성북구">성북구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="용산구">용산구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="종로구">종로구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="중구">중구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="성동구">성동구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="동대문구">동대문구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="중랑구">중랑구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="광진구">광진구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="강북구">강북구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="노원구">노원구</label>
										<label><input type="radio" id="jb_etc3" name="jb_etc3" name="place" value="도봉구">도봉구</label>
									</div>
								</td>
							</tr>
							<tr>
								<th>장애유형<br>(복수선택 가능)</th>
								<td>
									<div class="input_box">
                                        <label><input type="checkbox" name="jb_etc4[]" value="지체장애">지체장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="뇌병변장애">뇌병변장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="시각장애">시각장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="청각장애">청각장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="언어장애">언어장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="안면장애">안면장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="신장장애">신장장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="심장장애">심장장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="간장애">간장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="호흡기장애">호흡기장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="장루·요루장애">장루·요루장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="뇌전증장애">뇌전증장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="지적장애">지적장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="자폐성장애">자폐성장애</label>
										<label><input type="checkbox" name="jb_etc4[]" value="정신장애">정신장애</label>
									</div>
								</td>
							</tr>
							<tr>
								<th>신청내용<br>(복수선택 가능)</th>
								<td>
                                    <div class="input_box list">
										<p>보건·의료</p>
										<label><input type="checkbox" name="jb_etc5[]" value="장애인건강주치의">장애인건강주치의</label>
										<label><input type="checkbox" name="jb_etc5[]" value="장애인 건강검진">장애인 건강검진</label>
										<label><input type="checkbox" name="jb_etc5[]" value="구강검진·치료">구강검진·치료</label>
										<label><input type="checkbox" name="jb_etc5[]" value="재활의료서비스">재활의료서비스</label>
										<label><input type="checkbox" name="jb_etc5[]" value="일반의료서비스">일반의료서비스</label>
										<label><input type="checkbox" name="jb_etc5[]" value="보조기기">보조기기</label>
										<label><input type="checkbox" name="jb_etc5[]" value="기타">기타</label>
									</div>
									<div class="input_box list">
										<p>복지</p>
										<label><input type="checkbox" name="jb_etc5[]" value="의료기관 이용지원(이동·동행서비스, 수어통역 등)">의료기관 이용지원(이동·동행서비스, 수어통역 등)</label>
										<label><input type="checkbox" name="jb_etc5[]" value="장애인 건강검진">자조모임 지원</label>
										<label><input type="checkbox" name="jb_etc5[]" value="구강검진·치료">심리상담 서비스</label>
										<label><input type="checkbox" name="jb_etc5[]" value="기타(돌봄, 주거지원, 가족지원, 스포츠 및 여가 등)">기타(돌봄, 주거지원, 가족지원, 스포츠 및 여가 등)</label>
									</div>
									<div class="input_box list">
										<p>임신·출산</p>
										<label><input type="checkbox" name="jb_etc5[]" value="찾아가는 산모교육">찾아가는 산모교육</label>
										<label><input type="checkbox" name="jb_etc5[]" value="임신·출산 관련 보건·의료·복지서비스">임신·출산 관련 보건·의료·복지서비스</label>
										<label><input type="checkbox" name="jb_etc5[]" value="산전·산후 심리상담서비스 ">산전·산후 심리상담서비스</label>
										<label><input type="checkbox" name="jb_etc5[]" value="기타">기타</label>
									</div>
								</td>
							</tr>
							<tr>
								<th>상담내용</th>
								<td>
                                <textarea name="jb_content" id="jb_content" style="display:none" rows="20"></textarea>
                                        <textarea name="ir1" id="ir1" cols="30" rows="10" style="width:100%; height:300px; min-width:280px; display:none;"></textarea>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- //end tableType-01 -->
				<div id="btn-box" class="center">
					<a href="#" class="btn bg-deepblue" id="img_submit">상담신청</a>
				</div>
			</div>
			<!-- //end .s-inner -->
		</section>
		<!-- //end #container -->
<script type="text/javascript">
	var oEditors = [];
	nhn.husky.EZCreator.createInIFrame({
		oAppRef: oEditors,
		elPlaceHolder: "ir1",
		sSkinURI: "/bbs/smarteditor/SmartEditor2Skin.html",
		htParams : {
			bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
			bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
			bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
			//aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
			fOnBeforeUnload : function(){
				//alert("완료!");
			}
		}, //boolean
		fOnAppLoad : function(){
			//예제 코드
			//oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
		},
		fCreator: "createSEditor2"
	});

	$('#img_submit').click(function(){

        if($('input:checkbox[name="agree"]:checked').val() == undefined ) {
			alert("개인정보 취급 방침에 동의해 주세요.");
			return false;
		}

        if($('#jb_name').val() == '')	{
			alert('이름을 입력하세요');
			$('#jb_name').focus();
			return false;
		}   

        if($('#jb_etc1').val() == '')	{
			alert('전화번호를 입력하세요');
			$('#jb_etc1').focus();
			return false;
		}   
		
		/*if($('#jb_title').val() == '')	{
			alert('제목을 입력하세요');
			$('#jb_title').focus();
			return false;
		}*/		
        
		
		if($('#jb_name').val() == '')	{
			alert('이름을 입력하세요');
			$('#jb_name').focus();
			return false;
		}        
		/*
		if($('#jb_password').val() == '')	{
			alert('비밀번호를 입력하세요');
			$('#jb_password').focus();
			return false;
		}
		
		if($('#jb_email').val() == '' || !CheckEmail($('#jb_email').val()))	{
			alert('이메일을 정확히 입력하세요');
			$('#jb_email').focus();
			return false;
		}*/
	
		oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
	
		var con	= $('#ir1').val();
		
		
		$('#jb_content').val(con);	       


		if($('#jb_content').val() == '' || $('#jb_content').val() == '<br> ')
		{
			alert('내용을 입력하세요');
			return false;
		}	
        
		var t = $.base64Encode($('#ir1').val());		
		$('#jb_content').val(t);
		
			
		if($('#zsfCode').val() == '')	{
			alert('자동방지 입력키를 입력하세요');
			$('#zsfCode').focus();
			return false;
		}		


		$('#frm_Board').submit();
		return false;
		
	});
	

	function CheckEmail(str)
	{
		 var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
		 if (filter.test(str)) { return true; }
		 else { return false; }
	}

	function insertIMG(filename){
		var tname = document.getElementById('img_full_name').value;

		if(tname != "")
		{
			document.getElementById('img_full_name').value = tname + "," + filename;
		}
		else
		{
			document.getElementById('img_full_name').value = filename;
		}
	}
</script>
