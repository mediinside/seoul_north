<?php
include_once("../../../_init.php");
include_once($GP -> CLS."/class.disabled.php");
$C_disabled 	= new disabled;

//error_reporting(E_ALL);
//ini_set("display_errors", 1);


switch($_POST['mode']){	
	
	
	case 'disabled_MODI':
		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
		
		include_once($GP->CLS."class.fileup.php");
			
		//메인페이지 이미지 업로드
		$file_orName			= "d_img";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_disabled;
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
		$file_orName			= "d_img2";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_disabled;
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
		$args['d_idx']      = $d_idx;    
        $args['d_year']      = $d_year; 
        $args['d_district']      = $d_district; 
        $args['d_age']      = $d_age; 
        $args['d_content1']      = $d_content1; 
        $args['d_content2']      = $d_content2; 
        $args['d_content3']      = $d_content3; 
        $args['d_content4']      = $d_content4; 
        $args['d_content5']      = $d_content5; 
        $args['d_content6']      = $d_content6; 
        $args['d_content7']      = $d_content7; 
        $args['d_content8']      = $d_content8; 
        $args['d_content9']      = $d_content9; 
        $args['d_content10']      = $d_content10; 
        $args['d_content11']      = $d_content11;
        $args['d_content12']      = $d_content12; 
        $args['d_content13']      = $d_content13; 
        $args['d_content14']      = $d_content14; 
        $args['d_content15']      = $d_content15;         
        

		$rst = $C_disabled ->disabled_Modi($args);

		$C_Func->put_msg_and_modalclose("수정 되었습니다");		
		exit();
	break;


	case "disabled_IMGDEL":
			if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
			
			$args = "";
			$args['d_idx'] = $d_idx;
			$args['type'] = $type;
			$rst = $C_disabled ->disabled_ImgUpdate($args);
	
			@unlink($GP -> UP_disabled . $file);
	
			echo "true";
			exit();
		break;


	case 'disabled_DEL' :
		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;		
		
		$args = "";
		$args['d_idx'] 	= $d_idx;
		$result = $C_disabled ->disabled_Info($args);
		
		if($result) {			
			$d_img = $result['d_img'];
			$d_img2 = $result['d_img2'];
			
			if($d_img != '') {			
				@unlink($GP -> UP_disabled.$d_img);
			}					
			
			if($d_img2 != '') {			
				@unlink($GP -> UP_disabled.$d_img2);
			}
			$rst = $C_disabled ->disabled_Del($args);
		}		
		echo "true";
		exit();
	
    break;   
	
	case 'disabled_REG':
		if (is_array($_POST)) foreach ($_POST as $k => $v) ${$k} = $v;
		
		include_once($GP->CLS."class.fileup.php");
			
		//메인페이지 이미지 업로드
		$file_orName			= "d_img";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_disabled;
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
		$file_orName			= "d_img2";
		$is_fileName			= $_FILES[$file_orName]['name'];
		$insertFileCheck	= false;
		if ($is_fileName) {
			$args_f = "";
			$args_f['forder'] 					= $GP -> UP_disabled;
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
		$args['d_title'] 				= addslashes($d_title);
		$args['d_link'] 				= $d_link;
		$args['d_descrition'] 		= addslashes($d_descrition);
		$args['d_content'] 			= $C_Func->enc_contents($d_content);
		$args['d_img'] 					= $image_main;
		$args['d_img2'] 					= $image_main2;
		$args['d_show'] 					= $d_show;		
		$args['d_lang'] 					= "kor";
		$args['d_type']					= $d_type;

		$rst = $C_disabled ->disabled_Reg($args);

		if($rst) {
			$C_Func->put_msg_and_modalclose("등록 되었습니다");
		}else{
			$C_Func->put_msg_and_modalclose("등록에 실패하였습니다");
		}
		exit();
    break;  

}
?>