

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript">
	$(document).ready(function(){
		atualiza();
	});

	function atualiza(){
	   $.get('processa_lista.1.php', function(resultado){
		$('#tabela').html(resultado);
	   })
	   setTimeout('atualiza()', 1000);
	}
   </script>
</head>


<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">

    </div>
  </div>
  <?php

      $ip = 'http://192.168.10.247/';
      $stringAnalog = $ip.'ina';
      $stringDig = $ip.'ind';
      $redirecionar_1 = 'index.php';

      if(isset($_POST['comando'])):

							$rele = $_POST['id'];
              $status = $_POST['status'];
              echo $rele;
              echo $status;
              //echo '<iframe src="http://192.168.10.247/ON'. $rele .'.htm" height="100" width="100"/>';
              //header("Refresh: 1, ".$redirecionar_1);
							if($status == 0){
								echo '<iframe src="http://192.168.10.247/ON'. $rele .'.htm" height="1" width="1"/>';
                header("Refresh: 0, ".$redirecionar_1);
							}
              if($status == 1){
								echo '<iframe src="http://192.168.10.247/OF'. $rele .'.htm" height="1" width="1"/>';
                header("Refresh: 0, ".$redirecionar_1);
							}
				endif;
            
?>


  <div class="container">
    <div class="section">
      <!--   Icon Section   -->
      <div class="row">
        <div id ='pagina'>
          <div id='tabela'>
            // aki aparecerá as informações da tabela.
          </div>
        </div>
      </div>
      <br><br>
      <div class="section">
      </div>
    </div>
  </div>

  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>