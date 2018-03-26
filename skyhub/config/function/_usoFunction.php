<?php

	class UsoFunction {
			
		public function dtDiff($dtInicial, $dtFinal){
			# validar data
			if( strtotime($dtInicial) > strtotime($dtInicial) ){
				$res['error'] = true;
				$res['message'] = 'Error, dataFinal('.$dtInicial.') menor que dataInicio('.$dtInicial.')';
				return $res;
			}else{
				$dtInicial = new DateTime($dtInicial);
				$dtFinal  = new DateTime($dtFinal);
				$diff   = $dtInicial->diff($dtFinal);
				$tempo  = $diff->h + ($diff->days * 24);
						
				return $tempo;
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
