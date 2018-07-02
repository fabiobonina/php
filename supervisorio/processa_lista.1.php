<?php
//$delimiters has to be array
//$string has to be array
function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

//$rele = file_get_contents('http://192.168.10.247/out');
//$exploded = multiexplode(array(",","<html><body>","</body></html>","!#!"),$rele);

$analogica = file_get_contents('http://187.84.226.180:6303');
var_dump ($analogica);
echo $analogica;
//$exploded2 = multiexplode(array(",","<html><body>","</body></html>","!#!"),$analogica);
//var_dump ($exploded2);
/*?>

        <div class="col s12 m2">
        <ul class="collection">
        <?php
        foreach ($exploded as $key => $value) {
            if($value <> ""){
            //echo "Key: $key; Value: $value<br />\n";
            $value{strlen($value)-1};
            $value = $value;
        ?>
            <li class="collection-item avatar">
                <?php if($value == '0'){?>
                    <img src="img/desligado.png" alt="" class="circle">
                <?php }?>
                <?php if($value == '1'){?>
                    <img src="img/ligado.png" alt="" class="circle">
                <?php }?>
                <span class="title">Rele <?php echo $key; ?></span>
                <form method="post" action="" class="secondary-content">
                    <input type="hidden" name="id" value="<?php echo $key; ?>">
                    <input type="hidden" name="status" value="<?php echo $value; ?>">
                    <button type="submit" name="comando"><i class="material-icons">power_settings_new</i></button>
                </form>
            </li>
        <?php
            }
        }
        ?>
        </ul>
    </div>
    <?php
        foreach ($exploded2 as $key => $value) {
            if($value <> "" & $key == 1){
                $value = $value + 0.9;
                $value = $value * 5;
                $propocao = $value * 10;
            //echo "Key: $key; Value: $value; Propocao: $propocao<br />\n";
    ?>

        <div class="col s12 m2">
          <div class="card-panel">
            <h2 class="center light-blue-text"><i class="material-icons">invert_colors</i></h2>
            <h5 class="center">Dosagem <?php echo $key; ?></h5>
            <span class="title"><?php echo $value; ?> (PPM)</span>
            <div class="progress">
                <div class="determinate" style="width: <?php echo $propocao; ?>%"></div>
            </div>
            <p class="light"><?php echo $propocao; ?>%</p>
          </div>
        </div>

    <?php
        }
    }*/
    ?>
    
