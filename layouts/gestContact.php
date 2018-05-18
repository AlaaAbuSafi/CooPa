<!-- Contact Us -->
		<div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">                   	
                        <div class="modal-header" style="text-align:center">
                            <h2>تابعنا</h2>
								<p class="lead">أرسل لنا عنوان بريدك الإلكتروني لتصلك كل إعلاناتنا</p>
									<div class="row">
									<ul class="list-inline">
										<li><a href="#"><i class="fa fa-facebook fa-fw fa-2x"></i></a></li>
										<li><a href="#" target="_blank" class="text-muted"><i class="fa fa-google-plus fa-fw fa-2x"></i></a></li>
										<li><a href="#" target="_blank" class="text-muted"><i class="fa fa-twitter fa-fw fa-2x"></i></a></li>
										<li><a href="#" class="text-muted"><i class="fa fa-instagram fa-fw fa-2x"></i></a></li>
									</ul>
								</div>
                        </div>
                        <div class="modal-body">
                            <form role="form" action="index.php" method="post" id="reused_form" >

                                <div class="form-group" style="text-align:right;">
                                    <label  for="name_field">من فضلك إدخل إسمك</label>
                                    <input type="text" class="form-control" id="name" name="name" required maxlength="50" placeholder="الإسم *" value="" style="text-align:right;">
                                </div>
                                <div class="form-group" style="text-align:right;">
                                    <label for="email_field">من فضلك أدخل بريدك الإلكتروني </label>
                                    <input type="email" class="form-control" id="phone" name="email" required maxlength="20" placeholder="البريد الإلكتروني *" value="" style="text-align:right;">
                                </div>
                                                                
                                <input type="submit" name="conn_message2" class="display-block" style="margin: 0 auto;" value="&larr; أرسـل لـنـا">
                            </form>
                            
                        </div>
                    </div>
                </div>
        </div>
        <!-- End Contact Us --> 

<?php
    require_once "./users.php";
        $errors = array(); 

    if (isset($_POST['conn_message2'])) {
        require './connect.php';

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        if (empty($name)) {
            array_push($errors, "Name is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        
        if (count($errors) == 0) {
            $user = new User();
            $results = $user->gestContact_us($name,$email);
            
            if ($results) {
                //header('location: http://localhost/dashboard/OOP/index.php');
            }
            else{
                array_push($errors, "Wrong inputs");
            }   
        }
        else{
            //header('location: http://localhost/dashboard/OOP/contact.php');
        }
    }
?>

