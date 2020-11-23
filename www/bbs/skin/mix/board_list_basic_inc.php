<?php
//==============================================================================================
# 검색 조건 설정,
# 총게시물수,
# 페이징,
# 게시물의 나열번호 관련 프로그램은
# /board/action/default.inc.php 참조
//==============================================================================================
	$args = array();
	
	if($_GET['page_row'] != '') {
		$args['show_row'] = $_GET['page_row'];	
	}else{
		$args['show_row'] = $db_config_data['jba_list_scale'];	
	}
	
	$args['show_page'] = $db_config_data['jba_page_scale'];	 
	$args['jb_code']  = "10";	

	if($mypage_id != '') {
		$args['my_mb_id']  = $mypage_id;	
	}
	if($jb_code >= 200 ){
		if($_SESSION['suserlevel'] < 9){
			$args['jb_etc3'] = 'A';	
		}
	}
			
	$data = "";
	$data = $C_JHBoard -> Board_List(array_merge($_GET,$_POST,$args));
	
	$data_list_basic 			= $data['data'];
	$page_link 			= $data['page_info']['link'];
	$page_search 		= $data['page_info']['search'];
	$totalcount 		= $data['page_info']['total'];
	$totalpages 		= $data['page_info']['totalpages'];
	$nowPage 			= $data['page_info']['page'];	
	$num_idx			= $data['page_info']['start_num'];
	
	$totalcount_l 	= number_format($totalcount,0);
	$data_list_basic_cnt 	= count($data_list_basic);

