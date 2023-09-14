        <?php
        $fld133['username']=$Members->User_Details->username;
        $op133['username']="=,";  

        $list133  = new Init_Table();
        $list133->set_table("main_signup","sl");
        $group33=$list133->search_custom($fld133,$op133,'',array('sl' => 'ASC'));

        foreach($group33 as $key33=>$ptp)
        {
        
        $username=$ptp['username'];
        $mob=$ptp['mob'];
        $mailadres=$ptp['mailadres'];
        $name=$ptp['name'];
          $fnm=$ptp['fnm'];
            $lnm=$ptp['lnm'];
          
        }
        ?>

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $fnm.' '.$lnm; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logoff.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>