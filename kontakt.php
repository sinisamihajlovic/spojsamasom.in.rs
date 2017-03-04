	<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'Posetilac sajta spojsamasom.in.rs';
		$to = 'sinisamihajlovic@spojsamasom.in.rs';
		$subject = 'Poruka sa sajta spojsamasom.in.rs';

		$body ="From: $name\n E-Mail: $email\n Message:\n $message";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Unesite ime';
		}

		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Unesite email adresu';
		}

		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Unesite poruku';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 9) {
			$errHuman = 'Anti-spam zaštita. Saberite brojeve.';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		echo '<script type="text/javascript">
           window.location = "poslatmail.html"
      </script>';
	} else {
		$result='<div class="alert alert-danger">Došlo je do greške prilikom slanja poruke. Pokušajte kasnije.</div>';
	}
}
	}
?>

<!DOCTYPE html>
<html lang="sr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Sajt posvećen demo bendu Spoj sa masom iz Vršca. Bend Spoj sa masom bio je bio aktivan od 1993. do 1997. godine. Utisci, sećanja, pitanja - Kontakt forma.">
    <meta name="keywords" content="spoj sa masom, vršac, demo bend, kontakt">
    <meta name="author" content="Siniša Mihajlović">
    <link rel="icon" href="ground_icon.png">

    <title>Spoj sa masom - Kontakt forma</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand"><a href="index.html">Spoj sa masom</a></h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li><a href="index.html">Home</a></li>
                  <li><a href="biografija.html">Biografija</a></li>
                  <li><a href="muzika.html">Muzika</a></li>
                  <li class="active"><a href="kontakt.php">Kontakt</a></li>
                </ul>
              </nav>
            </div>
          </div>

          <div class="inner cover">
            <h1 class="cover-heading">Pišite nam...</h1>
            <p class="lead">Od uspomena na bend, osim muzike, ostalo je malo stvari u fizičkom obliku. Sačuvano je svega nekoliko instrumenata i <a href="ssm_flag.jpg" target="_blank"><strong>zastava benda.</strong></a></p>
            <p class="lead">Molimo sve koji imaju neke fotografije sa nastupa ili bilo šta interesantno vezano za bend da nas kontaktiraju, kako bismo mogli da obogatimo sadržaj ove prezentacije.</p>


                    <div>
                        <form class="form-horizontal inner" role="form" method="post" action="kontakt.php">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Ime</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Ime i prezime" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                                    <?php echo "<p class='text-danger'>$errName</p>";?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="primer@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                                    <?php echo "<p class='text-danger'>$errEmail</p>";?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-sm-2 control-label">Poruka</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($_POST['message']);?></textarea>
                                    <?php echo "<p class='text-danger'>$errMessage</p>";?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="human" class="col-sm-2 control-label">6 + 3 = ?</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="human" name="human" placeholder="Odgovor">
                                    <?php echo "<p class='text-danger'>$errHuman</p>";?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input id="submit" name="submit" type="submit" value="Pošalji mail" class="btn btn-primary">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <?php echo $result; ?>
                                </div>
                            </div>
                        </form>
                    </div>


        </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Tribute site <a href="http://spojsamasom.in.rs">Spoj sa masom</a>, by Siniša Mihajlović.</p>
							<iframe id="facebookShare" name="Spoj sa masom on facebook" src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fspojsamasom.in.rs&layout=button&mobile_iframe=true&width=58&height=20&appId"></iframe>
            </div>
          </div>

        </div>
        </div>
      </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="jquery.min.js"><\/script>')</script>
    <script src="bootstrap.min.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-91885337-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>
</html>
