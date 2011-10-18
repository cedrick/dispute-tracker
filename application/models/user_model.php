<?php
class User_model extends CI_Model
{
	var $gallery_path;
	
	function user_model()
	{
		parent::__construct();
		$this->gallery_path = realpath(APPPATH . '../attachment');
		
	}
	
	

	function download($id)
	{
		$this->load->helper('download');
	    //$data = file_get_contents($this->gallery_path.'/'.$id); // Read the file's contents
		//force_download($id,$data);
		//ob_clean();
		//exit($data);
		
		
		$id_name= $id;
		$id_path = $this->config->item('base_url') . "attachment/$id";
		header('Content-Type: application/octet-stream');
		header("Content-Disposition: attachment; filename=$id");
		header('Content-type: audio/x-wav');
		ob_clean();
		flush();
		readfile($id_path);
		
		
		
	}
	
	function do_upload()
	{
		$config = array (
							'upload_path' => $this->gallery_path,
							'allowed_types' => 'gif|jpg|jpeg|png|mp3|wav',
							'max_size' => 5000
		                 );

		$this->load->library('upload',$config);
		//$this->gallery_path;
		if ($this->upload->do_upload()) {
			return $this->upload->data();
			return TRUE;
		} else {
			echo $this->upload->display_errors();
			return FALSE;
		}
	}
	
	
	function insert_despute($user_id,$subj_line,$adsl,$mobile,$iptv,$inst_add,$name,$nric,$product,$reason,$target_date)
	{
		$load = $this->User_model->do_upload();
		date_default_timezone_set('Asia/Manila');
		$query_str= array(
						   'user_id' => $user_id,
						   'subj_line' => $subj_line,
						   'adsl' => $adsl,
							'mobile' => $mobile,
						   'iptv' => $iptv,
						   'inst_add' => $inst_add,
							'name' => $name ,
						   'nric' => $nric,
						   'product' => $product,
							'reason' => $reason,
							'target_date' => $target_date,
							'location' => $load['file_name']
					);
		$this->db->set('rdate', 'NOW()', FALSE);
		if($this->db->insert('dspt_info ',$query_str)){
			
			
			$result = $this->db->get_where('dspt_info', array('subj_line' => $subj_line));
			if($result->num_rows()>0)
			{
				foreach($result->result() as $row)
				{
					$despute_id = $row->despute_id;
				}
					
					$query= array(
						  
						   'despute_id' => $despute_id, 
						   'user_id' => $user_id
					);
					if($this->db->insert('dspt_history',$query))
					{
						return TRUE;
					}else 
					{
						return FALSE;
					}
			}
			return TRUE;
		}
		else
		{
			return FALSE;
		}

	}
	
