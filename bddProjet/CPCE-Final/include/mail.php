<?php
    $destinataire = 'popyk.dylan@9online.fr';
    // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
    $expediteur = $_POST['email'];
    $nom     =   $_POST['nom'];  
    $sujet  =   $_POST['sujet'];
    $message  =   $_POST['message'];

     
    $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
    $headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
    $headers .= 'To: '.$destinataire."\n"; // Mail de reponse
    $headers .= 'From: "Nom_de_destinataire"<'.$expediteur.'>'."\n"; // Expediteur
     
    $message =  '<div style="width: 100%; text-align: center; font-weight: bold"> Bonjour '.$_POST['nom'].'!<br>
                    '.$_POST['message'].'</div>';
     
    if(mail($destinataire, $sujet, $message, $headers))
    {
        echo '<script language="javascript" >alert("Votre message a bien été envoyé ");</script>';
    }
    else // Non envoyé
    {
        echo '<script language="javascript">alert("Votre message n\'a pas pu être envoyé");</script>';
    }
    header('Location: contact.php');
?>














<!--
<?php
    // On récupère les variables
    
    $email_to =   'popyk.dylan@9online.fr'; // L'adresse où l'email sera envoyé
    $nom     =   $_POST['nom'];  
    $email    =   $_POST['email'];
    $sujet  =   $_POST['sujet'];
    $message  =   $_POST['message'];
    
    /*La variable $header variable is for the additional headers in the mail function,
     we are asigning 2 values, first one is FROM and the second one is REPLY-TO.
     That way when we want to reply the email gmail(or yahoo or hotmail...) will know 
     who are we replying to. */
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    if(mail($email_to, $sujet, $message, $headers)){
         echo 'oui'; //Si le mail a été envoyé.     
    }else{
         echo 'non';// Si echec de l'envoi    
    }
?> ->