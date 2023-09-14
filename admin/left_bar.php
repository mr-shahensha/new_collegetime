      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
		
			<?php
			if($Members->User_Details->userlevel<0)
{
					$lb_mdtl  = new Init_Table();
					$lb_mdtl->set_table("main_menu","sl");
					//$menus=$lb_mdtl->search(array('rmsl'=>'0','stat'=>'0'),array('ordr' => 'ASC'));
					
                    $lb_fld['rmsl']=0;
                    $lb_op['rmsl']="=,AND";
                    $lb_fld['stat']=0;
                    $lb_op['stat']="=,AND (";
					
                    $lb_fld['isall']=0;
                    $lb_op['isall']="=,OR";
                    $lb_fld['user']=$Members->User_Details->username;
                    $lb_op['user']="FIND_IN_SET, )";
					
					$menus=$lb_mdtl->search_custom($lb_fld,$lb_op,'',array('ordr' => 'ASC'));
					foreach($menus as $menu) {
									
					$lb_fld1['rmsl']=$menu["sl"];
                    $lb_op1['rmsl']="=,AND";
                    $lb_fld1['stat']=0;
                    $lb_op1['stat']="=,AND (";
					
                    $lb_fld1['isall']=0;
                    $lb_op1['isall']="=,OR";
                    $lb_fld1['user']=$Members->User_Details->username;
                    $lb_op1['user']="FIND_IN_SET, )";
					
					
					$smenus=$lb_mdtl->search_custom($lb_fld1,$lb_op1,'',array('ordr' => 'ASC'));	
					if(sizeof($smenus)>0)
					{
						$eurl="?pnm=".base64_encode($menu["mnm"]);
						if($menu["adlvl"]!="")
						{
							$eurl.="&vl=".base64_encode($menu["adlvl"]);
						}
					?> 
		
        <li class="treeview">
          <a href="#">
            <i class="fa <?php echo $menu['icon'];?>"></i> <span><?php echo $menu["mnm"];?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		  <?php
						
					foreach($smenus as $smenu) {
						$seurl="?pnm=".base64_encode($smenu["mnm"]);
						if($smenu["adlvl"]!="")
						{
							$seurl.="&vl=".base64_encode($smenu["adlvl"]);
						}
					?>
            
			
			
            <li><a href="<?php echo $smenu["page"].$seurl;?>"><i class="fa fa-circle-o"></i> <?php echo $smenu["mnm"];?></a></li>
			<?php			
					}
					?>
					
				
          </ul>
        </li>
		
		
		
		
		<?php			
					}
					else
					{
						$eurl="?pnm=".base64_encode($menu["mnm"]);
						if($menu["adlvl"]!="")
						{
							$eurl.="&vl=".base64_encode($menu["adlvl"]);
						}
						if($menu["ordr"]==1)
						{
							$cls="active";
						}
						else
						{
							$cls="";
						}
					?>				
					
		
        <li class=" <?php echo $cls;?>">
          <a href="<?php echo $menu["page"].$eurl;?>">
            <i class="fa <?php echo $menu['icon'];?>"></i> <span><?php echo $menu["mnm"];?></span>
         
          </a>
        </li>
		<?php
					}
						
					}
}
		

?>


	
				 
      </ul>