<?
CLASS disabled extends Dbconn
{
	private $DB;
	private $GP;
	function __construct($DB = array()) {
		global $C_DB, $GP;
		$this -> DB = (!empty($DB))? $DB : $C_DB;
		$this -> GP = $GP;
	}
	
	
	// desc	 : 메인 슬라이드 리스트
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function disabled_Show($args='') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		if($d_content != '') {
			$addsum .= " sum($d_content) as d_sum,  ";
		}else{
			$addsum .= " sum(d_content1+d_content2+d_content3+d_content4+d_content5+d_content6+d_content7+d_content8+d_content9+d_content10+d_content11+d_content12+d_content13+d_content14+d_content15) as d_sum,  ";
		}
		
		if($d_year != '') {
			$addQry .= " AND d_year = '$d_year' ";
		}else{
			$addQry .= " ";
		}
		$groupby = 'group by d_district' ;
		
		$qry = "
			select $addsum d_district from tblDisabled where 1 = 1 $addQry $groupby order by d_district asc $limit 
		";
		
		//	 echo $qry;
		
		$rst =  $this -> DB -> execSqlList($qry);
		return $rst;
    }   
   
		
	// desc	 : 슬라이드 수정
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function disabled_Modi($args = '') {
        if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
        
		$qry = "
			update
				tblDisabled
			set
                d_year = '$d_year',
				d_district = '$d_district',
				d_age = '$d_age',
				d_content1 = '$d_content1',
                d_content2 = '$d_content2',
                d_content3 = '$d_content3',
                d_content4 = '$d_content4',
                d_content5 = '$d_content5',
                d_content6 = '$d_content6',
                d_content7 = '$d_content7',
                d_content8 = '$d_content8',
                d_content9 = '$d_content9',
                d_content10 = '$d_content10',
                d_content11 = '$d_content11',
                d_content12 = '$d_content12',
                d_content13 = '$d_content13',
                d_content14 = '$d_content14',
                d_content15 = '$d_content15'
			where
				d_idx = '$d_idx'			
		";
		$rst =  $this -> DB -> execSqlUpdate($qry);
		return $rst;
	}
	
	// desc	 : 슬라이드 삭제
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function disabled_Del($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$qry = "
			delete from tblDisabled where d_idx = '$d_idx'	
		";
		$rst =  $this -> DB -> execSqlUpdate($qry);
		return $rst;
    }
    
    // desc	 : 슬라이드 삭제
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function disabled_year_Del($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$qry = "
			delete from tblDisabled where d_year = '$d_year'	
		";
		$rst =  $this -> DB -> execSqlUpdate($qry);
		return $rst;
	}
	
	// desc	 : 슬라이드 정보
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function disabled_ImgUpdate($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$addQry = "";
		if($type == "W") {
			$addQry = " d_img = '' ";
		}else {
			$addQry = " d_img2 = '' ";
		}
		
		$qry = "
			update
				tblDisabled
			set				
				$addQry
			where
				d_idx = '$d_idx'			
		";
		$rst =  $this -> DB -> execSqlUpdate($qry);
		return $rst;
	}
	
	// desc	 : 슬라이드 정보
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function disabled_Info($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		$qry = "            
            select * from tblDisabled where d_idx = '$d_idx'
        ";
                
		$rst =  $this -> DB -> execSqlOneRow($qry);
		return $rst;
    }
    
    
	
	// desc	 : 슬라이드 등록
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function disabled_Reg($args = '') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		
		
		$qry = "
			INSERT INTO
				tblDisabled
				(
					d_idx, 
                    d_year, 
                    d_city, 
                    d_district, 
                    d_age, 
                    d_content1, 
                    d_content2, 
                    d_content3, 
                    d_content4, 
                    d_content5, 
                    d_content6, 
                    d_content7, 
                    d_content8, 
                    d_content9, 
                    d_content10, 
                    d_content11,
                    d_content12, 
                    d_content13, 
                    d_content14, 
                    d_content15, 
                    d_show, 
                    d_regdate, 
                    d_type
				)
				VALUES
				(
					''		
					, '$d_year'
					, '서울특별시'
					, '$d_district'
					, '$d_age'
                    , '$d_content1'					
                    , '$d_content2'
                    , '$d_content3'	
                    , '$d_content4'	
                    , '$d_content5'	
                    , '$d_content6'	
                    , '$d_content7'	
                    , '$d_content8'	
                    , '$d_content9'	
                    , '$d_content10'		
                    , '$d_content11'	
                    , '$d_content12'	
                    , '$d_content13'	
                    , '$d_content14'	
                    , '$d_content15'	
					, ''
					,  NOW()
					, ''
				)
			";
			

		$rst =  $this -> DB -> execSqlInsert($qry);
		return $rst;
    }
    
    // desc	 : 스킨 타입
	// auth  : JH 2013-04-26
	// param 
	function disabled_YEAR() {
		$qry = "
			select d_year from tblDisabled group by d_year
		";
		$rst =  $this -> DB -> execSqlList($qry);
		return $rst;
	}
	
	
	// desc	 : 태그 리스트
	// auth  : JH 2012-12-05 2012-11-06
	// param
	function disabled_List ($args = '') {
		global $C_Func;
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;

		global $C_ListClass;

		$tail = "";
		$addQry = " 1=1 ";
		
		if(!empty($d_show)) {
			$addQry .= " AND ";
			$addQry .= " d_show = '$d_show' ";
		}	
		
		if ($search_key && $search_content) {
			if (!empty($addQry)) {
				$addQry .= " AND ";
				$addQry .= " $search_key LIKE ('%$search_content%')";
			}
		}
				
		$args['show_row'] = $show_row;
		$args['show_page'] = 10;
		$args['q_idx'] = "d_idx";
		$args['q_col'] = "*";
		$args['q_table'] = "tblDisabled";
		$args['q_where'] = $addQry;
		$args['q_order'] = "d_regdate desc";
		$args['q_group'] = "";
		$args['tail'] = "s_date=" . $s_date . "&e_date=" . $e_date ."&serach_key=" . $search_key . "&search_content=" . $search_cotent . "&tt_cate=" . $tt_cate;
		$args['q_see'] = "";
		return $C_ListClass -> listInfo($args);
    }        

}
?>