$dummy = 1;
if($data_list_basic_cnt > 0) {
	for ($i=0; $i<$data_list_basic_cnt; $i++ ) {		
			$jb_reg_date 				= date("Y.m.d", strtotime($data_list_basic[$i]['jb_reg_date']));							//등록일
			$jb_mod_date 				= date("Y.m.d", strtotime($data_list_basic[$i]['jb_mod_date']));							//수정일		
			$jb_see 					= $C_Func->num_f($data_list_basic[$i]['jb_see']);									//조회수 (3자리 단위 ',' 처리)
			$jb_comment_count 			= $C_Func->num_f($data_list_basic[$i]['jb_comment_count']);  			//코멘트 수 (3자리 단위 ',' 처리)		
			$jb_name 					= $data_list_basic[$i]['jb_name'];
			
			
			//echo strlen($jb_name);
			if(strlen($jb_name) > 6) {
				$jb_name 				=  $C_Func->blindInfo($jb_name, 3);
			}else{
				$jb_name 				=  $C_Func->blindInfo($jb_name, 6);	
			}
			
			$jb_file_code				= $data_list_basic[$i]['jb_file_code'];
			$jb_mb_id					= $data_list_basic[$i]['jb_mb_id'];
			$jb_type					= $data_list_basic[$i]['jb_type'];
			$jb_show					= $data_list_basic[$i]['jb_show'];	
			$jb_etc1					= $data_list_basic[$i]['jb_etc1'];		
			$jb_mb_level				= $data_list_basic[$i]['jb_mb_level'];
			$jb_secret_check			= $data_list_basic[$i]['jb_secret_check'];
			$jb_email					= $data_list_basic[$i]['jb_email'];
			$jb_group					= $data_list_basic[$i]['jb_group'];
			$jb_code					= "10" ;
			$jb_homepage				= $data_list_basic[$i]['jb_homepage'];		
			$jb_order					= $data_list_basic[$i]['jb_order'];
			$jb_idx						= $data_list_basic[$i]['jb_idx'];
			$jb_step					= $data_list_basic[$i]['jb_step'];
			$jb_title 					= $C_Func->strcut_utf8($data_list_basic[$i]['jb_title'], 100, true, "...");	//제목 (길이, HTML TAG제한여부 처리)
			$jb_content					= $C_Func->dec_contents_view($data_list_basic[$i]['jb_content']);
			$jb_content					= trim(strip_tags($jb_content));
			$jb_content 				= $C_Func->strcut_utf8($jb_content, 100, true, "...");	//제목 (길이, HTML TAG제한여부 처리)
			
			if($jb_email != "") { $jb_email = $C_Func->auto_link($jb_email); } 						//이메일 (이메일 자동 링크 처리, 폼메일 또는 아웃룩)
			if($jb_homepage != "") { $jb_homepage = $C_Func->auto_link($jb_homepage); }		//홈페이지 (URL 자동 링크 처리)
	
			//답글처리
			if($jb_step > 0)
				$depth_icon = $C_Func->reply_depth($jb_step, "");
			else
				$depth_icon = ""; //매 글마다 초기화를 해 주어야 한다.
				
			//타이틀이미지
			$new_image = '<span class="new"></span>';
			//$new_icon = $C_Func->new_icon(1, $data_list_basic[$i]['jb_reg_date'], $new_image);
			//파일 이미지
			$new_file = "<i class='fa fa-paperclip' aria-hidden='true'></i>";
		
			//비밀글이미지
			//$secret_icon = " <img src=\"" . $GP -> IMG_PATH . "/". $skin_dir . "/image/ticon_key.gif\" border='0' align='middle'> ";	
			
			
			
			//비밀글 일 경우 읽기권한 처리 루틴 - 관리자가 아닐 경우만 체크
			//echo $check_level."<".$db_config_data['jba_reply_level']."&&".$data_list_basic[$i]['jb_secret_check'];
			if($check_level < $db_config_data['jba_reply_level']  && $data_list_basic[$i]['jb_secret_check'] == "Y")
			{
				
				//비회원이 작성한 비밀글일 경우
				if($jb_mb_id == "") {
					//비밀번호 입력페이지로 이동
					$get_par = "${index_page}?jb_code=${jb_code}&jb_mode=tdetail&jb_idx=${jb_idx}";
					$get_par.= "&search_key=" . $_GET['search_key'] . "&search_keyword=${search_keyword}&page=${page}&dep1=${dep1}&dep2=${dep2}";
					$get_par.= "&jb_mode=tsecret";				
				} else { //회원이 작성한 비밀글일 경우
				
					//작성자 아이디와 로그인 아이디 비교
					if($check_id != $jb_mb_id) {
						
						//비밀글의 경우 회원도 자신이 쓴 글에대한 답변만 볼 수 있다.
						$args = "";
						$args['jb_code'] = $jb_code;
						$args['jb_group'] = $jb_group;
						$rst = $C_JHBoard -> MEM_SECRET_CHECK($args);		
				
						if (trim($check_id) == "") {
							$get_par = "${index_page}?jb_code=${jb_code}&jb_mode=tdetail&jb_idx=${jb_idx}";
							$get_par.="&search_key=" . $_GET['search_key'] . "&search_keyword=${search_keyword}&page=${page}";
							$get_par.= "&jb_mode=tsecret";
						}else if (trim($check_id) == trim($rst['jb_mb_id'])) {
							$get_par = "${index_page}?jb_code=${jb_code}&jb_mode=tdetail&jb_idx=${jb_idx}";
							$get_par.="&search_key=" . $_GET['search_key'] . "&search_keyword=${search_keyword}&page=${page}&dep1=${dep1}&dep2=${dep2}";
						} else {						
							$get_par ="javascript:alert('작성회원만 읽을 수 있습니다.');";
						}					
					} else {
						$get_par = "${index_page}?jb_code=${jb_code}&jb_mode=tdetail&jb_idx=${jb_idx}";
						$get_par.="&search_key=" . $_GET['search_key'] . "&search_keyword=${search_keyword}&page=${page}&dep1=${dep1}&dep2=${dep2}";
					}				
				}						
			}
			else{		
				$get_par = "${index_page}?jb_code=${jb_code}&jb_mode=tdetail&jb_idx=${jb_idx}";
				$get_par.="&search_key=" . $_GET['search_key'] . "&search_keyword=${search_keyword}&page=${page}&dep1=${dep1}&dep2=${dep2}";
			}
			
			//상세보기 링크생성
			//$jb_title = "<a href=\"".$get_par."\">" . $jb_title . "</a>";
			
			//비밀글 이미지
			if($jb_secret_check == "Y") {
				$jb_title = $jb_title . $secret_icon;		//비밀글이미지...
			}
			
			if($jb_file_code != ''){				
                $jb_title = $jb_title . $new_file;
            }
		
			
			$jb_title = $depth_icon . $jb_title . $comment_count . $new_icon; //이미지타이틀 처리

            //공지글여부	                
			if($jb_order < 100) {
                $jb_no ="<img class='notice-icon' src='/resource/images/notice_icon.png' alt='공지'>";
                $jb_tr ="class='notice'";               
			}else{
                $jb_no ="" . $num_idx--. "";
                $jb_tr ="";               
				}
			
			if($jb_show =="A"){
			$jb_no ="<td align='center' class='no'>숨김</td>";
			}
			
		/*	
		*/	
						
				echo ("
                        <tr ${jb_tr}>
                            <td>${jb_no}</td>
                            <td class='subject'>
                                <a href='" . $get_par . "'>${jb_title}</a>
                            </td>
                            <td class='admin'>${jb_name}</td>
                            <td class='date'>${jb_reg_date}</td>
                        </tr>
				");
				
			$dummy++;
	}
}else{
	echo ("	
			<tr>
				<td colspan='4'>
					등록된 데이터가 없습니다.
				</td>
			</tr>		
		");
}
?>



