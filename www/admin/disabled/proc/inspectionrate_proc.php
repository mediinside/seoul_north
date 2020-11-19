<?php
include_once("../../../_init.php");
include_once($GP -> CLS."/class.inspectionrate.php");
$C_inspectionrate 	= new inspectionrate;

//error_reporting(E_ALL);
//ini_set("display_errors", 1);


switch($_POST['mode']){	
	
	
	case 'inspectionrate_MODI':
		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
		
		include_once($GP->CLS."class.fileup.php");
			
		//메인페이지 이미지 업로드
		$file_orName			= "ir_img";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_inspectionrate;
			$args_f['files'] 						= $_FILES[$file_orName];
			$args_f['max_file_size'] 		= 1024 * 5000;// 500kb 이하
			$args_f['able_file'] 				= array();

			$C_Fileup = new Fileup($args_f);
			$updata		= $C_Fileup -> fileUpload();

			if ($updata['error']) 
				$insertFileCheck = true;
			$image_main = $updata['new_file_name'];	//변경된 파일명
		}else{
			$image_main = $before_image_main;
		}
		
		if($insertFileCheck) {
			$C_Func->put_msg_and_modalclose($updata['error']);
		}

		//메인페이지 이미지 업로드
		$file_orName			= "ir_img2";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_inspectionrate;
			$args_f['files'] 						= $_FILES[$file_orName];
			$args_f['max_file_size'] 		= 1024 * 5000;// 500kb 이하
			$args_f['able_file'] 				= array();

			$C_Fileup = new Fileup($args_f);
			$updata		= $C_Fileup -> fileUpload();

			if ($updata['error']) 
				$insertFileCheck = true;
			$image_main2 = $updata['new_file_name'];	//변경된 파일명
		}else{
			$image_main2 = $before_image_main2;
		}
		
		if($insertFileCheck) {
			$C_Func->put_msg_and_modalclose($updata['error']);
		}

		
		$args = "";
		$args['ir_idx']      = $ir_idx;    
        $args['ir_year']      = $ir_year;        
        $args['ir_district']      = $ir_district;     
        for($j = 1 ; $j < 31 ; $j++)
        {            
            $args['ir_content'.$j]    = ${"ir_content".$j} ;         
        }	       

        $rst = $C_inspectionrate ->inspectionrate_Modi($args);
        print_r($C_Func) ;

		$C_Func->put_msg_and_modalclose("수정 되었습니다");		
		exit();
	break;


	case "inspectionrate_IMGDEL":
			if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
			
			$args = "";
			$args['ir_idx'] = $ir_idx;
			$args['type'] = $type;
			$rst = $C_inspectionrate ->inspectionrate_ImgUpdate($args);
	
			@unlink($GP -> UP_inspectionrate . $file);
	
			echo "true";
			exit();
		break;


	case 'inspectionrate_DEL' :
		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;		
		
		$args = "";
		$args['ir_idx'] 	= $ir_idx;
		$result = $C_inspectionrate ->inspectionrate_Info($args);
		
		if($result) {			
			$ir_img = $result['ir_img'];
			$ir_img2 = $result['ir_img2'];
			
			if($ir_img != '') {			
				@unlink($GP -> UP_inspectionrate.$ir_img);
			}					
			
			if($ir_img2 != '') {			
				@unlink($GP -> UP_inspectionrate.$ir_img2);
			}
			$rst = $C_inspectionrate ->inspectionrate_Del($args);
		}		
		echo "true";
		exit();
	
    break;
    
    case 'inspectionrate_year_DEL' :
		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;		
		
		$args = "";
		$args['ir_year'] 	= $ir_year;		
        $rst = $C_inspectionrate ->inspectionrate_year_Del($args);
        
		echo "true";
		exit();
	
	break;

	
	case 'inspectionrate_REG':
		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
		
		include_once($GP->CLS."class.fileup.php");
			
		//메인페이지 이미지 업로드
		$file_orName			= "ir_img";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_inspectionrate;
			$args_f['files'] 						= $_FILES[$file_orName];
			$args_f['max_file_size'] 		= 1024 * 5000;// 500kb 이하
			$args_f['able_file'] 				= array();

			$C_Fileup = new Fileup($args_f);
			$updata		= $C_Fileup -> fileUpload();

			if ($updata['error']) 
				$insertFileCheck = true;
			$image_main = $updata['new_file_name'];	//변경된 파일명
		}else{
			$image_main = $before_image_main;
		}
		
		if($insertFileCheck) {
			$C_Func->put_msg_and_modalclose($updata['error']);
		}

		//메인페이지 이미지 업로드
		$file_orName			= "ir_img2";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_inspectionrate;
			$args_f['files'] 						= $_FILES[$file_orName];
			$args_f['max_file_size'] 		= 1024 * 5000;// 500kb 이하
			$args_f['able_file'] 				= array();

			$C_Fileup = new Fileup($args_f);
			$updata		= $C_Fileup -> fileUpload();

			if ($updata['error']) 
				$insertFileCheck = true;
			$image_main2 = $updata['new_file_name'];	//변경된 파일명
		}else{
			$image_main2 = $before_image_main2;
		}
		
		if($insertFileCheck) {
			$C_Func->put_msg_and_modalclose($updata['error']);
		}

		
		$args = "";
		$args['ir_title'] 				= addslashes($ir_title);
		$args['ir_link'] 				= $ir_link;
		$args['ir_descrition'] 		= addslashes($ir_descrition);
		$args['ir_content'] 			= $C_Func->enc_contents($ir_content);
		$args['ir_img'] 					= $image_main;
		$args['ir_img2'] 					= $image_main2;
		$args['ir_show'] 					= $ir_show;		
		$args['ir_lang'] 					= "kor";
		$args['ir_type']					= $ir_type;

		$rst = $C_inspectionrate ->inspectionrate_Reg($args);

		if($rst) {
			$C_Func->put_msg_and_modalclose("등록 되었습니다");
		}else{
			$C_Func->put_msg_and_modalclose("등록에 실패하였습니다");
		}
		exit();
    break;  
	
}
?>