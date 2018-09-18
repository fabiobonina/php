<?php
	class UsoFunction {
			
		public function dtDiff($dtInicial, $dtFinal){
			# validar data
			if( strtotime($dtInicial) > strtotime($dtFinal) ){
				$res['error'] = true;
				$res['message'] = 'Error, dataFinal('.$dtFinal.') menor que dataInicio('.$dtInicial.')';
				return $res;
			}else{
				$dtInicial = new DateTime($dtInicial);
				$dtFinal  = new DateTime($dtFinal);
				$diff   = $dtInicial->diff($dtFinal);
				$tempo  = $diff->h + ($diff->days * 24) + ($diff->i /60);
				//$diff->format('%H, %i');
				return number_format($tempo, 2);
			}
			
		}
		public function checkDuplicity($valueI, $valueII){

			# validar data
			
			$validar = false;
			$acentos = array(
				'À', 'Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ò','Ó','Ô','Õ','Ö','Ù','Ú','Û','Ü','Ý',
				'à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','ð','ò','ó','ô','õ','ö','ù','ú','û','ü','ý','ÿ', ' '
			);
			$sem_acentos = array(
				'A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','O','O','O','O','O','U','U','U','U','Y',
				'a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','o','o','o','o','o','o','u','u','u','u','y','y', '_'
			);

			$valueI = str_replace($acentos, $sem_acentos, $valueI);
			$valueII = str_replace($acentos, $sem_acentos, $valueII);
			
			if(strtolower(utf8_decode($valueI)) == strtolower(utf8_decode($valueII))):
				$validar = true;
			endif;

			return $validar;
			
		}

		public function somarValorKm($kmInicio, $kmFinal, $valorBase){
			if( $kmInicio > $kmFinal ){
				$res['error'] = true;
				$res['message'] = 'Error, KmFinal('.$kmFinal.') menor que kmInicio('.$kmInicio.')';
				return $res;
			}else{

				return $valor  = ($kmFinal - $kmInicio ) * $valorBase;
				
			}
		}
		public function somarHhValor($tempo, $hh){
			$hhValor = $tempo * $hh;
			return number_format($hhValor,2);
			
		}
		public function statusReturn($item){
			if($item['error'] == true){
				$res['error'] 	= true;
			}else{
				$res['error'] 	= false;
			}
			$res['message']	= $item['message'];
			return $res;
			
		}
		
	}