	function insert_findings($dropdown_despute,$findings,$resolution,$info_status,$remarks,$user_id,$rdate)
	{
		
			$result =  $this->db->query("select dspt_history.history_id,dspt_history.despute_id,dspt_history.status,subj_line,adsl,mobile,iptv,inst_add,name,nric,product,reason,findings,resolution,remarks,rdate as date_recieved,hdate as date_resolved from dspt_info inner join dspt_history on dspt_history.despute_id = dspt_info.despute_id where subj_line = '$dropdown_despute' order by hdate desc limit 0,1");
			if($result->num_rows()>0)
			{
				foreach($result->result() as $row)
				{
					$despute_id = $row->despute_id;
					$status = $row->status;
				}
				if($status!= 'RESOLVED')
				{
				
					date_default_timezone_set('Asia/Manila');
					$query_str= array(
									   'despute_id' => $despute_id,
									   'user_id' => $user_id,
									   'findings' => $findings,
										'resolution' => $resolution,
									   'status' => $info_status,
									   'remarks' => $remarks,
									);
					$this->db->set('hdate', 'NOW()', FALSE);
					if($this->db->insert('dspt_history ',$query_str))
							{
								return TRUE;
							}else 
							{
								return FALSE;
							}	
					return TRUE;	
				}else 
				{
					return FALSE;
				}
				return TRUE;
			}else 
			{
				return FALSE;
			}
		
	}
	
	
	function input_findings($id,$findings,$resolution,$info_status,$remarks,$user_id,$rdate)
	{
		
			$result =  $this->db->query("select dspt_history.history_id,dspt_history.despute_id,dspt_history.status,subj_line,adsl,mobile,iptv,inst_add,name,nric,product,reason,findings,resolution,remarks,rdate as date_recieved,hdate as date_resolved from dspt_info inner join dspt_history on dspt_history.despute_id = dspt_info.despute_id where dspt_history.despute_id = '$id' order by hdate desc limit 0,1");
			if($result->num_rows()>0)
			{
				foreach($result->result() as $row)
				{
					$despute_id = $row->despute_id;
					$status = $row->status;
				}
				if($status!= 'RESOLVED')
				{
				
					$load = $this->User_model->do_upload();
					date_default_timezone_set('Asia/Manila');
					$query_str= array(
									   'despute_id' => $despute_id,
									   'user_id' => $user_id,
									   'findings' => $findings,
										'resolution' => $resolution,
									   'status' => $info_status,
									   'remarks' => $remarks,
									   'location' => $load['file_name']
									);
									
					$this->db->set('hdate', 'NOW()', FALSE);
					if($this->db->insert('dspt_history ',$query_str))
							{
								return TRUE;
							}else 
							{
								return FALSE;
							}	
					return TRUE;	
				}else 
				{
					return FALSE;
				}
				return TRUE;
			}else 
			{
				return FALSE;
			}
		
	}
	
	
	
	function set_login($username,$password)
	{
			$key = "Codeigniter";
			$password = md5($password.$key);
			$query_str = "SELECT * FROM dspt_users WHERE username='$username' and password='$password'";
			$result = $this->db->query($query_str,array($username,$password));
			if($result->num_rows()>0){
				
				foreach($result->result() as $row)
				{
					$user_id = $row->user_id;
				}
			  $this->session->set_userdata('user_id',$user_id );
			  $this->session->set_userdata('username',$username);
				return TRUE;
			}
			else
			{
				return FALSE;
			}	
	}
	
	function set_register($username,$password,$name)
	{
			$key = "Codeigniter";
			$password = md5($password.$key);
			$query_str =  "INSERT INTO  dspt_users (full_name,username,password,udate) Values (?,?,?,NOW())";
			if($this->db->query($query_str,array($name,$username,$password))){
					return TRUE;
				}
				else
				{
					return FALSE;
				}
	}
	
	function check_exist_username($username)
		{
			$query_str = "SELECT username from dspt_users where username = ?";
			$result = $this->db->query($query_str,$username);
			if($result->num_rows() > 0)
			{
				return TRUE;
			}else
			{
				return FALSE;
			}
		}
		
