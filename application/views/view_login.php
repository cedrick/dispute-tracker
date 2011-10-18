<?php


	echo form_open(base_url() . 'user/login');
	$username = array(
										'name' => 'username',
										'id'	 => 'username',
										'value'	 => '',
										'size'   => '20'
									);
									
	
									
 $password = array(
									 'name' => 'password',
									 'id'	 => 'password',
									 'value'	 => '',
									 'size'   => '20'
									);


?>
<div class="login" style="margin-left:400px;">
<ul style="list-style:none;">
<div class="top" align="center" style="border-style:solid;  border-width:1px; border-color:#000000;"><font color="#FFFFFF"  size = "3"><b>Login</b></font></div>
<div class="logback" style="border-style:solid;  border-width:1px; border-color:#000000;">
<div class="welcome" align="center">
  <font color="#9DA5A2" face = "Arial" >
    Welcome to NSI SINGTEL DISPUTE TRACKER. To continue, please input your username and password. 
  </font>
</div>
<br />
	<div  align="center" style=" background-color:#C7CAC9; height:85px; width:350px; margin-left:7px; -moz-border-radius:15px; border-radius:15px;">
		<table align="center">
		
		  <tr>
		    <td>
		      <label><font face="Arial">Username</font></label>
		    </td>
		    <td>
		      <li>
		          <div>
		            <?php echo form_input($username); ?>
		          </div>
		       </li>
		    </td>
		  </tr>
		  <tr>
		    <td>
		      <label><font face="Arial">Password</font></label>
		    </td>
		    <td>
		     <li>
		        <div>
		          <?php echo form_password($password); ?>
		        </div>
		   		</li>
		    </td>
		  </tr>
		  <tr>
		  <td>
		  </td>
		    <td>  
		       <li>
		        <div>
		          <?php echo form_submit(array('name' => 'submit_name', 'id' => 'submit_id', ), 'Login'); ?>
		           <font color="#AA0000" face="Arial">
		            <?php echo validation_errors(); ?>
		          </font>
		        </div>
		     	</li>
		     </td>
		   </tr>
		</table>
	</div>
</div>
</ul>
</div>
      
<?php echo form_close(); ?>

<br /><br />