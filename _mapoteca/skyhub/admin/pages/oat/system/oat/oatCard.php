                <!--Tabela Lista-->
                  <?php foreach($oats->findAll() as $key => $value):if($value->ativo == 0 && $value->status == $oatStatus && $value->nickuser == $userUsuario) {
                    include( $includ_1."oatCard2.php");
                }endforeach; ?>
                <!--/Tabela Lista-->
                <!--Tabela Lista-->
                  <?php foreach($oats->findAll() as $key => $value):if($userNivel > 0 && $value->status == $oatStatus && $value->nickuser <> $userUsuario) {
                    include( $includ_1."oatCard2.php");
                 }endforeach; ?>
                <!--/Tabela Lista-->