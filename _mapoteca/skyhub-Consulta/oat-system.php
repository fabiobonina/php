  <!-- Header -->
  <?php include("admin/includes/tab/header.php");?>
  <!-- /Header -->

            <!-- menu profile quick info -->
            <?php include("admin/includes/menu.php");?>
            <!-- /menu footer buttons -->

        <!-- top navigation -->
        <?php include("admin/includes/topo.php");?>
        <!-- /top navigation -->

        <!-- page content -->
        <?php
          if(isset($_GET['acao'])){
            $acao = $_GET['acao'];	
            
            if($acao=='clientes'){include("admin/pages/oat/system/cliente/clientes.php");}	
            // cadastro
            if($acao=='localidades'){include("admin/pages/oat/system/localidade/localidades.php");}	
            // exibicao
            if($acao=='tecnicos'){include("admin/pages/oat/system/tecnico/tecnicos.php");}
            // edicao
            if($acao=='sistemas'){include("admin/pages/oat/system/sistema/sistemas.php");}
                // edicao
            if($acao=='servicos'){include("admin/pages/oat/system/servico/servicos.php");}
                // edicao
            if($acao=='despesas'){include("admin/pages/oat/system/despesa/despesas.php");}
            // oat
            if($acao=='oat'){include("admin/pages/oat/system/oat/oat.php");}
            // oat
            if($acao=='ativo'){include("admin/pages/oat/system/ativo/list.php");}

          }
        ?>
        <!-- /page content -->

        		<!-- Auto Incremente localização -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script>
			var timeoutID = "";
			var fieldValue = "Teste";
			$(document).on('keyup','#query',function(){
				if(fieldValue == $(this).val()){return}
				if(timeoutID!="")
					window.clearTimeout(timeoutID);
				timeoutID = window.setTimeout(search,100);
			});
			var search = function(){ 
				var query = $('#query').val();
				if(query != ''){ 
					$.ajax({
						method: "GET",
						url: "admin/classes/search.php",
						data: {'term':query}
					})
					.done(function( data ) {
						if(data != "[]"){
							data = JSON.parse(data);
							var html="";
							$.each(data,function(index,value){ 
								html += '<li><a href="javascript:" class="listItem" data-id="'+value.id+'" data-lat="'+value.lat+'" data-long="'+value.long+'">'+value.cli+" | "+value.val+'</a></li>';
							});
							$('.suggestions').html(html);
							$('.suggestions').css({'display':'block'});
						}else{ 
							$('.suggestions').html("");
							$('.suggestions').css({'display':'none'});
						}
					});
				}else{ 
					$('.suggestions').html("");
					$('.suggestions').css({'display':'none'});
				}
			}
			$(document).on('click','a.listItem',function(){ 
				$('#query').val($(this).text());
				fieldValue = $(this).text();
				$('input[name="localId"]').val($(this).attr('data-id'));
        		$('input[name="localLat"]').val($(this).attr('data-Lat'));
        		$('input[name="localLong"]').val($(this).attr('data-Long'));
				$('.suggestions').html("");
				$('.suggestions').css({'display':'none'});	
				$('#query').focus();		
			});
		</script>
		<!-- /Auto Incremente localização -->

        <!-- footer content -->
        <?php include("admin/includes/tab/footer.php");?>
        <!-- /footer content -->
