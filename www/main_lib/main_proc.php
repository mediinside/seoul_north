<?
    include_once($GP -> CLS."class.jhboard.php");
    include_once($GP -> CLS."class.slide.php");
    $C_JHBoard = new JHBoard();
    $C_Slide = new Slide();


	// 공지사항/언론보도/채용정보
	function Main_Notice($jb_code, $limit) {
		global $GP, $C_JHBoard, $C_Func;

		$args = '';
		$args['jb_code'] = $jb_code;
		$args['limit']  = " limit 0,". $limit;
		//$args['main_show2'] = "B";  //게시/비게시
		$rst = $C_JHBoard->Board_Main_Data($args);
		$GP -> MEMBER_CONFIG_LEVEL[$mb_level];
		$args['mb_level'] = "5";

		$str = "";
		for($i=0; $i<count($rst); $i++) {
			$jb_idx					= $rst[$i]['jb_idx'];
            $jb_code				= $rst[$i]['jb_code'];
            $jb_order				= $rst[$i]['jb_order'];
			$jb_title 			= $C_Func->strcut_utf8($rst[$i]['jb_title'], 100, true);
            $jb_reg_date_day 		= date("d", strtotime($rst[$i]['jb_reg_date']));
            $jb_reg_date 		= date("Y.m", strtotime($rst[$i]['jb_reg_date']));
            $jb_etc2 		= date("Y.m.d", strtotime($rst[$i]['jb_etc2']));
            $jb_etc3				= $rst[$i]['jb_etc3'];
            $jb_file_code 		= $rst[$i]['jb_file_code'];
            
            $new_icon = $C_Func->new_icon(1, $rst[$i]['jb_reg_date'], '<span class="new"><img src="/resource/images/new.png" alt="new"></span>');

            $url = "/notice/notice.php?jb_mode=tdetail&jb_code=" . $jb_code . "&jb_idx=" . $jb_idx;          
            
            $img_src = '';
			if($jb_file_code != '') {
				$code_file = $GP->UP_IMG_SMARTEDITOR_URL. "/jb_${jb_code}/${jb_file_code}";
				$img_src = "<img src='" . $code_file. "' >";
			}else{
				$img_src = "<img src='/public/images/default.jpg' alt='이미지 없음'  >";
            }

              //공지글여부
			if($jb_order < 100) {
                $jb_notice = "<span class='label'>공지사항</span>" ;
            }
            else{
                $jb_notice = "";
            }
            
            if($jb_code== "10"){
                $str .= '          
                <div class="list">
                    ' . $jb_notice . '
                    <a href="'.$url.'">' . $jb_title .'</a>
                </div>		
                ';
            }elseif($jb_code == "20"){
                $str .= '          
                <li class="swiper-slide">
                    <a href="'.$url.'">
                        <div class="dec">
                            <div class="img">
                                '. $img_src .'
                            </div>
                            <span class="txt">
                                <b>
                                  ' . $jb_title .'
                                </b>
                            </span>
                        </div>
                    </a>
                    <a href="'.$url.'" class="dec-more">
                        <span>자세히보기</span>
                    </a>
                </li>
                ';
            }elseif($jb_code == "30"){
                $str .= '          
                <li>
                    <label>
                        <span>'. $jb_reg_date_day .'</span>
                        <small>'. $jb_reg_date .'</small>
                    </label>
                    <a href="'.$url.'">' . $jb_title .'</a>
                    ' . $new_icon .'
                </li>
                ';
            }
		}
		return $str;
	}


    //메인 슬라이드
	function Main_Slide() {
		global $GP, $C_Slide, $C_Func;

		$args = '';
		$args['order']  = " ts_idx asc";
        $args['limit']  = " limit 0,20 ";

        //if($type) $args["ts_type"] = $type;    
          
        $rst = $C_Slide->Main_Slide_Show($args);
       
		for($i=0; $i<count($rst); $i++) {
			$ts_title      = nl2Br($rst[$i]['ts_title']);
			$ts_descrition = $rst[$i]['ts_descrition'];
            $ts_link       = $rst[$i]['ts_link'];
            $ts_idx       = $rst[$i]['ts_idx'];
			$ts_content    = nl2Br($rst[$i]['ts_content']);
			$ts_img        = $rst[$i]['ts_img'];
			$ts_m_img      = $rst[$i]['ts_m_img'];
			$ts_type       = $rst[$i]['ts_type'];
			$b_img = '';

            $href = $ts_link;
            if($ts_link != ""){
                // $c_href = '<a class="more-link" href=" '.  $ts_link .'">more view</a>';
				$c_href = 'href=" '.  $ts_link .'"';
            }
            //echo "textaa" . count($rst) . "<br>" ;

            $b_img = $GP -> UP_SLIDE_URL . $ts_img;
            $m_img = $GP -> UP_SLIDE_URL . $ts_m_img;
            //echo "text" . MobileCheck() . "<br>" ;

            $str .= '       
                    <li class="swiper-slide">
                        <a href="#">
                            <img src="'.  $b_img .'" alt="'.  $ts_title .'" class="mo-hide">
                            <img src="'.  $m_img .'" alt="'.  $ts_title .'" class="mo-show">
                        </a>
                    </li>
                ';


		}
		return $str;
	}





?>
