<?php
/**
*
*/
class Common_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	function InsertData($table,$Data)
	{
		$Insert = $this->db->insert($table,$Data);
		if ($Insert):
			return true;
		endif;
	}
	function getAllData($table,$specific='',$Where='',$order='',$limit='',$groupBy='')
	{
		// If Condition
		if (!empty($Where)):
			$this->db->where($Where);
		endif;
		// If Specific Columns are require
		if (!empty($specific)):
			$this->db->select($specific);
		else:
			$this->db->select('*');
		endif;

		if (!empty($groupBy)):
			$this->db->group_by($groupBy);
		endif;
		// if Order
		if (!empty($order)):
			$this->db->order_by($order);
		endif;
		// if limit
		if (!empty($limit)):
			$this->db->limit($limit);
		endif;
		// get Data
		$GetData = $this->db->get($table);
		return $GetData->result();
	}
	function UpdateDB($table,$Where,$Data)
	{
		$this->db->where($Where);
		$Update = $this->db->update($table,$Data);
		if ($Update):
			return true;
		else:
			return false;
		endif;
	}
	function Authentication($table,$data)
	{
		$this->db->where($data);
		$query = $this->db->get($table);
		if ($query) {
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	function DJoin($field,$tbl,$jointbl1,$Joinone,$jointbl3='',$Where='',$order='',$groupy = '')
    {
        $this->db->select($field);
        $this->db->from($tbl);
        $this->db->join($jointbl1,$Joinone);
        if (!empty($jointbl3)):
            foreach ($jointbl3 as $Table => $On):
                $this->db->join($Table,$On);
            endforeach;
        endif;
        // if Group
		if (!empty($groupy)):
			$this->db->group_by($groupy);
		endif;
        if(!empty($order)):
            $this->db->order_by($order);
        endif;
        if(!empty($Where)):
            $this->db->where($Where);
        endif;
        $query=$this->db->get();
        return $query->result();
    }
    function DeleteDB($table,$where)
    {
    	$this->db->where($where);
    	$done = $this->db->delete($table);
    	if ($done) {
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

	function Encode_html($str) {
    return trim(stripslashes(htmlentities($str)));
	}

	function Encode($str) {
	    return trim(  htmlentities( $str, ENT_QUOTES ) ) ;
	}

	function Decode($str) {
	    return html_entity_decode(stripslashes($str));
	}

	function Encrypt($password) {
	    return crypt(md5($password), md5($password));
	}

	function fileUpload($param,$temp,$location)
	{
	  	$allow_ext = array("png","jpg","jpeg","gif");
        $uploadPath = 'assets/uploads/'.$location.'/';
        $FileReturn = '';
		if(!empty($param))
        {
            if($param !=''){
				$Ext = end(explode(".", $param));
                $ext = strtolower($Ext);
		        $temps = explode(".",$param);
				$newfilename = rand(1,100).date("Yis").round(microtime(true)) . '.' . end($temps);
                if(in_array($ext, $allow_ext)){
                    move_uploaded_file($temp,$uploadPath.$newfilename);
                    $FileReturn = $newfilename;
                    return $FileReturn;
                }
                else{
                    $data['error_msg'] = "Please upload valid File";
                }
            }
        }
	}
	function fileUploads($param,$temp,$location)
	{
        $uploadPath = 'assets/uploads/'.$location.'/';
        $FileReturn = '';
				if(!empty($param))
        {
            if($param !=''){
							$Ext = end(explode(".", $param));
                $ext = strtolower($Ext);
		        $temps = explode(".",$param);
						$newfilename = rand(1,100).date("Yis").round(microtime(true)) . '.' . end($temps);
          move_uploaded_file($temp,$uploadPath.$newfilename);
          $FileReturn = $newfilename;
          return $FileReturn;
            }
        }
	}
}
?>
