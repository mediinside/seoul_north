<?php
include_once("../../../_init.php");
include_once($GP -> CLS."/class.disabled.php");
include_once($GP -> CLS."/class.inspectionrate.php");
$C_Disabled 	= new Disabled;
$C_Inspectionrate 	= new Inspectionrate;

$mode = $_POST['mode'];

switch($mode){
	
	//disabled 엑셀파일 등록
	case "disabled" :
	
		include_once($GP->CLS."class.fileup.php");

		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;

		$file_orName = "up_file";
		$is_fileName = $_FILES[$file_orName]['name'];
		$insertFileCheck = false;
		if($is_fileName){
			
			$args_f = "";
			$args_f['forder'] 						= $GP -> UP_EXCEL;
			$args_f['files'] 							= $_FILES[$file_orName];

			$args_f['max_file_size'] 			= 1024 * 30000;// 500kb 이하
			$args_f['able_file'] 					=  array("csv","xls");

			$C_Fileup = new Fileup($args_f);
			$updata = $C_Fileup -> fileUpload();

			if ($updata['error']) {
				//print_r($updata['error']);
				$insertFileCheck = true;
            }            
            
			$file_name = $updata['new_file_name'];
			$file_path = $GP->UP_EXCEL . $file_name;		
						
			$fp = fopen($file_path, "r");
            $arr_data = "";    
            $i = 0 ;
          
			while($data = fgetcsv($fp, 1000000, ",")) {	     
                    	               
                $d_district =  iconv("euc-kr","utf-8",$data[1]);  
                $i ++;		  

                if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;	                                 
                    $args = "";
                    $args['d_year'] 				= trim($data[0]);
                    $args['d_district'] 			= $d_district;                  
                    $args['d_age'] 				    = trim($data[2]);      
                    for($j = 1 ; $j < 16 ; $j++)
                    {
                        $k = $j + 2;                   
                        $args['d_content'.$j]    = iconv("euc-kr","utf-8",$data[$k]);                     
                    }	
                    
                    if($i != 1 ){
                        $rst = $C_Disabled -> disabled_Reg($args);   
                    }

                    
			}		
			if($rst) {
                $C_Func->put_msg_and_modalclose("등록 되었습니다");
            }else{
                $C_Func->put_msg_and_modalclose("등록에 실패하였습니다");
            }
            exit();   	
		}
    break;
    
    //disabled 엑셀파일 등록
	case "inspectionrate" :
	
		include_once($GP->CLS."class.fileup.php");

		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;

		$file_orName = "up_file";
		$is_fileName = $_FILES[$file_orName]['name'];
		$insertFileCheck = false;
		if($is_fileName){
			
			$args_f = "";
			$args_f['forder'] 						= $GP -> UP_EXCEL;
			$args_f['files'] 							= $_FILES[$file_orName];

			$args_f['max_file_size'] 			= 1024 * 30000;// 500kb 이하
			$args_f['able_file'] 					=  array("csv","xls");

			$C_Fileup = new Fileup($args_f);
			$updata = $C_Fileup -> fileUpload();

			if ($updata['error']) {
				//print_r($updata['error']);
				$insertFileCheck = true;
            }            
            
			$file_name = $updata['new_file_name'];
			$file_path = $GP->UP_EXCEL . $file_name;		
						
			$fp = fopen($file_path, "r");            
            $i = 0 ;         
            
			while($data = fgetcsv($fp, 1000000, ",")) {	     
               
          
                    	               
                $ir_district =  iconv("euc-kr","utf-8",$data[1]);  
                $i ++;		  

                if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;	                                 
                $args = "";
                $args['ir_year'] 				= iconv("euc-kr","utf-8",$data[0]);
                $args['ir_district'] 			= $ir_district;      
                for($j = 1 ; $j < 31 ; $j++)
                {
                    $k = $j + 1;                   
                    $args['ir_content'.$j]    = iconv("euc-kr","utf-8",$data[$k]);                     
                }	
          
                if($i != 1 ){
                $rst = $C_Inspectionrate -> inspectionrate_Reg($args);   
                }

                
                    
			}		
			if($rst) {
                $C_Func->put_msg_and_modalclose("등록 되었습니다");
            }else{
                $C_Func->put_msg_and_modalclose("등록에 실패하였습니다");
            }
            exit();   	
		}
	break;
}

?>