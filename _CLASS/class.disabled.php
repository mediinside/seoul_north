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
	
	function disabled_Show2($args='') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;	
		
		
		if($d_year != '') {
			$addQry .= " AND d_year = '$d_year' ";
		}else{
			$addQry .= " ";
		}

		if($d_district != '') {
			$addQry .= " AND d_district = '$d_district' ";
		}else{
			$addQry .= " ";
		}
		
		
		$qry = "
			select sum(d_content1) as d_content1, sum(d_content2) as d_content2, sum(d_content3) as d_content3, sum(d_content4) as d_content4, sum(d_content5) as d_content5, sum(d_content6) as d_content6, sum(d_content7) as d_content7, sum(d_content8) as d_content8, sum(d_content9) as d_content9, sum(d_content10) as d_content10, sum(d_content11) as d_content11, sum(d_content12) as d_content12, sum(d_content13) as d_content13,sum(d_content14) as d_content14,sum(d_content15) as d_content15,
			sum(d_content1+d_content2+d_content3+d_content4+d_content5+d_content6+d_content7+d_content8+d_content9+d_content10+d_content11+d_content12+d_content13+d_content14+d_content15) as d_sum
			 from tblDisabled where 1 = 1 $addQry
		";
		
			// echo $qry;
		
		$rst =  $this -> DB -> execSqlList($qry);
		return $rst;
	}  
	
	function disabled_Show3($args='') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;	
		
		
		if($d_year != '') {
			$addQry .= " AND d_year = '$d_year' ";
		}else{
			$addQry .= " ";
		}

		if($d_district != '') {
			$addQry .= " AND d_district = '$d_district' ";
		}else{
			$addQry .= " ";
		}
				
		$qry = "
			select sum(CASE WHEN d_age BETWEEN 1 AND 5 THEN d_content1+d_content2+d_content3+d_content4+d_content5+d_content6+d_content7+d_content8+d_content9+d_content10+d_content11+d_content12+d_content13+d_content14+d_content15 ELSE 0 END) as d_sum1,
			sum(CASE WHEN d_age BETWEEN 6 AND 19 THEN d_content1+d_content2+d_content3+d_content4+d_content5+d_content6+d_content7+d_content8+d_content9+d_content10+d_content11+d_content12+d_content13+d_content14+d_content15 ELSE 0 END) as d_sum2,
			sum(CASE WHEN d_age BETWEEN 20 AND 64 THEN d_content1+d_content2+d_content3+d_content4+d_content5+d_content6+d_content7+d_content8+d_content9+d_content10+d_content11+d_content12+d_content13+d_content14+d_content15 ELSE 0 END) as d_sum3, 
			sum(CASE WHEN d_age >= 65 THEN d_content1+d_content2+d_content3+d_content4+d_content5+d_content6+d_content7+d_content8+d_content9+d_content10+d_content11+d_content12+d_content13+d_content14+d_content15 ELSE 0 END) as d_sum4,
			sum(d_content1+d_content2+d_content3+d_content4+d_content5+d_content6+d_content7+d_content8+d_content9+d_content10+d_content11+d_content12+d_content13+d_content14+d_content15 ) as d_sum5
			from tblDisabled where 1 = 1 $addQry
		";
		
			// echo $qry;
		
		$rst =  $this -> DB -> execSqlList($qry);
		return $rst;
	}  
	

	function disabled_Show4($args='') {
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;	
		
		
		if($d_year != '') {
			$addQry .= " AND d_year = '$d_year' ";
		}else{
			$addQry .= " ";
		}

		if($d_district != '') {
			$addQry .= " AND d_district = '$d_district' ";
		}else{
			$addQry .= " ";
		}
				
		$qry = "
			select sum(CASE WHEN d_age BETWEEN 0 AND 9 THEN $d_content ELSE 0 END) as d_sum1,
			sum(CASE WHEN d_age BETWEEN 10 AND 19 THEN $d_content ELSE 0 END) as d_sum2,
			sum(CASE WHEN d_age BETWEEN 20 AND 29 THEN $d_content ELSE 0 END) as d_sum3,
			sum(CASE WHEN d_age BETWEEN 30 AND 39 THEN $d_content ELSE 0 END) as d_sum4,
			sum(CASE WHEN d_age BETWEEN 40 AND 49 THEN $d_content ELSE 0 END) as d_sum5,
			sum(CASE WHEN d_age BETWEEN 50 AND 59 THEN $d_content ELSE 0 END) as d_sum6,
			sum(CASE WHEN d_age BETWEEN 60 AND 69 THEN $d_content ELSE 0 END) as d_sum7,
			sum(CASE WHEN d_age BETWEEN 70 AND 79 THEN $d_content ELSE 0 END) as d_sum8,
			sum(CASE WHEN d_age BETWEEN 80 AND 89 THEN $d_content ELSE 0 END) as d_sum9,
			sum(CASE WHEN d_age >= 90 THEN $d_content ELSE 0 END) as d_sum10
			from tblDisabled where 1 = 1 $addQry
		";
		
			// echo $qry;
		
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