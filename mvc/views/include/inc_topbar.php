<!-- header logo: style can be found in header.less -->

<header class="header">

    <a href="<?php echo base_url('dashboard/index'); ?>" class="logo">

        <!-- Add the class icon to your logo image or logo icon to add the margining -->

        <?php if(count($siteinfo)) { echo $siteinfo->sitename; } ?>

    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top" role="navigation">

        <!-- Sidebar toggle button-->

        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

        </a>

        <div class="navbar-right">

            <ul class="nav navbar-nav">

                <!-- Notifications: style can be found in dropdown.less -->

                <li class="dropdown notifications-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <i class="fa fa-warning"></i>

                        <?php 

                            if(count($alert) > 0) {

                                echo "<span class='label label-warning'>".count($alert)."</span>";

                            } 

                        ?>

                    </a>

                    <ul class="dropdown-menu">

                        <li class="header">You have <?=count($alert);?> notifications</li>

                        <li>

                            <!-- inner menu: contains the actual data -->

                        <?php

                            if(count($alert) > 0) {

                                $title = "";                                        

                                echo "<ul class='menu'>

                                    <li>";

                                        foreach ($alert as $alt) {

                                            if(strlen($alt->title) > 16) {

                                               $title = substr($alt->title, 0,16). ".."; 

                                            } else {

                                                $title = $alt->title;

                                            }



                                            echo    "<a href=".base_url("notice/view")."/".$alt->noticeID.">

                                                        <i class='ion ion-ios7-people info'></i>" . $title." 

                                                    </a>";

                                        } 



                                    echo"</li>

                                </ul>";

                            }

                        ?>                            

                        </li>

                        <li class="footer"><a href="<?=base_url("notice/index");?>">View all</a></li>

                    </ul>

                </li>

                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <!-- <i class="glyphicon glyphicon-user"></i> -->
                        <?php 
                            if($this->session->userdata('photo') != "") {
                                $array = array(

                                    "src" => base_url("uploads/images/".$this->session->userdata('photo')),
                                    "class" => "user-logo"
                                );
                                echo img($array);
                            } else {
                                $array = array(
                                    "src" => base_url("uploads/images/default.png"),
                                    "class" => "user-logo"
                                );
                                echo img($array);

                            }

                        ?> 

                        <span>

                            <?php

                                $name = $this->session->userdata('name');

                                if(strlen($name) > 11) {

                                   echo substr($name, 0,11). ".."; 

                                } else {

                                    echo $name;

                                }

                            ?> 

                            <i class="caret"></i>

                        </span>

                    </a>

                    <ul class="dropdown-menu">

                        <!-- User image -->

                        <!-- Menu Body -->

                        <li class="user-body">
                            <?php if ($this->session->userdata('usertype') == 'Admin') { ?>
                            <div class="col-xs-6 text-center">
                                
                                <a href="#">
                                    <div><i class="fa fa-gear"></i></div>
                                    Settings
                                </a>
                                
                            </div>
                            <?php } ?>
                            <?php if ($this->session->userdata('usertype') == 'Customer' || $this->session->userdata('usertype') == 'Employer'): ?>
                            <div class="col-xs-6 text-center">                                
                                <a href="<?=base_url('profile');?>">
                                <div><i class="fa fa-briefcase"></i></div>
                                    Profile
                                </a>                                
                            </div>
                            <?php endif ?>
                            <div class="col-xs-6 text-center">
                                <a href="<?=base_url('login/change_password');?>">
                                    <div><i class="fa fa-lock"></i></div>
                                    Password
                                </a>
                            </div>

                        </li>

                        <!-- Menu Footer-->

                        <li class="user-footer">

                            <div class="pull-right">

                                <a href="<?=base_url("login/logout")?>" class="btn btn-ini btn-flat">Sign out</a>

                            </div>

                        </li>

                    </ul>

                </li>

            </ul>

        </div>

    </nav>

</header>