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

		public function somarValorKm($kmInicio, $kmFinal, $valorBase){
			if( $kmInicio > $kmFinal ){
				$res['error'] = true;
				$res['message'] = 'Error, KmFinal('.$kmFinal.') menor que kmInicio('.$kmInicio.')';
				return $res;
			}else{

				return $valor  = ($kmFinal - $kmInicio ) * $valorBase;
				
			}
		}
		
	}
