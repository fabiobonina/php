<?php

	include( '_usoFunction.php');
	include('../classes/osTecnicos.php');
	include('../classes/Mod.php');
	include('../classes/Nota.php');
	include('../classes/DeslocStatus.php');


	class OsFunction extends UsoFunction {

		public function insertOsTec($tecnicos, $osId, $idLoja){
		
			$cont1 = '0';
			$cont2 = '0';
			foreach ($tecnicos as $value){
				$osTecnicos   = new OsTecnicos();
				$cont1++;

				$tecId = $value['id'];
				$userTec = $value['userNick'];
				$hhTec = $value['hh'];

				$validar = $this->listOsTec($osId, $tecId);
				if(	count($validar) == '0' ){ 
					
					$osTecnicos->setOs($osId);
					$osTecnicos->setLoja($idLoja);
					$osTecnicos->setTecnico($tecId);
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
		public function deleteOsTec($tecId, $osId){
			$osTecnicos   = new OsTecnicos();

			$validar = $this->listOsTecMod($osId, $tecId);
			if(	count($validar) == '0' ){ 
				if($osTecnicos->delete($tecId)){
					$res['error'] = false;
					$res['message']= 'OK, Tecnico deletado!';
				}else{
					$res['error'] = true;
					$res['message'] = "Error, nao foi possivel deletar os dados"; 
				}
			}else{
				$res['error'] = true;
				$res['message'] = "Error, tecnico com deslocamento amarado a OS"; 
			}

			return $res;
		}
		public function listOsTec( $osId, $tecId ){
			$osTecnicos   = new OsTecnicos();
			$arTecnicos = array();
			foreach($osTecnicos->findAll() as $key => $value):if($value->os == $osId && $value->tecnico == $tecId)  {
			$arTecnico = (array) $value;
			array_push($arTecnicos, $arTecnico);
			}endforeach;
			
			return $arTecnicos;
		}
		public function listOsTecMod( $osId, $tecId ){
			$mods = new Mod();
			$deslocStatus = new DeslocStatus();
			#MODS--------------------------------------------------------------------------------------------
			$arMods = array();
			foreach($mods->findAll() as $key => $value):if($value->os == $osId && $value->tecnico == $tecId)  {
			$arItem = $value;
			array_push($arMods, $arItem);
			}endforeach;
			return  $arMods;
			#MODS--------------------------------------------------------------------------------------------
			
		}
		
		public function listOsNota( $osId ){
			$notas = new Nota();
			#MODS--------------------------------------------------------------------------------------------
			$arDatas = array();
			foreach($notas->findAll() as $key => $value):if($value->os == $osId )  {
			$arItem = $value;
			array_push($arDatas, $arItem);
			}endforeach;
			return  $arDatas;
			#MODS--------------------------------------------------------------------------------------------
			
		}

	}