	function get_despute()
	{
				return $this->db->query("
				
												
										SELECT  a.history_id,c.despute_id,a.user_id,d.username as user,c.subj_line,c.name,c.nric,a.status,c.rdate as date_recieved,a.hdate as date_resolved
										FROM dspt_history a
										INNER JOIN (
										    SELECT despute_id,MAX(history_id) AS history_id
										    FROM dspt_history
										    GROUP BY despute_id
										) b
										    ON a.history_id = b.history_id 
								        INNER JOIN dspt_info c 
								            ON c.despute_id = a.despute_id
								        INNER JOIN dspt_users d
								            ON d.user_id=a.user_id where a.status in ('PENDING','NEW') order by a.hdate asc
										");
	}
	
	function load_despute($dropdown_despute)
	{
		return $this->db->query("select dspt_history.history_id,dspt_history.despute_id,dspt_history.status,subj_line,adsl,mobile,iptv,inst_add,name,nric,product,reason,findings,resolution,remarks,rdate as date_recieved,hdate as date_resolved from dspt_info inner join dspt_history on dspt_history.despute_id = dspt_info.despute_id where subj_line = '$dropdown_despute'  order by hdate desc");
	}
	

	
	

	function load_findings_info($dropdown_despute)
	{
		return $this->db->query("
							
									            
										select dspt_history.history_id,dspt_history.despute_id,dspt_users.username as user,dspt_users.user_id,dspt_history.status,subj_line,adsl,mobile,iptv,inst_add,name,nric,product,reason,findings,resolution,remarks,rdate as date_recieved,hdate as date_resolved from dspt_info
										inner join dspt_history on dspt_history.despute_id = dspt_info.despute_id 
										inner join dspt_users on dspt_users.user_id = dspt_history.user_id
										where subj_line = '$dropdown_despute' order by hdate desc limit 0,1
		
								");	
	}
	
	function load_findings($dropdown_despute)
	{
		return $this->db->query("
							
									            
										select dspt_history.history_id,dspt_history.despute_id,dspt_users.username as user,dspt_users.user_id,dspt_history.status,subj_line,adsl,mobile,iptv,inst_add,name,nric,product,reason,findings,resolution,remarks,rdate as date_recieved,hdate as date_resolved from dspt_info
										inner join dspt_history on dspt_history.despute_id = dspt_info.despute_id 
										inner join dspt_users on dspt_users.user_id = dspt_history.user_id
										where subj_line = '$dropdown_despute' AND dspt_history.status != 'NEW'  order by hdate 
		
								");	
	}
	
	
	function load_history($id)
	{
		return $this->db->query("
							
									            
										select dspt_history.history_id,dspt_history.despute_id,dspt_users.username as user,dspt_users.user_id,dspt_history.status,subj_line,dspt_history.location,adsl,mobile,iptv,inst_add,name,nric,product,reason,findings,resolution,remarks,rdate as date_recieved,hdate as date_resolved,target_date from dspt_info
										inner join dspt_history on dspt_history.despute_id = dspt_info.despute_id 
										inner join dspt_users on dspt_users.user_id = dspt_history.user_id
										where dspt_history.despute_id = '$id' order by hdate 
		
								");	
	}
	

	function load_info($id)
	{
		return $this->db->query("
							
									            
										select dspt_history.history_id,dspt_history.despute_id,dspt_users.username as user,dspt_users.user_id,dspt_history.status,subj_line,dspt_info.location,adsl,mobile,iptv,inst_add,name,nric,product,reason,findings,resolution,remarks,rdate as date_recieved,hdate as date_resolved,target_date from dspt_info
										inner join dspt_history on dspt_history.despute_id = dspt_info.despute_id 
										inner join dspt_users on dspt_users.user_id = dspt_history.user_id
										where dspt_history.despute_id = '$id' order by hdate desc limit 0,1
		
								");	
	}
	

	function load_add_dispute($id)
	{
		return $this->db->query("
							
									            
										select dspt_info.despute_id,dspt_users.username as user,dspt_users.user_id,subj_line,adsl,mobile,iptv,inst_add,name,nric,product,reason,rdate as date_recieved,target_date from dspt_info
										inner join dspt_users on dspt_users.user_id = dspt_info.user_id
										where dspt_info.despute_id = '$id' limit 0,1
		
								");	
	}
	

	function view_despute()
	{
		return $this->db->query("
									
										SELECT  a.history_id,c.despute_id,a.user_id,d.username as user,c.subj_line,c.name,c.nric,a.status,c.rdate as date_recieved,a.hdate as date_resolved,c.target_date
										FROM dspt_history a
										INNER JOIN (
										    SELECT despute_id,MAX(history_id) AS history_id
										    FROM dspt_history
										    GROUP BY despute_id
										) b
										    ON a.history_id = b.history_id 
								        INNER JOIN dspt_info c 
								            ON c.despute_id = a.despute_id
								        INNER JOIN dspt_users d
								            ON d.user_id=a.user_id order by a.status desc
								
								");
	
	}
	
	function get_summary()
	{
		return $this->db->query("
		
				SELECT a.status, count(*) as total
				FROM dspt_history a
				INNER JOIN (
				    SELECT despute_id, MAX(history_id) AS historyid
				    FROM dspt_history
				    GROUP BY despute_id
				) b
				    ON a.history_id = b.historyid
				GROUP BY a.status
		
		
		");			
	}
	
	

}
?>