		<div class="form-box" id="login-box">

			<div>

				<?php 

                    if($form_validation == "No"){

                    } else {

                        if(count($form_validation)) {

                            echo "<div id=\"login\" class=\"alert alert-danger alert-dismissable\">

                            <i class=\"fa fa-ban\"></i>

                            <button class=\"close\" aria-hidden=\"true\" data-dismiss=\"alert\" type=\"button\">×</button>

                            <b>$form_validation</b>

                            

                            </div>";

                        }

                    }

                ?>

			</div>

           <div class="header" style="background-color:#1A2229;">Login</div>

            <form role="form" method="post">

                <div class="body">
                    <div class="form-group">
                        <input style="border: 1px solid #e7e7e7;" type="text" name="username" class="form-control" placeholder="Username"/>
                    </div>
                    <div class="form-group">
                        <input style="border: 1px solid #e7e7e7;" type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me                    
                    </div>
                </div>

                <div class="footer">                                                               
                    <input type="submit" style="background-color:#00ACAC;color:#FFF;font-size:20px;" class="btn btn-block" value="Sign me in" />
                </div>

            </form>

        </div>