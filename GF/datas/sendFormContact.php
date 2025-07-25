		<?php
                file_put_contents("log.txt", "PHP script hit\n", FILE_APPEND);
				echo "<p class=\"hardLight\">sendFormContact entered...</p>";
                
                $nom = strip_tags($_POST['nom']);
				$telephone = strip_tags($_POST['telephone']);
				$mail = strip_tags($_POST['mail']);
				$message = strip_tags($_POST['message']);
				$checkRobot = strip_tags($_POST['checkRobot']);
				$newsletter = strip_tags($_POST['newsletter']);

				// text to send
				$texte = "Bonjour,<br /><br />";
				$texte = $texte . "Message de Green Fox<br />";
				$texte = $texte . "Vous avez indiqué :<br />";
				$texte = $texte . "Nom : $nom<br />";
				$texte = $texte . "Téléphone : $telephone<br />";
				$texte = $texte . "Email :  $mail<br /><br />";
				$texte = $texte . "Message : $message<br /><br />";
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
