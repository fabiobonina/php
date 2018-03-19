<?php

class TextFunction {
		
	public function dtDiff($dtX, $dtY){
		$dtX = new DateTime($dtX);
		$dtY  = new DateTime($dtY);
		$diff   = $dtX->diff($dtY);
		$tempo  = $diff->h + ($diff->days * 24);
				
		return $tempo;
	}

	public function update($id){
		try{
			$sql  = "UPDATE $this->table SET os = :os, loja = :loja,  tecnico = :tecnico, hh = :hh WHERE id = :id";
			$stmt = DB::prepare($sql);

			$stmt->bindParam(':os',$this->os);
			$stmt->bindParam(':loja',$this->loja);
			$stmt->bindParam(':tecnico',$this->tecnico);
			$stmt->bindParam(':hh',$this->hh);
			$stmt->bindParam(':id', $id);

			return $stmt->execute();
		} catch(PDOException $e) {
			$res['error'] = true; 
            echo $res['message'] = 'ERROR: ' . $e->getMessage();  
		}
	}

}
