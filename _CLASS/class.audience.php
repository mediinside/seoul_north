<?
CLASS Audience extends Dbconn
{    
    private $DB;
	private $GP;
	function __construct($DB = array()) {
		global $C_DB, $GP;
		$this -> DB = (!empty($DB))? $DB : $C_DB;
		$this -> GP = $GP;
	}


	function AUDIENCE_LIST($AdHpID){
		global $db;
		$qry = "select * from ".AUDIENCE_TABLE." where AdHpID = '$AdHpID'";
		$order = "order by AdRegDate desc";
		// $limit = "limit 0, 1000";
		$rst = db_select($qry,$where,$order,$limit);
		for($i=0;$i<count($rst);$i++){
			$list[] = array(
				"AdIdx"       => $rst[$i]["AdIdx"],
				"AdHpID"      => $rst[$i]["AdHpID"],
				"AdAdmNo"     => $rst[$i]["AdAdmNo"],
				"AdTreatCode" => $rst[$i]["AdTreatCode"],
				"AdTreatName" => TreatCodeName($rst[$i]["AdTreatCode"],$_SESSION['a_hp_id']),
				"AdName"      => $rst[$i]["AdName"],
				"AdPhone"     => $rst[$i]["AdPhone"],
				"AdMemo"      => $rst[$i]["AdMemo"],
				"AdRegDate"   => substr($rst[$i]["AdRegDate"], 0, 10)
			);
		}
		return $list;
	}

	function AUDIENCE_TEMP_LIST($AdHpID){
		global $db;
		$qry = "select * from ".AUDIENCE_TEMP_TABLE." where AdHpID = '$AdHpID'";
		$order = "order by AdRegDate desc";
		$rst = db_select($qry,$where,$order,$limit);
		for($i=0;$i<count($rst);$i++){
			$templist[] = array(
				"AdIdx"       => $rst[$i]["AdIdx"],
				"AdAdmNo"     => $rst[$i]["AdAdmNo"],
				"AdTreatCode" => $rst[$i]["AdTreatCode"],
				"AdTreatName" => TreatCodeName($rst[$i]["AdTreatCode"],$_SESSION['a_hp_id']),
				"AdName"      => $rst[$i]["AdName"],
				"AdPhone"     => $rst[$i]["AdPhone"],
				"AdMemo"      => $rst[$i]["AdMemo"],
				"AdRegDate"   => substr($rst[$i]["AdRegDate"], 0, 10)
			);
		}
		return $templist;
	}

	function AUDIENCE_GROUP_LIST($AdHpID, $AdmNo){
		global $db;
		$qry = "select * from ".GROUP_TABLE." where GcHpID = '$AdHpID' and GcAdmNo = '$AdmNo'";
		$order = "order by GcRegDate asc";
		$rst = db_select($qry,$where,$order,$limit);
		for($i=0;$i<count($rst);$i++){
			$list[] = array(
				"GcNo"      => $rst[$i]["GcNo"],
				"GcHpId"    => $rst[$i]["GcHpId"],
				"GcAdmNo"   => $rst[$i]["GcAdmNo"],
				"GcName"    => $rst[$i]["GcName"],
				"GcDepth"   => $rst[$i]["GcDepth"],
				"GcRegDate" => substr($rst[$i]["GcRegDate"], 0, 10)
			);
		}
		return $list;
	}

	function AUDIENCE_INITIAL($args){
		if (is_array($args)) foreach ($args as $k => $v) ${$k} = $v;
		global $db;
		if($str){
			switch ($str)
			{
		        case 'ㄱ':
		                $str = "(AdName RLIKE '^(ㄱ|ㄲ)' OR ( AdName >= '가' AND AdName < '나' ))"; 
		                break;
		        case 'ㄴ':
		                $str = "(AdName RLIKE '^ㄴ' OR ( AdName >= '나' AND AdName < '다' ))"; 
		                break;
		        case 'ㄷ':
		                $str = "(AdName RLIKE '^(ㄷ|ㄸ)' OR ( AdName >= '다' AND AdName < '라' ))"; 
		                break;
		        case 'ㄹ':
		                $str = "(AdName RLIKE '^ㄹ' OR ( AdName >= '라' AND AdName < '마' ))"; 
		                break;
		        case 'ㅁ':
		                $str = "(AdName RLIKE '^ㅁ' OR ( AdName >= '마' AND AdName < '바' ))";        
		                break;
		        case 'ㅂ':
		                $str = "(AdName RLIKE '^ㅂ' OR ( AdName >= '바' AND AdName < '사' ))"; 
		                break;
		        case 'ㅅ':
		                $str = "(AdName RLIKE '^(ㅅ|ㅆ)' OR ( AdName >= '사' AND AdName < '아' ))"; 
		                break;
		        case 'ㅇ':
		                $str = "(AdName RLIKE '^ㅇ' OR ( AdName >= '아' AND AdName < '자' ))"; 
		                break;
		        case 'ㅈ':
		                $str = "(AdName RLIKE '^(ㅈ|ㅉ)' OR ( AdName >= '자' AND AdName < '차' ))"; 
		                break;
		        case 'ㅊ':
		                $str = "(AdName RLIKE '^ㅊ' OR ( AdName >= '차' AND AdName < '카' ))"; 
		                break;
		        case 'ㅋ':
		                $str = "(AdName RLIKE '^ㅋ' OR ( AdName >= '카' AND AdName < '타' ))"; 
		                break;
		        case 'ㅌ':
		                $str = "(AdName RLIKE '^ㅌ' OR ( AdName >= '타' AND AdName < '파' ))"; 
		                break;
		        case 'ㅍ':
		                $str = "(AdName RLIKE '^ㅍ' OR ( AdName >= '파' AND AdName < '하' ))"; 
		                break;
		        case 'ㅎ':
		                $str = "(AdName RLIKE '^ㅎ' OR ( AdName >= '하'))"; 
		                break;
		        
			}
			$where[] = $str;
		}

		$qry = "select * from ".AUDIENCE_TABLE;
		$rst = db_select($qry,$where,$order,$limit);
		for($i=0;$i<count($rst);$i++){
			$list[] = array(
				"AdIdx"       => $rst[$i]["AdIdx"],
				"AdAdmNo"     => $rst[$i]["AdAdmNo"],
				"AdTreatCode" => $rst[$i]["AdTreatCode"],
				"AdTreatName" => TreatCodeName($rst[$i]["AdTreatCode"],$_SESSION['a_hp_id']),
				"AdName"      => $rst[$i]["AdName"],
				"AdPhone"     => $rst[$i]["AdPhone"],
				"AdMemo"      => $rst[$i]["AdMemo"],
				"AdRegDate"   => substr($rst[$i]["AdRegDate"], 0, 10)
			);
		}
		return $list;
	}

	
}
?>