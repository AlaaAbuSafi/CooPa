<!-- Contact Us -->
		<div id="myModal2" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">                   	
                        <div class="modal-header" style="text-align:center">
                            <h2>تواصل معـنا</h2>
								<p class="lead">هل تبحث عن شيء أو لديك اقتراحات ؟
									<br>! اخبرنا عنها</p>
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
                                    <label for="email_field">من فضلك أدخل رقم الهاتف </label>
                                    <input type="number" class="form-control" id="phone" name="phone" required maxlength="20" placeholder="رقم الهاتف *" value="" style="text-align:right;">
                                </div>
                                <div class="form-group" style="text-align:right;">
                                    <label for="comment_field">نص الرسالة</label>
                                    <textarea class="form-control" type="textarea" name="message" required id="message" placeholder="الرسالة" maxlength="600" rows="4" style="text-align:right;"></textarea>
                                </div>                                
                                <input type="submit" name="conn_message1" class="display-block" style="margin: 0 auto;" value="&larr; أرسـل لـنـا">
                            </form>
                            
                        </div>
                    </div>
                </div>
        </div>
        <!-- End Contact Us --> 

<?php
    require_once "./users.php";
        $errors = array(); 

    if (isset($_POST['conn_message1'])) {
        require './connect.php';

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        if (empty($name)) {
            array_push($errors, "Name is required");
        }
        if (empty($phone)) {
            array_push($errors, "Phone is required");
        }
        if (empty($message)) {
            array_push($errors, "Message is required");
        }
        if (!empty($phone)) {
            if (!is_numeric($phone)) {
               array_push($errors, "Wrong number"); 
            }
        }
        
        if (count($errors) == 0) {
            $date = date("Y.m.d");
            $user = new User();
            $results = $user->contact_us($name,$phone,$message,$date);
            
            if ($results) {
                //header('location: http://localhost/dashboard/OOP/member.php');
            }
            else{
                array_push($errors, "Wrong username/password combination");
            }   
        }
        else{
            //header('location: http://localhost/dashboard/OOP/contact.php');
        }
    }
?>

