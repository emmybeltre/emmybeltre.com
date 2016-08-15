<?php



        if(isset($_POST['contact'])) {

		$name     = $_POST['name'];
        $email    = $_POST['email'];
        $projects   = $_POST['projects'];
        $comments = $_POST['comments'];




         $address = "emmybeltredesign@gmail.com";



         $e_subject = 'EBD Site Contact Form';


         // Configuration option.
		 // You can change this if you feel that you need to.
		 // Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

		 $e_body = "$name has contacted you.\r\n\n";

		 // Configuration option.
       	 // RIf you active phone number, swap the tags of $e-reply below to include phone number.
		 $e_reply = "You can contact $name via email, $email  and for project \"$projects\"\r\n\n";

         $e_content = "The left the following message:\r\n\n$comments\r\n\n";
		 //$e_reply = "You can contact $name via email, $email";

         $msg = $e_body . $e_reply . $e_content;

         mail($address, $e_subject, $msg, "From:EBD Site Contact Form<noreply@emmybeltre.com>\r\nReply-To: noreply@emmybeltre.com\r\nReturn-Path: noreply@emmybeltre.com\r\n");


	   	 header( 'Location: index.php?thanks' ) ;

	}

?>