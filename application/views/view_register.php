<?php

	echo form_open(base_url() . 'user/register');
	$username = array(
										'name' => 'username',
										'id'	 => 'username',
										'value'	 => ''
									);
									
	$name = array(
										'name' => 'name',
										'id'	 => 'name',
										'value'	 => ''
									);
									
									
	 $password = array(
										 'name' => 'password',
										 'id'	 => 'password',
										 'value'	 => ''
										);
									
	 $password_conf = array(
											'name' => 'password_conf',
											'id'	 => 'password_conf',
											'value'	 => ''
										);
									

?>
<div class="login" style="margin-left:400px;">
<ul style="list-style:none;">
<div class="top" align="center" style="border-style:solid;  border-width:1px; border-color:#000000; background-color:#94CAE4; height:20px; width:366px;"><font color="#FFFFFF"  size = "3"><b>User Registration</b></font></div>
<div class="logback" style="border-style:solid;  border-width:1px; border-color:#000000; background-color:#DEE6ED; height:220px;width:366px;">
<div class="welcome" align = center>
  <font color="#9DA5A2" face = "Arial" >
    Welcome to NSI SINGTEL DISPUTE TRACKER.To Register, please fill up this form. 
  </font>
</div>
<br />
<div  align="center" style=" background-color:#C7CAC9; height:120px; width:350px; margin-left:7px; -moz-border-radius:15px; border-radius:15px; ">
<table align="center">

  <tr>
      <td>
        <label><font face="Arial">Username:</font></label>
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
        <label><font face="Arial">Full Name:</font></label>
      </td>
      <td>
        <li>
            <div>
              <?php echo form_input($name); ?>
            </div>
         </li>
      </td>
  </tr>
  <tr>
    <td>
      <label><font face="Arial">Password:</font></label>
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
    	 <label><font face="Arial">Confirm&nbsp;Password:</font></label>
    </td>
    <td>
      <li>
          <div>
            <?php echo form_password($password_conf); ?>
          </div>
        </li>
    </td>
  </tr>
  <tr>
    <td>  
       <br>
       <li>
        <div>
          <?php echo form_submit(array('name' => 'submit_name', 'id' => 'submit_id', ), 'Register'); ?>
        </div>
     	</li>
     </td>
   </tr>
</table>
</div>
</div>
</ul>
</div>
<br />
<div align="center"> 
 <font color="#AA0000" face="Arial">
  <?php echo validation_errors(); ?>
  <?php echo $this->session->flashdata('insertdata'); ?>
 </font>    
</div>
<?php echo form_close(); ?>
<br /><br />