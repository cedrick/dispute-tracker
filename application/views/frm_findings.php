<script type="text/javascript">
			$(document).ready(function(){ 
				$(".tablesorter").tablesorter();
			});
</script>
<?php $attributes = array('class' => 'history','id' => 'history','name' => 'history'); ?>	
	<?php
			
	echo form_open(base_url().'user/findings',$attributes);								
						
		$dropdown_despute = array('' => '');
			if($data['get_despute']) {
				$temp = array();
				foreach ($data['get_despute']->result() as $row) {
					$dropdown_despute = $dropdown_despute + array($row->subj_line => $row->subj_line);
					//$dropdown_calldispo = $dropdown_calldispo + $temp;
				}
			}
			$action_js = 'onChange="document.forms[\'history\'].submit();"';
			 $action_select = isset($_POST['dropdown_despute']) ? $_POST['dropdown_despute'] : '';
	
		
		
		
		?>
		<div class = "sec_a">
			<table align = "center">
				<tr>
					<td>
						<font  color = "#FFFFFF" size = "4">Dispute:</font>
					</td>
					<td>
						<?php echo form_dropdown('dropdown_despute',$dropdown_despute,$action_select,$action_js); ?>
					</td>
				</tr>
			</table>	
		</div>
		<div class = "grp_a">		
			<br>
			<?php
			     $x=0;
				 echo "<table class = 'tablesorter' width=800 border=0 align=center cellspacing=1 cellpadding=3  bgcolor=#CC0000>";
				 echo "<thead>";
				 echo"<th>"."<b>"."Dispute_ID"."</b>"."</th>";
				 echo"<th>"."<b>"."Subject Line"."</b>"."</th>";
				 echo"<th>"."<b>"."Name"."</b>"."</th>";
				 echo"<th>"."<b>"."NRIC"."</b>"."</th>";
				 echo"<th>"."<b>"."Product"."</b>"."</th>";
				 echo"<th>"."<b>"."Reason"."</b>"."</th>";
				 echo"<th>"."<b>"."Findings"."</b>"."</th>";
				 echo"<th>"."<b>"."Resolution"."</b>"."</th>";
				 echo"<th>"."<b>"."Remarks"."</b>"."</th>";
				 echo"<th>"."<b>"."Status"."</b>"."</th>";
				 echo"<th>"."<b>"."Date Recieved"."</b>"."</th>";
				 echo"<th>"."<b>"."History Date"."</b>"."</th>";
				 echo "</thead>";
				 echo "<tbody>";
					foreach ($data['load_despute']->result() as $row)
					{
					if($x%2==0)
							{$color=" bgcolor = '#E8E8E8' ";}
							else{$color=" bgcolor='#FFF5EE'";}
						   echo '<tr '.$color.' >';
						   '<td>'.$x++.'</td>';
						   echo '<td>'.$row->despute_id.'</td>';
						   if(strlen($row->subj_line) <= 20 && strlen($row->subj_line)>= 0 )
						   {
						   	echo '<td  class = subj_line >'.'<a target="_blank" href="'.base_url().'user/view_history/'.$row->despute_id.'">'."<font color = #000000>".$row->subj_line."</font>".'<a>'.'</td>';
						   	
						   }else 
						   {
						   	$line_result = $row->subj_line; 
						   	echo '<td class = subj_line >'.'<a target="_blank" href="'.base_url().'user/view_history/'.$row->despute_id.'">'."<font color = #000000>".substr( $line_result ,0,15)."</font>"."<font color = BLUE><b>.......</b></font>".'<a>'.'</td>';
						   }
						  
						   echo '<td>'.$row->name.'</td>';
						   echo '<td>'.$row->nric.'</td>';
						   echo '<td>'.$row->product.'</td>';
						   if(strlen($row->reason) <= 9 && strlen($row->reason) >= 0)
						   {
						   	echo '<td>'.$row->reason.'</td>';
						   }else 
						   {
						   	$reason_result = $row->reason;	
						   	echo '<td>'.substr($reason_result,0,15)."<font color = BLUE><b>.......</b></font>".'</td>';
						   }
						  
						   if(strlen($row->findings) <= 9 && strlen($row->findings) >= 0)
						   {
						   	echo '<td>'.$row->findings.'</td>';
						   }else 
						   {
						   	 $findings_result= $row->findings;
						  	 echo '<td>'.substr($findings_result,0,20)."<font color = BLUE><b>.......</b></font>".'</td>';
						   }
						   
						   if(strlen($row->resolution) <= 9 && strlen($row->resolution) >= 0)
						   {
						   	echo '<td>'.$row->resolution.'</td>';
						   }else 
						   {
						   	$resolution_result= $row->resolution;
						    echo '<td>'.substr($resolution_result,0,20)."<font color = BLUE><b>.......</b></font>".'</td>';
						   }
						   
						  
						  if(strlen($row->remarks) <= 9 && strlen($row->remarks) >= 0)
						   {
						   	echo '<td>'.$row->remarks.'</td>';
						   }else 
						   {
						   	 $remarks_result= $row->remarks;
						     echo '<td>'.substr($remarks_result,0,20)."<font color = BLUE><b>.......</b></font>".'</td>';
						   }
						   
					 	   if($row->status == 'PENDING')
						   {echo '<td>'.'<font color = red>'.$row->status.'</font>'.'</td>';}
						   elseif($row->status == 'RESOLVED'){echo '<td>'.'<font color = blue>'.$row->status.'</font>'.'</td>';}
						   elseif($row->status == 'NEW'){echo '<td>'.'<font color = green>'.$row->status.'</font>'.'</td>';}
						   $date_last = new DateTime($row->date_recieved);
						   echo '<td>'.$date_last->format('M d Y h:i:s').'</td>';
						   if($row->status == 'RESOLVED')
						   {
						   	 $date = new DateTime($row->date_resolved);
						   	echo '<td>'.$date->format('M d Y h:i:s').'</td>';
						   }else 
						   {
						   	echo '<td>'.NULL.'</td>';
						   }
					}
							echo '</tr>';
							echo "</tbody>";
							echo '</table>';
							
			?>
			<br>
		</div>	
		<?php echo form_close(); ?>
<br>
