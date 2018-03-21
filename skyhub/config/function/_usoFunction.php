<?php

	class UsoFunction {
			
		public function dtDiff($dtX, $dtY){
			$dtX = new DateTime($dtX);
			$dtY  = new DateTime($dtY);
			$diff   = $dtX->diff($dtY);
			$tempo  = $diff->h + ($diff->days * 24);
					
			return $tempo;
		}


	}
