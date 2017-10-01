  <!-- Header -->
  <?php include("admin/includes/tab/header.php");?>
  <!-- /Header -->
  	<style>
	.suggestions{ 
		padding:0;
		margin:0;
		display: block;
	}
	</style>

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
            
            if($acao=='solicitacao'){include("admin/pages/oat/operacao/solicitacao.php");}
            // exibicao
            if($acao=='retorno'){include("admin/pages/oat/operacao/retorno.php");}
            // edicao
            if($acao=='finalizar'){include("admin/pages/oat/operacao/finalizar/oat.php");}
                // edicao
            if($acao=='concluidas'){include("admin/pages/oat/operacao/concluidas/oat.php");}

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
								html += '<li><a href="javascript:" class="listItem" data-id="'+value.id+'">'+value.cli+" | "+value.val+'</a></li>';
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
				$('.suggestions').html("");
				$('.suggestions').css({'display':'none'});	
				$('#query').focus();		
			});
		</script>
		<!-- /Auto Incremente localização -->

        <!-- footer content -->
        <?php include("admin/includes/tab/footer.php");?>
        <!-- /footer content -->
