<DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>send mail from Localhost </title>
            <link rel="stylesheet" href="style.css">
            <!-- boostrap cdn link -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        </head>
        <body>
            <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 mail-from">
                    <h2 class="text-center">Send Message</h2>
                    <p class="text-cneter"> Send mail to anyone from Localhost.</p>
                    <!-- starting php codes -->
                    <?php 
                    //if user click on the send button
                    if(isset($_POST['send'])){
                        //getting all user enterd data
                       $recipient = $_POST['email'];
                       $subject = $_POST['subject'];
                       $message = $_POST['message'];
                       $sender="from: smartboyganesh143@gmail.com";
                       //if use leave emapty field among one of them
                       if(empty($recipient) || empty($subject) || empty($message)){
                        ?>
                        <!-- display an alert message if one of them field is empty -->
                        <div class="alert alert-danger text-center">
                            <?php echo "All input fields are required!" ?>
                        </div>
                        <?php
                       }else{
                        //php fuction to send mail
                        if(mail($recipient,$subject,$message,$sender)){
                            ?>
                        <!-- display a success message once meil sent succefully -->
                        <div class="alert alert-success text-center">
                            <?php echo "Your mail sent successfully $recipient" ?>
                        </div>
                        <?php
                         }else{
                            ?>
                        <!-- display an alert message if somehow mail can't be sent -->
                        <div class="alert alert-danger text-center">
                            <?php echo "faild whil sending your mail" ?>
                        </div>
                        <?php

                        }
                       }
                    }
                    ?>
                    <!--end of php codes -->
                    <form action="index.php" method="POST" autocomplete="off">
                        <div class="from-group">
                            <input type="email" name="email" class="from-control" placeholder="Recipients">
                        </div>
                        <div class="from-group">
                            <input type="text" name="subject" class="from-control" placeholder="Subject">
                        </div>
                        <div class="from-group">
                           <textarea name="message" cols="30" rows="10" class="from-control textarea" placeholder="Compose Message"></textarea>
                        </div>
                        <div class="from-group">
                            <input type="submit" name="send" class="from-control button btn-primary" value="Send">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </body>
    </html>