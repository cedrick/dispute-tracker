
<?php
class User extends CI_Controller
{
	function User()
	{
		parent::__construct();
		$this->view_data['base_url'] = base_url();
		$this->load->model('User_model');

	}

	function index()
	{
		redirect('user/login/', 'refresh');
	}

	function login()
	{
	 if($this->session->userdata('username') == '')
	 {
	 	$this->load->library('form_validation');
	 	$this->form_validation->set_rules('username','Username','trim|xss_clean|required');
	 	$this->form_validation->set_rules('password','Password','trim||xss_clean|required');
	 	if($this->form_validation->run() == FALSE)
	 	{
	 		$this->load->view('master_view', array('page' => 'view_login', 'data' => NULL) );
	 	}else
	 	{
	 		$username = $this->input->post('username');
	 		$password = $this->input->post('password');
	 		if($this->User_model->set_login($username,$password)){
	 				
	 			redirect('/user/view_all/', 'refresh');
	 		}
	 		else
	 		{
	 			echo "<font color=#AA0000 face=Arial>Login Error!</font>";
	 			redirect('/user/login/', 'refresh');
	 		}

	 	}
	 }else
	 {
	 	redirect('/user/view_all/', 'refresh');
	 }
	}



	function register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|xss_clean|required|callback_username_not_exist');
		$this->form_validation->set_rules('name','Full Name','trim|xss_clean|required');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|required');
		$this->form_validation->set_rules('password_conf','Confirm Password','trim||xss_clean|required|matches[password]');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('master_view', array('page' => 'view_register', 'data' => NULL) );
		}else
		{
			$username = $this->input->post('username');
			$name= $this->input->post('name');
			$password = $this->input->post('password');
			if($this->User_model->set_register($username,$password,$name))
			{
				$this->session->set_flashdata('insertdata', 'The data was inserted');
				$this->load->view('master_view', array('page' => 'view_register', 'data' => NULL));
			}else
			{
				return FALSE;
			}
				
		}


	}

	function username_not_exist($username)
	{
		$this->form_validation->set_message('username_not_exist','That username already exist choose another username');
		if($this->User_model->check_exist_username($username))
		{
			return FALSE;
		}else
		{
			return TRUE;
		}
	}

	function despute()
	{
		if($this->session->userdata('username') != '')
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('status','Status','xss_clean|');
			$this->form_validation->set_rules('subj_line','Subject Line','xss_clean|required|');
			$this->form_validation->set_rules('target_date','Target Date','xss_clean|required|');
			$this->form_validation->set_rules('adsl','ADSL','xss_clean|');
			$this->form_validation->set_rules('mobile','Mobile','xss_clean|');
			$this->form_validation->set_rules('iptv','IPTV','xss_clean|');
			$this->form_validation->set_rules('inst_add','Installation Address','xss_clean|');
			$this->form_validation->set_rules('name','Name','xss_clean|');
			$this->form_validation->set_rules('nric','NRIC','xss_clean|');
			$this->form_validation->set_rules('product','Product','xss_clean|');
			$this->form_validation->set_rules('reason','Reason','xss_clean|required|');
			$this->form_validation->set_rules('from','From','xss_clean|required|');
			$this->form_validation->set_rules('to','To','xss_clean|required|');
			$this->form_validation->set_rules('pass','Email Password','xss_clean|required|');
			if($this->form_validation->run() == FALSE)
			{

				$this->load->view('master_view', array('page' => 'frm_despute','msg'=>NULL));
			}else
			{
				$user_id = $this->session->userdata('user_id');
				//$info_status = $this->input->post('info_status');
				$subj_line = $this->input->post('subj_line');
				$target_date = $this->input->post('target_date');
				$adsl = $this->input->post('adsl');
				$mobile = $this->input->post('mobile');
				$iptv = $this->input->post('iptv');
				$inst_add = $this->input->post('inst_add');
				$name = $this->input->post('name');
				$nric = $this->input->post('nric');
				$product = $this->input->post('product');
				$reason = $this->input->post('reason');
				$from = $this->input->post('from');
				$pass = $this->input->post('pass');
				$to = $this->input->post('to');
				$attached = $this->input->post('userfile');
				date_default_timezone_set('Asia/Manila');
				$rdate=date('M d Y  h:i:s');

					
				$email_message = NULL;
				$email_message .= "Action:Add Dispute "."\n";
				$email_message .= "Submitted By: ". $this->session->userdata('username')."\n";
				$email_message .= "Subject Line: ".$this->input->post('subj_line')."\n";
				$email_message .= "ADSL: ".$this->input->post('adsl')."\n";
				$email_message .= "IPTV: ".$this->input->post('mobile')."\n";
				$email_message .= "Mobile: ".$this->input->post('iptv')."\n";
				$email_message .= "Installation Address: ".$this->input->post('inst_add')."\n";
				$email_message .= "Customer Name: ".$this->input->post('name')."\n";
				$email_message .= "NRIC: ".$this->input->post('nric')."\n";
				$email_message .= "Product: ".$this->input->post('product')."\n";
				$email_message .= "Latest Status:NEW "."\n";
				$email_message .= "Date Recieved: ".$this->input->post('target_date')."\n";
				$email_message .= "Target Date: ".$rdate."\n";
				$email_message .= "Reason: ".$this->input->post('reason')."\n";
				//$email_message .= "Last Modified: ".$rdate."\n";


				//insert dispute
				if($this->User_model->insert_despute($user_id,$subj_line,$adsl,$mobile,$iptv,$inst_add,$name,$nric,$product,$reason,$target_date))
				{

					//initialize config
					$config = Array(
						
										    'smtp_user' => $from,
										    'smtp_pass' => $pass,
					);
						
					//set email headers
					$this->load->library('email',$config);
					$this->email->from($from,$from);
					$this->email->to($to);
					$this->email->subject('Singtel Dispute Tracker'."-".$subj_line);
					$this->email->message($email_message."\n==========================================");
					
					//test if there's an uploaded file
					$upload = $this->User_model->do_upload();
					if ($upload)
					{
						$this->email->attach($upload['full_path']);
					}
					
					if($this->email->send())
					{

						$msg = "<font color = blue size = 5><b>Record was already sent!</b></font>";
						$this->load->view('master_view', array('page' => 'frm_despute','msg'=>$msg));
							
					}else
					{
						echo $this->email->print_debugger();
					}
						
						
						
				}else
				{
						
					$msg = "<font red = red size = 5><b>Data Error!</b></font>";
					$this->load->view('master_view', array('page' => 'frm_despute','msg'=>$msg));
				}

			}
		}else
		{
			redirect('/user/login/', 'refresh');
		}
	}

	function findings()
	{
		if($this->session->userdata('username') != '')
		{
				

			$dropdown_despute = $this->input->post('dropdown_despute');
			$data = array(
				
					'load_despute' => $this->User_model->load_despute($dropdown_despute),
					'get_despute' => $this->User_model->get_despute()
			);
			$this->load->view('master_view', array('page' => 'frm_findings','data'=>$data));

		}else
		{
			redirect('/user/login/', 'refresh');
		}

	}



	function view_all()
	{
		if($this->session->userdata('username') != '')
		{
			$data=array(
				
							'view_despute' => $this->User_model->view_despute(),
							'get_summary' => $this->User_model->get_summary()
			);
			$this->load->view('master_view', array('page' => 'frm_view_all','data'=>$data));
		}else
		{
			redirect('/user/login/', 'refresh');
		}
	}

	function view_history($id)
	{
		if($this->session->userdata('username') != '')
		{
			$data=array(
				
							'load_info' => $this->User_model->load_info($id),
							'load_history' => $this->User_model->load_history($id)
				
			);
			$this->load->view('master_view', array('page' => 'frm_view_history','data'=>$data));
		}else
		{
			redirect('/user/login/', 'refresh');
		}
	}
	
	//function view_edit($id)
	//{
		//if($this->session->userdata('username') != '')
		//{
			//$data=array(
				
							//'load_info' => $this->User_model->load_info($id),
							//'load_history' => $this->User_model->load_history($id)
				
			//);
			//$this->load->view('master_view', array('page' => 'frm_view_history','data'=>$data));
		//}else
		//{
			//redirect('/user/login/', 'refresh');
		//}
	//}
	






	function add_findings($id)
	{
		if($this->session->userdata('username') != '')
		{
				
			$this->load->library('form_validation');
			$this->form_validation->set_rules('findings','Findings','trim|xss_clean');
			$this->form_validation->set_rules('resolution','Resolution','trim||xss_clean');
			$this->form_validation->set_rules('info_status','Status','trim|xss_clean');
			$this->form_validation->set_rules('remarks','Remarks','trim|xss_clean');
			$this->form_validation->set_rules('from','From','xss_clean|required|');
			$this->form_validation->set_rules('to','To','xss_clean|required|');
			$this->form_validation->set_rules('info_status','Status','xss_clean|required|');
			$this->form_validation->set_rules('pass','Email Password','xss_clean|required|');
			if($this->form_validation->run() == FALSE)
			{
				$data = array(
					
								 'load_history' => $this->User_model->load_history($id),
								 'load_info' => $this->User_model->load_info($id),
								 'load_add_dispute' => $this->User_model->load_add_dispute($id)
				);
				$this->load->view('master_view', array('page' => 'frm_view_history','data'=>$data,'msg' => NULL));
			}else
			{
				$findings = $this->input->post('findings');
				$resolution = $this->input->post('resolution');
				$info_status = $this->input->post('info_status');
				$remarks = $this->input->post('remarks');
				$user_id = $this->session->userdata('user_id');
				$call_msg =$this->session->unset_userdata('msg');
				$from = $this->input->post('from');
				$pass = $this->input->post('pass');
				$to = $this->input->post('to');
				$attached = $this->input->post('userfile');
				date_default_timezone_set('Asia/Manila');
				$rdate=date('M d Y h:i:s');
				$data = array(
					
					 'load_history' => $this->User_model->load_history($id),
					 'load_info' => $this->User_model->load_info($id),
					 'load_add_dispute' => $this->User_model->load_add_dispute($id)
				);
					
					
				//insert findings
				if(isset($_POST['add_findings']))
				{
					//try to insert in DB
					if($this->User_model->input_findings($id,$findings,$resolution,$info_status,$remarks,$user_id,$rdate))
					{
						$email_findings = NULL;
						//display findings
						foreach($data['load_history']->result() as $row)
						{
							$email_findings .= "Action:Add Findings "."\n\n";
							$email_findings .= "User: ".$row->user."\n\n";
							$email_findings .= "Findings: ".$row->findings."\n\n";
							$email_findings .= "Resolution: ".$row->resolution."\n\n";
							$email_findings.= "Status: ".$row->status."\n\n";
							if($row->status == 'RESOLVED')
							{
								$date = new DateTime($row->date_resolved);
								$date_last = new DateTime($row->date_recieved);
								$email_findings.= "Date Resolved: ".$date->format('M d Y')."\n\n";
								$email_findings.= "Last Modified: ".$date_last ->format('M d Y h:i:s')."\n\n";
							}else
							{
								$date_last = new DateTime($row->date_recieved);
								$email_findings.= "Date: ".$date_last->format('M d Y h:i:s')."\n\n";
							}
							$email_findings.= "======================================\n";
						}
						
						//Display Add Findings form
						$email_latest = NULL;
						$email_latest.= "Action:Add Findings "."\n\n";
						$email_latest .= "User: ".$this->session->userdata('username')."\n\n";
						$email_latest .= "Findings: ".$findings = $this->input->post('findings')."\n\n";
						$email_latest .= "Resolution: ".$resolution = $this->input->post('resolution')."\n\n";
						$email_latest.= "Status: ".$this->input->post('info_status')."\n\n";
						
						if($this->input->post('info_status') == 'RESOLVED')
						{
							$email_latest.= "Date Resolved: ".$rdate."\n\n";
							$email_latest.= "Date: ".$rdate."\n\n";
						}else
						{
							$email_latest.= "Date: ".$rdate."\n\n";
						}

						$email_latest.= "======================================\n";
							
						//display dispute info
						foreach($data['load_add_dispute']->result() as $row)
						{
							$email_message = NULL;
							$email_message .= "Action:Add Dispute "."\n";
							$email_message .= "Submitted By: ".$row->user."\n";
							$email_message .= "Subject Line: ".$row->subj_line."\n";
							$email_message .= "ADSL: ".$row->adsl."\n";
							$email_message .= "IPTV: ".$row->mobile."\n";
							$email_message .= "Mobile: ".$row->iptv."\n";
							$email_message .= "Installation Address: ".$row->inst_add."\n";
							$email_message .= "Customer Name: ".$row->name."\n";
							$email_message .= "NRIC: ".$row->nric."\n";
							$email_message .= "Product: ".$row->product."\n";
							$email_message .= "Status:".$this->input->post('info_status')."\n";
							if($this->input->post('info_status')== 'RESOLVED')
							{
								$date = new DateTime($row->date_recieved);
								$email_message .= "Date Recieved: ".$date->format('M d Y h:i:s')."\n";
								$email_message .= "Date Resolved: ".$rdate."\n";
							}else
							{
								$date = new DateTime($row->date_recieved);
								$email_message .= "Date Recieved: ".$date->format('M d Y h:i:s')."\n";
								$email_message .= "Date Resolved: ".NULL."\n";
							}
							$email_message .= "Target Date: ".$row->target_date."\n";
							$email_message .= "Reason: ".$row->reason."\n";

						}
						
						//email section
						
						//config
						$config = Array(
							'smtp_user' => $from,
							'smtp_pass' => $pass,
						);
						//load email lib
						$this->load->library('email',$config);
						
						//set email headers
						$this->email->from($from,$from);
						$this->email->to($to);
						$this->email->subject('Singtel Dispute Tracker'." ".$row->subj_line);
						$this->email->message($email_message."\n"."================================"."\n".$email_findings."\n".$email_latest);
						
						//test if there's an uploaded file
						$upload = $this->User_model->do_upload();
						if ($upload)
						{
							//echo $upload['full_path'];
							$this->email->attach($upload['full_path']);
						}
						
						//try to send email
						if($this->email->send())
						{
							$msg = "<font color = blue size = 3>Record was already sent!</font>";
							$this->session->set_userdata('msg',$msg );
							redirect('/user/view_history/'.$id,'refresh');

						}else
						{
							//redirect('/user/view_history/'.$id,'refresh');
							echo $this->email->print_debugger();

						}
					}else
					{
						$msg = "<font color = red>Record closed!</font>";
						$this->session->set_userdata('msg',$msg );
						//redirect('/user/view_history/'.$id,'refresh');
					}
				}
				$msg = $this->session->userdata('msg');
				//redirect('/user/view_history/'.$id,'refresh');
					
			}

		}else
		{
			redirect('/user/login/', 'refresh');
		}
	}
	
	function download_file($id)
	{
		if($this->User_model->download($id))
		{
			//redirect('/user/view_history/'.$id,'refresh');
		}else 
		{
			echo "Download Failed!";
		}
	}


}



?>