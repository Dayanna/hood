<?php
class Gallery_model extends CI_Model{
	//var $gallery_path;
	
	function __construct()
	{
		parent::__construct();
		$gallery_path=$this->gallery_path= realpath(APPPATH.'../files');
		//var_dump($gallery_path); die();	
	}
	
	function do_upload($hooid){
		$config= array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $this->gallery_path
		);
		$this->load->library('upload', $config);
		$name=$_FILES['userfile']['name'];
		var_dump($hoodid);
		//$hoodid = $this->input->post('hoodid');
		//$hoodid = preg_replace("/\\//", "\\/", $hoodid);
		$path = mysql_real_escape_string($this->gallery_path);
		$path = $path.'/'.$name;
		var_dump($path);
		if($this->upload->do_upload()){
			$this->db->query("INSERT INTO tfile (path, THoods_idHoods) VALUES('$name', $hoodid)");	
		}else{
			$error = array('error' => $this->upload->display_errors());
			var_dump($error['error']);
		}
	}
}