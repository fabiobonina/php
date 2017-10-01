<html>
<head>
<script type="text/javascript">
var selecionado = null;

function teste(value) {
    var b = 'value';
    alert(value);
    
}

</script>
</head>
<body>
    <input type='button' value='fabio' onclick='teste(this.value)' />
    <?php
    $teste = "<script>document.write(b)</script>";
    echo $teste;
    echo $teste2 = 200;
    ?>
</div>
</body>
</html>
<?php
function get_post_action($name)
{
    $params = func_get_args();

    foreach ($params as $name) {
        if (isset($_POST[$name])) {
            return $name;
        }
    }
}
?>

<?php
switch (get_post_action('save', 'submit', 'publish')) {
    case 'save':
        //save article and keep editing
        echo teste;
        break;

    case 'submit':
        //save article and redirect
        break;

    case 'publish':
        //publish article and redirect
        break;

    default:
        //no action sent
}
?>


<form method="post" action="">
    <p>
        <input type="submit" name="save" value="Salvar e continuar editando" />
        <input type="submit" name="submit" value="Salvar" />
        <input type="submit" name="publish" value="Publicar" />
    </p>
</form>
<script type="text/javascript">
$.ajax({
    type: "POST",
    url: "load_post.php",
    data: {categoria:query},
    success: function(dados){
        alert(dados);
        $('#load_post').html(dados);
        $('#load_post').fadeOut(5000);
        Lista(dados.utilizador);
    }
});
</script>


 <script type="text/javascript">
  var variaveljs = 'Mauricio Programador'; 
 </script>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>seucurso.com.br</title>
</head>
 
<body>
<script type="text/javascript">
 var x = 'valor';
 alert(x);
</script>

<?php
$x = "<script>document.write(x)</script>";
echo $x;
?>

</body>
</html>
