<?php

	include( '_usoFunction.php');
	include('../classes/osTecnicos.php');



	class OsFunction extends UsoFunction {

		public function insertOsTec($tecnicos, $idOs, $idLoja){
		
			$cont1 = '0';
			$cont2 = '0';
			foreach ($tecnicos as $value){
				$osTecnicos   = new OsTecnicos();
				$cont1++;

				$idTec = $value['id'];
				$userTec = $value['userNick'];
				$hhTec = $value['hh'];

				$validar = $this->listOsTec($idOs, $idTec);
				if(	count($validar) == '0' ){ 
					
					$osTecnicos->setOs($idOs);
					$osTecnicos->setLoja($idLoja);
					$osTecnicos->setTecnico($idTec);
					$osTecnicos->setUser($userTec);
					$osTecnicos->setHh($hhTec);
					if($osTecnicos->insert()){
						$cont2++;
					}

				}
			}
			if($cont2 == '0'){
				$res['error'] = true;
				$res['message'] = "Error, nao foi possivel salvar os dados";    
			}else{
				$res['error'] = false;
				$res['message']= 'OK, salvo '.$cont2.'/ '.$cont1.' enviados';
			}

			return $res;
		}

		public function listOsTec( $idOs, $idTec ){
			$osTecnicos   = new OsTecnicos();
			$arTecnicos = array();
			foreach($osTecnicos->findAll() as $key => $value):if($value->os == $idOs && $value->tecnico == $idTec)  {
			$arTecnico = (array) $value;
			array_push($arTecnicos, $arTecnico);
			}endforeach;
			
			return $arTecnicos;
		}
		

	}
