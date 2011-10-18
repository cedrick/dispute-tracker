 <script type="text/javascript">
			$(document).ready(function(){ 
				$(".tablesorter").tablesorter();
			});
</script>

<?php $attributes = array('class' => 'view_all','id' => 'view_all','name' => 'view_all'); ?>	
	<?php
			
		echo form_open(base_url().'user/view_all',$attributes);								
		
		?>
		
		<div class = "sec_e">&nbsp;<font color = "BLACK" size = "4" >DISPUTE SUMMARY</font><br><font color = "#FFFFFF" size = "4" >
				<?php 
					
				foreach ($data['get_summary']->result() as $row)
					{
						echo '&nbsp'.$row->status.'-'.$row->total.'<br>';
						
					}
				?>
		
		
		</font></div>	
		<div class = "grp_e">		
			<br>
			<?php
			     $x=0;
				 echo "<table class = 'tablesorter' width=1000 border=0 align=center cellspacing=1 cellpadding=3>";
				 echo "<thead>";
				 echo"<th>"."<b>"."Subject Line"."</b>"."</th>";
				 echo"<th>"."<b>"."Customer Name"."</b>"."</th>";
				 echo"<th>"."<b>"."NRIC"."</b>"."</th>";
				 echo"<th>"."<b>"."Status"."</b>"."</th>";
				 echo"<th>"."<b>"."Date Recieved"."</b>"."</th>";
				 echo"<th>"."<b>"."Target Date"."</b>"."</th>";
				 echo"<th>"."<b>"."User"."</b>"."</th>";
				// echo"<th>"."<b>"."Edit"."</b>"."</th>";
				 echo "</thead>";
				 echo "<tbody>";
				 
					foreach ($data['view_despute']->result() as $row)
					{
					  
						 	
						
						if($x%2==0)
						{$color=" bgcolor = '#E8E8E8' ";}
						else{$color=" bgcolor='#FFF5EE'";}
						   echo '<tr '.$color.' >';
						   '<td>'.$x++.'</td>';
					 	  if(strlen($row->subj_line) <= 50 && strlen($row->subj_line)>= 0 )
						   {
						   	echo '<td class = subj_line >'.'<a target="_blank" href="'.base_url().'user/view_history/'.$row->despute_id.'">'."<font color = #000000 size = 3 >".$row->subj_line."</font>".'<a>'.'</td>';
						   	
						   }else 
						   {
						   	$line_result = $row->subj_line; 
						   	echo '<td class = subj_line >'.'<a target="_blank" href="'.base_url().'user/view_history/'.$row->despute_id.'">'."<font color = #000000 size = 3 >".substr( $line_result ,0,30)."</font>"."<font color = BLUE><b>.......</b></font>".'<a>'.'</td>';
						   }
						   echo '<td>'.$row->name.'</td>';
						   echo '<td>'.$row->nric.'</td>';
						   if($row->status == 'PENDING')
						   {echo '<td>'.'<font color = red>'.$row->status.'</font>'.'</td>';}
						   elseif($row->status == 'RESOLVED'){echo '<td>'.'<font color = blue>'.$row->status.'</font>'.'</td>';}
						   elseif($row->status == 'NEW'){echo '<td>'.'<font color = green>'.$row->status.'</font>'.'</td>';}
						   $date_last = new DateTime($row->date_recieved);
						   echo '<td>'.$date_last->format('M d Y').'</td>';
						   echo '<td>'.$row->target_date.'</td>';
						   echo '<td>'.$row->user.'</td>';
						   //echo '<td class = subj_line >'.'<a target="_blank" href="'.base_url().'user/view_history/'.$row->despute_id.'">'."<font color = BLUE size = 3 >"."Edit"."</font>".'<a>'.'</td>';
						   
					}
							echo '</tr>';
							echo "</tbody>";
							echo '</table>';
							
			?>
			<br>
		</div>	
		<?php echo form_close(); ?>
<br>
