        <header class="header">
           
	       <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top navbar-default navbar-theme" role="navigation">
                <!-- Sidebar toggle button-->
               <!-- <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a> -->

   <a class="navbar-brand" href="#">Doña Montserrat Lopez Memorial High School Enrolement System</a>

                <div class="navbar-right">
					
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $user_name; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
								

                                <li class="user-footer">
									<?php if($user_type != 'enrol'){ ?>
                                    <div class="pull-left">
                                        <a href="page.php?page=user_account" class="btn btn-default btn-flat"><i class="fa fa-user"></i> User Account</a>
                                    </div>
									<?php } ?>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>