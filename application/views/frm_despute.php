		<?php
			
		echo form_open_multipart(base_url().'user/despute');								
						
		//$info_status=  array(
							     // '' => '',
								  //'PENDING'  =>  'PENDING',
							     // 'RESOLVED'    => 'RESOLVED'
							                  
							       
							// );
							             
	
		$from = array(
								 'name' => 'from',
								 'id'	 => 'from',
								 'value'	 =>  isset($_POST['from']) ? $_POST['from']:'',
								  'size'   => '25'
							 );
							 
		$pass = array(
								 'name' => 'pass',
								 'id'	 => 'pass',
								 'value'	 =>  isset($_POST['pass']) ? $_POST['pass']:'',
								  'size'   => '25'
							 );
							 
		$to = array(
								 'name' => 'to',
								 'id'	 => 'to',
								 'value'	 =>  isset($_POST['to']) ? $_POST['to']:'',
								  'size'   => '25'
							 );
							 
	$userfile = array(
						'name' => 'userfile',
						'id'	 => 'userfile',
						'value'	 =>  isset($_POST['userfile']) ? $_POST['userfile']:'',
						 'size'   => '25'
					);
							
							 
		$subj_line = array(
								 'name' => 'subj_line',
								 'id'	 => 'subj_line',
								 'value'	 =>  isset($_POST['subj_line']) ? $_POST['subj_line']:'',
								  'size'   => '25'
							 );
							 
		$target_date = array(
							'name' => 'target_date',
							'id'	 => 'target_date',
							'value'	 => isset($_POST['target_date']) ? $_POST['target_date']:'',
							'size'   => '25'
					);
					
							
		$adsl = array(
								 'name' => 'adsl',
								 'id'	 => 'adsl',
								 'value'	 => isset($_POST['adsl']) ? $_POST['adsl']:'',
								  'size'   => '25'
							 );
							 
		$mobile= array(
								 'name' => 'mobile',
								 'id'	 => 'mobile',
								 'value'	 => isset($_POST['mobile']) ? $_POST['mobile']:'',
								  'size'   => '25'
							 );
							 
		$iptv= array(
								 'name' => 'iptv',
								 'id'	 => 'iptv',
								 'value'	 => isset($_POST['iptv']) ? $_POST['iptv']:'',
								  'size'   => '25'
							 );
							 
		$inst_add= array(
								 'name' => 'inst_add',
								 'id'	 => 'inst_add',
								 'value'	 => isset($_POST['inst_add']) ? $_POST['inst_add']:'',
								  'size'   => '25'
							 );
							 
		
		$name= array(
								 'name' => 'name',
								 'id'	 => 'name',
								 'value'	 => isset($_POST['inst_add']) ? $_POST['inst_add']:'',
								  'size'   => '25'
							 );
							 				
		
		$nric= array(
							'name' => 'nric',
							'id'	 => 'nric',
							'value'	 => isset($_POST['nric']) ? $_POST['nric']:'',
							'size'   => '25'
					);

		$product= array(
							'name' => 'product',
							'id'	 => 'product',
							'value'	 => isset($_POST['product']) ? $_POST['product']:'',
							'size'   => '25'
					);
					
		
	    $reason=  array(
				              'name'        => 'reason',
				              'id'          => 'reason',
				              'value'       =>  isset($_POST['reason']) ? $_POST['reason']:'',
				              'maxlength'   => '',
				              'size'        => '100',
				              'style'       => 'width:90%',

				   		 );
						
		
		?>
			<table align ="center">
				<tr>
					<td>
					</td>
					<td>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?php echo $msg; ?>
					</td>
				</tr>
			</table>
		<div class= "sec_g"><center><font color = "#FFFFFF" size = "4" >INFORMATIONS</font></center></div>
		<div class = "grp_g">
			<table>
				<tr>
					<td>
						<font color = "RED" size = "5">*</font>From:
					</td>
					<td>
					
						<?php echo form_input($from); ?>
					</td>
				</tr>
				<tr>
					<td>
						<font color = "RED" size = "5">*</font>To:
					</td>
					<td>
						<?php echo form_input($to); ?>
					</td>
				</tr>
				<tr>
					<td>
						Attached:
					</td>
					<td>
						<?php echo form_upload('userfile'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<font color = "RED" size = "5">*</font>Email Password:
					</td>
					<td>
						<?php echo form_password($pass); ?>
					</td>
				</tr>
				<tr>
					<td>
						<font color = "RED" size = "5">*</font>Subject Line
					</td>
					<td>
						<?php echo form_input($subj_line ); ?>
					</td>
				</tr>
				<tr>
					<td>
						<font color = "RED" size = "5">*</font>Target Date
					</td>
					<td>
						<?php echo form_input($target_date); ?>
					</td>
				</tr>
				<tr>
					<td>
						ADSL
					</td>
					<td>
						<?php echo form_input($adsl); ?>
					</td>
				</tr>
				<tr>
					<td>
						Mobile
					</td>
					<td>
						<?php echo form_input($mobile); ?>
					</td>
				</tr>
				<tr>
					<td>
						IPTV
					</td>
					<td>
						<?php echo form_input($iptv); ?>
					</td>
				</tr>
				<tr>
					<td>
						Installation Address
					</td>
					<td>
						<?php echo form_input($inst_add); ?>
					</td>
				</tr>
				<tr>
					<td>
						Name
					</td>
					<td>
						<?php echo form_input($name); ?>
					</td>
				</tr>
				<tr>
					<td>
						NRIC
					</td>
					<td>
						<?php echo form_input($nric); ?>
					</td>
				</tr>
				<tr>
					<td>
						Product
					</td>
					<td>
						<?php echo form_input($product); ?>
					</td>
				</tr>
			</table>
			
			<table>
				<tr>
					<td>
						<font color = "RED" size = "5">*</font>Reason
					</td>
					<td>
						<?php echo form_textarea($reason); ?>
					</td>
				</tr>
				<tr>
					<td>
					</td>
					<td>
						<?php echo form_submit(array('name' => 'add_despute', 'id' => 'add_despute', ), 'Send Dispute'); ?>
					</td>
					<td>
						 <div class = "reset">
						 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						 	<?php echo '<a  href="'.base_url().'user/despute "><font size = 3 color = #000000 >Reset</font><a>'; ?>
						 </div>
					</td>
				</tr>
			</table>
		</div>
					
				
			
		
		
		<?php echo form_close(); ?>
	
	<div align = center>
	<font color="#AA0000" face="Arial">
		<?php echo validation_errors(); ?>
	</font> 
<br>
