  <div class="header_top">
  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo '<img src="'.base_url().'template/images/head.png" />'; ?>
  </div>
 
  	 <div class = "logout"><?php echo '<a href="'.base_url().'record/log_out">'."<font color=#FFFFFF  size=4>"."Logout"."</font>".'</a>' ?> </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <div class = "name"><?php  echo "<font color=#FFFFFF face=Arial size=4>"."<b>". $this->session->userdata('username')."</b>"."</font>" ?></div>
 
  <div class = "menu1">
  	<?php echo '<a href="'.base_url().'user/view_all">'."<font color=#FFFFFF  size=4>"."Main"."</font>".'</a>' ?> 
  </div>
  <div class = "menu2">
    	<?php echo '<a href="'.base_url().'user/findings">'."<font color=#FFFFFF  size=4>"."Pending"."</font>".'</a>' ?> 
  </div>
  <div class = "menu3">
    	<?php echo '<a href="'.base_url().'user/despute">'."<font color=#FFFFFF  size=4>"."Dispute"."</font>".'</a>' ?> 
  </div>
