		<?php
				$mail = strip_tags($_POST['mail']);
				$checkRobot = strip_tags($_POST['checkRobot']);

				// text to send
				$texte = "Bonjour,<br /><br />";
				$texte = $texte . "Message de Green Fox<br />";
				$texte = $texte . "Vous avez indiqué vouloir souscrire à notre Newsletter :<br />";
				$texte = $texte . "Email :  $mail<br /><br />";
				$texte = $texte . "Souscription Newsletter : $newsletter<br /><br />";
				$texte = $texte . "Message automatique, merci de ne pas y répondre...";

				$texte = stripslashes($texte);

				// Recipient and subject of the message
				$destinataire = "jerome.bombal@free.fr"; // input your email here
				$objet = "Message de Green Fox"; // input your domain name here

				// Headers
	            $headers = array(
                    'Content-type' => 'text/html',
                    'From' => 'jerome.bombal@free.fr', // input your email from here
                    'X-Mailer' => 'PHP/' . phpversion()
                );

				// Send the message then return data to current page with ajax
				if ($checkRobot == 7) {
					$conf = ini_set('mail', 'jerome.bombal@free.fr'); // update your information here
					$sending_ok = mail($destinataire, $objet, $texte, $headers);
					if ($sending_ok) {
							echo "<p class=\"hardLight\">Merci de votre message !<br /><br />Nous y répondrons bientôt</p>";
						}
					else {
							echo "<p class=\"hardLight\">Problême inattendu rencontré...</p>";
						}

				} else {
					echo "<p class=\"hardLight\">Problême inattendu rencontré avec le contrôle anti-robot...</p>";
				}
