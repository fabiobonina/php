<style>

.tg  {
    border-spacing:0;
    border:none;
    margin-top: 10px;
    border-radius: 20px;
    border: 1px solid #d4d4d4;
    box-shadow: 1px 1px 1px #d4d4d4;
    width: 178px;
    height: 100px;
    float: left;
    margin-left: 10px;
    background-color:#efefef;
    }
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:5px 25px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:5px 25px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;}
.tg .tb-header{font-weight:bold;font-size:15px;color:#333333;}
.tg .tg-teste{font-size:0px;}
.tg .tg-body1{font-weight:bold; font-size:15px;color:#3166ff;text-align:center}
.tg .tg-body2{font-weight:bold; font-size:13px;color:#3166ff}
.tg .tg-body3{font-size:12px;color: #333333;}
.tg .tg-body4{font-size:10px;color:#333333;}
.tg .tg-footer{text-align:right}

body {
    margin:0;
    padding:0;
    color:#000;
    background:#fff;
}
#geral {
    width:30%;
    margin:0 auto;
    background:#ddd;
    margin-top: 10px;
}

#cabecalho {
    padding:10px;
    background:#fdd;
}
#conteudo-1 {
    float:left;
     /* diminuimos a largura para não quebrar o layout. 
      * valor antigo 220
      */
    width:210px;
    padding:10px;
    background:#bfb;
}
#conteudo-2-1 {
    float:left;
    width:460px;
    padding:10px;
    background:#ddf;
}
#conteudo-2-2 {
    float:right;
    /*diminuimos a largura para não quebrar o layout
    * valor antigo 220
    */
    width:200px;
    padding:10px;
    background:#dff;
}
#rodape {
    clear:both;
    padding:10px;
    background:#ff9;
}


</style>
                			<?php foreach($oat->findAll() as $key => $value):if($value->ativo == 0 && $value->status == 0 ) {
                        $oatId = $value->id;
                        $oatUsuario = $value->nickuser;
                        $oatCliente = $value->cliente;
                        $oatLocalId = $value->localidade;
                        $oatFilial = $value->filial;
                        $oatOs = $value->os;
                        $oatServId = $value->servico;
                        $oatSistId = $value->sistema;
                        $oatData = $value->data;
                        $oatAtivo = $value->ativo;
                        foreach($localidades->findAll() as $key => $value):if($value->id == $oatLocalId) {
                          $oatLocal = $value->nome;
                        }endforeach;             
                        foreach($servicos->findAll() as $key => $value):if($value->id == $oatServId) {
                          $oatServico = $value->descricao;
                        }endforeach;
                        foreach($sistemas->findAll() as $key => $value):if($value->id == $oatSistId) {
                          $oatSistema =  $value->descricao;
                        }endforeach;
                      ?>
<table class="tg">
  <tr>
    <th class="tb-header" colspan="5"><?php echo $oatCliente; ?> | <?php echo $oatLocal; ?></th>
  </tr>
<div class="x_content">
  <tr>
    <td class="tg-body1" rowspan="2"><?php echo $oatFilial; ?> | <?php echo $oatOs; ?></td>
    <td class="tg-body2"><?php echo $oatSistema; ?></td>
    <td class="tg-body2"><?php echo $oatServico; ?></td>
    <td class="tg-o2w9" rowspan="3">gps</td>
  </tr>
  <tr>
    <td class="tg-body4"><?php echo $oatUsuario; ?></td>
    <td class="tg-body4">Sol. 01/12/2016</td>
  </tr>
  <tr>
    <td class="tg-body3"><?php echo $oatData; ?></td>
    <td class="tg-body4">Atraso 1</td>
    <td class="tg-body4">teste</td>

  </tr>
  <tr>
    <td class="tg-footer" colspan="4">
      OS 
      CON
      <?php echo "<a href='oat-operacao.php?acao=criar&acao1=edt&oatId=" . $oatId . "'><i class='fa  fa-edit'></i>Editar </a>"; ?>&nbsp;
      <?php echo "<a href='oat-operacao.php?acao=criar&acao1=deletar&oatId=" . $oatId . "' onclick='return confirm(\"Deseja realmente deletar?\")'><i class='fa  fa-trash-o'></i>Deletar</a>"; ?>
    </td>
  </tr>
</table>

<?php }endforeach; ?>
