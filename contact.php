<!DOCTYPE html>

<html lang="fr">
   
    <head>
        <meta charset="utf-8"/>
        <title>Construire ensemble</title>
        <link rel="stylesheet" href="./style/style.css" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" href="./media/img/favicon.png" />
        <link href="https://fonts.googleapis.com/css?family=Lato:700" rel="stylesheet">
    </head>

      <body>
         <?php include "./include/header.php"; ?>  

      <!-- Start Contact Us
      =========================================== -->    
      <section id="contact-us">
         <div class="container">
            <div class="row">
               
               <!-- section titre -->
               <div class="titre" align="center">
                  <h2>Contactez - <span class="color">Nous</span></h2>
                  <div class="border"></div>
               </div>
               <!-- /section titre -->

               <br><br><br>   
               
               <!-- Contact Details -->
               <div class="contact-info-left">
                  <h3>Détails</h3>
                  <p>---</p>
                  <div class="contact-details">
                     <div class="con-info">
                        <span><B>Adresse :</B> 30 rue de Meaux B.P 20088, 60304 SENLIS CEDEX-France</span>
                     </div>
                     
                     <br>
                     <div class="con-info">
                        <span><B>Téléphone :</B> 06 80 98 67 56</span>
                     </div>
                     
                     <br>
                     <div class="con-info">
                        <span><B>Fax :</B> ---</span>
                     </div>
                     
                     <br>
                     <div class="con-info">
                        <span><B>Email :</B>  marie-noelle.jullien@lyceestvincent.net</span>
                     </div>
                  </div>
               </div>
               <!-- / End Contact Details -->
                  
               <!-- Contact Form -->
               <div class="contact-form-right">
                  <form id="contact-form" method="post" action="contact.php" role="form">
                  
                     <div class="form-group">
                        <input type="text" placeholder="Votre Nom" class="form-control" name="name" id="nom">
                     </div>

                     <br>
                     <div class="form-group">
                        <input type="email" placeholder="Votre Email" class="form-control" name="email" id="email">
                     </div>
                     
                     <br>
                     <div class="form-group">
                        <input type="text" placeholder="Sujet" class="form-control" name="sujet" id="sujet">
                     </div>
                     
                     <br>
                     <div class="form-group">
                        <textarea cols="40" placeholder="Message" class="form-control" name="message" id="message"></textarea> 
                     </div>
                     
                     <br><br>
                     <div id="cf-submit">
                        <input type="submit" id="contact-submit" class="btn btn-transparent" value="Envoyez">
                     </div>                  
                     
                  </form>
               </div>
               <!-- ./End Contact Form -->
            
            </div> <!-- end row -->
         </div> <!-- end container -->
         
         
      </section> <!-- end section -->

      <?php include "./include/footer.php"; ?>
   </body>
</html>