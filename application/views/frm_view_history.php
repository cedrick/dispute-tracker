<script type="text/javascript">
$(document).ready(function(){
	$("button").click(function(){
    	$(".findings").toggle('slow');
    	return false;
  	});
});
</script>
<?php $attributes = array('class' => 'view_history','id' => 'view_history','name' => 'view_history'); ?>	
	<?php
			
		echo form_open(base_url().'user/view_history'.$this->uri->segment(3),$attributes);								
		
		?>
		
		<table align = "center">
			<tr>
				<td>
				</td>
				<td>
					<font color = "blue"><?php// echo $msg; ?></font>
				</td>
			</tr>
		</table>
		<div class = "sec_h"><center><font color = "#FFFFFF" size = "4" >DISPUTE INFO</font></center></div>	
		<div class = "grp_h">		
			<br>
			<?php
			     echo "<table width=500 border=0 align=center cellspacing=1 bgcolor=#CC0000>";
					foreach ($data['load_info']->result() as $row)
					{
					  
						 	if($row->history_id%2==0)
													{$color=" bgcolor = '#91989E' ";}
													else{$color=" bgcolor='#FFF5EE'";}
						   echo '<tr>';
						   echo"<td bgcolor = #91989E>"."<b>"."Dispute ID"."</b>"."</td>";
						   echo '<td bgcolor = #91989E>'.$row->despute_id.'</td>';
						   echo '<tr>';
						   echo"<td bgcolor = #FFF5EE>"."<b>"."Subject Line"."</b>"."</td>";
						   echo '<td bgcolor = #FFF5EE>'.$row->subj_line.'</td>';
						   echo '<tr>';
						   echo"<td bgcolor = #91989E>"."<b>"."ADSL"."</b>"."</td>";
						   echo '<td bgcolor = #91989E>'.$row->adsl.'</td>';
						   echo '<tr>';
						   echo"<td bgcolor = #FFF5EE>"."<b>"."Mobile"."</b>"."</td>";
						   echo '<td bgcolor = #FFF5EE>'.$row->mobile.'</td>';
						   echo '<tr>';
						   echo"<td bgcolor = #91989E>"."<b>"."IPTV"."</b>"."</td>";
						   echo '<td bgcolor = #91989E>'.$row->iptv.'</td>';
						   echo '<tr>';
						   echo"<td bgcolor = #FFF5EE>"."<b>"."Installation Address"."</b>"."</td>";
						   echo '<td bgcolor = #FFF5EE>'.$row->inst_add.'</td>';
						   echo '<tr>';
						   echo"<td bgcolor = #91989E>"."<b>"."Name"."</b>"."</td>";
						   echo '<td bgcolor = #91989E>'.$row->name.'</td>';
						   echo '<tr>';
						   echo"<td bgcolor = #FFF5EE>"."<b>"."NRIC"."</b>"."</td>";
						   echo '<td bgcolor = #FFF5EE>'.$row->nric.'</td>';
						   echo '<tr>';
						   echo"<td bgcolor = #91989E>"."<b>"."Product"."</b>"."</td>";
						   echo '<td bgcolor = #91989E>'.$row->product.'</td>';
						   echo '<tr>';
						   echo"<td bgcolor = #FFF5EE>"."<b>"."Reason"."</b>"."</td>";
						   echo '<td bgcolor = #FFF5EE>'.$row->reason.'</td>';
						   echo '<tr>';
						   echo"<td bgcolor = #91989E>"."<b>"."Date Recieved"."</b>"."</td>";
							$date_last = new DateTime($row->date_recieved);
						   echo '<td bgcolor = #91989E>'.$date_last->format('M d Y h:i:s').'</td>';
						   echo '<tr>';
						   echo"<td bgcolor = #FFF5EE>"."<b>"."Target Date"."</b>"."</td>";
						   echo '<td bgcolor = #FFF5EE>'.$row->target_date.'</td>';
						    echo '<tr>';
						   if($row->location!=NULL)
						   {
						     echo"<td bgcolor = #FFF5EE>"."<b>"."Recordings"."</b>"."</td>";
						     echo '<td bgcolor = #FFF5EE>'.'<a  target="_blank"  href="'.base_url().'user/download_file/'.$row->location.'">'."Download".'</a>'.'</td>';
						   }else 
						   {
						       echo"<td bgcolor = #FFF5EE>"."<b>"."Recordings"."</b>"."</td>";
							   echo '<td bgcolor = #FFF5EE>'.NULL.'</td>';
						   }
					}
							echo '</tr>';
							echo '</table>';
							
			?>
			<br>
		</div>	
		<br>
		<div class = "sec_i"><center><font color = "#FFFFFF" size = "4" >DISPUTE HISTORY</font></center></div>	
		<div class = "grp_i">		
			<br>
			<?php
					$ctr = 0;
					foreach ($data['load_history']->result() as $row)
					{
					 	$bgcolor = $ctr%2 == 0 ? '#FFFFFF' : '#F1EFE2';
					 	 $ctr++;
						 echo "<table width=500 border=1 align=center cellspacing=1 cellpadding=7 bgcolor=$bgcolor>"; 	
						
						  if($row->status == 'RESOLVED')
						  {
						  	 echo '<tr>';
						     echo"<td width = 15 >"."<b>"."Status"."</b>"."</td>";
						  	 echo '<td><font color = blue>'.$row->status.'</font></td>';
						  }elseif($row->status == 'PENDING')
						  {
						  	 echo '<tr>';
						     echo"<td width = 15 >"."<b>"."Status"."</b>"."</td>";
						  	 echo '<td><font color = red>'.$row->status.'</font></td>';
						  }elseif($row->status == 'NEW')
						  {
						  	 echo '<tr>';
						     echo"<td width = 15 >"."<b>"."Status"."</b>"."</td>";
						  	 echo '<td><font color = green>'.$row->status.'</font></td>';
						  }
						   
						   
					 if($row->status == 'PENDING' || $row->status == 'NEW' )
						  {
						  	// $date = new DateTime($row->date_resolved);  
						  	 // echo '<tr>';
						   	 // echo"<td width = 15  >"."<b>"."History Date"."</b>"."</td>";
						     // echo '<td>'.$date->format('M d Y h:i:s').'</td>';
						  }else
						  {
						  	  $date = new DateTime($row->date_resolved);
						  	  echo '<tr>';
						   	  echo"<td width = 15 >"."<b>"."Date Resolved"."</b>"."</td>";
						      echo '<td>'. $date->format('M d Y h:i:s').'</td>';
						  }
						   echo '<tr>';
						   echo"<td width = 15>"."<b>"."User"."</b>"."</td>";
						   echo '<td>'.$row->user.'</td>';
						   echo '<tr>';
						   echo"<td width = 15 >"."<b>"."Findings"."</b>"."</td>";
						   echo '<td>'.$row->findings.'</td>';
						   echo '<tr>';
						   echo"<td width = 15 >"."<b>"."Resolution"."</b>"."</td>";
						   echo '<td>'.$row->resolution.'</td>';
						   echo '<tr>';
						   echo"<td>"."<b>"."Remarks"."</b>"."</td>";
						   echo '<td>'.$row->remarks.'</td>';
						   echo '</tr>';
						   echo '<tr>';
						   if($row->location!=NULL)
						   {
							   echo"<td bgcolor = #FFF5EE>"."<b>"."Recordings"."</b>"."</td>";
							   echo '<td bgcolor = #FFF5EE>'.'<a  target="_blank"  href="'.base_url().'user/download_file/'.$row->location.'">'."Download".'</a>'.'</td>';
						   }else 
						   {
						       echo"<td bgcolor = #FFF5EE>"."<b>"."Recordings"."</b>"."</td>";
							   echo '<td bgcolor = #FFF5EE>'.NULL.'</td>';
						   }
						   echo '</table>';
						   echo '<br>';
						
					}
							
			?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button>Show Findings Form</button>
		</div>				
		<?php echo form_close(); ?>
		
		
		<?php $attributes = array('class' => 'history','id' => 'history','name' => 'history'); ?>	
	<?php
			echo form_open_multipart(base_url().'user/add_findings/'.$this->uri->segment(3),$attributes);
		   
			$action_js = 'onChange="document.forms[\'history\'].submit();"';
			 $action_select = isset($_POST['dropdown_despute']) ? $_POST['dropdown_despute'] : '';
	
		
		
		
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
							 
		$findings=  array(
				              'name'        => 'findings',
				              'id'          => 'findings',
				              'value'       =>  isset($_POST['findings']) ? $_POST['findings']:'',
				              'maxlength'   => '',
				              'size'        => '100',
				              'style'       => 'width:88%',

				   		 );
						
		$resolution=  array(
				              'name'        => 'resolution',
				              'id'          => 'resolution',
				              'value'       =>  isset($_POST['resolution']) ? $_POST['resolution']:'',
				              'maxlength'   => '',
				              'size'        => '100',
				              'style'       => 'width:90%',

				   		 );
				   		 
		$info_status=  array(
							      '' => '',
								  'PENDING'  =>  'PENDING',
							      'RESOLVED'    => 'RESOLVED'
							                  
							       
							);
	  	$action_status = isset($_POST['info_status']) ? $_POST['info_status'] : '';
							
							             
				   		 
		$remarks=  array(
				              'name'        => 'remarks',
				              'id'          => 'remarks',
				              'value'       =>  isset($_POST['remarks']) ? $_POST['remarks']:'',
				              'maxlength'   => '',
				              'size'        => '100',
				              'style'       => 'width:88%',

				   		 );
		
		?>
		
		
		<br>
		<div class = "findings" style="display: none;">
			<div class = "sec_b"><font color = "#FFFFFF" size = "4"><center>FINDINGS</center></font></div>
			<div class = "grp_b">
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
						
						<?php echo  form_upload($userfile);?>
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
				</table>
				<table cellspacing=1>
					<tr>
						<td>
							<font color = "RED" size = "5">*</font>Status
						</td>
						<td>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<?php echo form_dropdown('info_status',$info_status,$action_status); ?>
						</td>
					</tr>
				</table>
				<table align = "center">
					<tr>
						<td>
							Findings:
						</td>
						<td>
							&nbsp;&nbsp;
							<?php echo form_textarea($findings); ?>
						</td>
					</tr>
				</table>
				<table align = "center">
					<tr>
						<td>
							Resolution:
						</td>
						<td>
						
							<?php echo form_textarea($resolution); ?>
						</td>
					</tr>
				</table>
				<table align = "center">
					<tr>
						<td>
							Remarks:
						</td>
						<td>
							&nbsp;&nbsp;
							<?php echo form_textarea($remarks); ?>
						</td>
					</tr>
				</table>	
				<table align = "center">
					<tr>
						<td>
							<?php echo form_submit(array('name' => 'add_findings', 'id' => 'add_findings', ), 'Add Findings'); ?>
						</td>
					</tr>
				</table>
			</div>
		</div>	
		<br>
					
					
			
		
		
		<?php echo form_close(); ?>
	
	<div align = center>
	<font color="#AA0000" face="Arial">
		<?php echo validation_errors(); ?>
	</font> 
<br>
		
<br>
