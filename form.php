<?php


if(isset($_POST['mailform']))
{
	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
		$header="MIME-Version: 1.0\r\n";
		$header.='From:"Vincent ROUSSET"<vincent601998@outlook.fr>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

		$message='
		<html>
			<body>
				<div align="center">
					<img src="http://www.primfx.com/mailing/banniere.png"/>
					<br />
					<u>Nom de l\'expéditeur : </u>'.$_POST['nom'].'<br />
					<u>Mail de l\'expéditeur : </u>'.$_POST['mail'].'<br />
					<br />
					'.nl2br($_POST['message']).'
					<br />
					<img src="http://www.primfx.com/mailing/separation.png"/>
				</div>
			</body>
		</html>
		';

	
		mail("vincent601998@outlook.fr", "Journée lycée Saint-Vincent", $message, $header);
		$msg="Votre message a bien été envoyé !";
	}
	else
	{
		$msg="Tous les champs doivent être complétés !";
	}

	
}
?>