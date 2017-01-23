<div class="wrapper row-offcanvas row-offcanvas-left">

            <!-- Left side column. contains the logo and sidebar -->

            <aside class="left-side sidebar-offcanvas">

                <!-- sidebar: style can be found in sidebar.less -->

                <section class="sidebar">

                    <!-- Sidebar user panel -->

                    <div class="user-panel">

                        <div class="pull-left image">

                            <?php 

                                $usertype = $this->session->userdata("usertype");
                                $image = $this->session->userdata("photo");
                                if($image != "") {

                                    $array = array(

                                        "src" => base_url("uploads/images/$image"),

                                        "class" => "img-circle"

                                    );

                                    echo img($array);

                                } else {

                                    $array = array(

                                        "src" => base_url("uploads/images/default.png"),

                                        "class" => "img-circle"

                                    );

                                    echo img($array);

                                }

                            ?>                       

                        </div>

                        <div class="pull-left info">

                            <p> 

                            <?php

                                $name = $this->session->userdata("name");

                                if(strlen($name) > 11) {

                                   $name = substr($name, 0,11). ".."; 

                                }



                                echo "<span class=\"fa fa-hand-o-right\"></span> Hello, ". $name;

                            ?>

                            </p>



                            <a href="#" class="text-aqua"><?php  echo $this->session->userdata("usertype"); ?></a>

                        </div>

                    </div>

                    <!-- search form -->

                    <form action="#" method="get" class="sidebar-form">

                        <div class="input-group">

                            <input type="text" name="q" class="form-control" placeholder="Search..."/>

                            <span class="input-group-btn">

                                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>

                            </span>

                        </div>

                    </form>

                    <!-- /.search form -->

                    <!-- sidebar menu: : style can be found in sidebar.less -->

                    <ul class="sidebar-menu">
                        <?php if ($this->session->userdata('usertype')=='Admin' || $this->session->userdata('usertype')=='Project manager'): ?>
                        <li id="dashboard">
                            <?php
                                echo anchor('dashboard/index', '<i class="fa fa-laptop"></i> Dashboard');
                            ?>
                        </li>
                        
                        <li id="user">
                            <?php
                                echo anchor('user/index', '<i class="icon icon-empolee"></i> Users');
                            ?>
                        </li>                        
                        <li id="grouptasks">
                            <?php
                                echo anchor('grouptasks/index', '<i class="fa fa-cloud-download"></i> Group Tasks');
                            ?>
                        </li>
                        <?php endif ?>
                         <li id="timetracker">
                            <?php
                                echo anchor('timetracker/index', '<i class="fa fa-cloud-download"></i> Time Tracker');
                            ?>
                        </li>

                        <li id="notice">
                            <?php
                                echo anchor('notice/index', '<i class="fa fa-folder-open"></i> Notice');
                            ?>
                        </li>
                        <li id="project">
                            <?php
                                echo anchor('project/index', '<i class="fa fa-folder-open"></i> Projets');
                            ?>
                        </li>


                    </ul>

                </section>

                <!-- /.sidebar -->

            </aside>