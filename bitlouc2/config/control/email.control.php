<?php
	class EmailControl {

		public function inicio( $tipo, $os_id ){

			if($tipo == '1'){
				$item = '
					
				';

			}
			if($tipo == '2'){
				$item = '
					
						<table cellspacing="0" cellpadding="0" align="center" width="550">
							<tbody>
								<tr>
									<td align="center" valign="middle">
										<table cellspacing="0" cellpadding="0" align="center" width="550" style="padding: 0 10px">
											<tbody>
												<tr>
													<td align="left" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:12px; color:#333333;">
														<span style="display: none;">Confira todos os detalhes.</span>
													</td>
													<td align="right" valign="middle" style="font-family:Verdana, Helvetica, sans-serif; font-size:12px; color:#333333;">
														<a href="http://bitlouc.com/#/os/'. $os_id .'" target="_blank" style="color:#333333">Ver Online</a>&nbsp;
														<!--|&nbsp;<a href="http://e.shell.com.br/pub/sf/FormLink?_ri_." target="_blank" style="color:#333333">Descadastre-se</a>-->
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
				';

			}
			return $item;
		}

		public function top( $tipo, $os_id, $email_status ){

			if($tipo == '1'){
				$item = '
					
				';

			}
			if($tipo == '2'){
				$item = '
					<tr>
						<td align="left" valign="top" style="padding-top: 30px;">
							<a href="http://bitlouc.com/#/os/'. $os_id .'" target="_blank">
								<img alt="BitLOUC" border="0" src="http://bitlouc.com/interface/imagem/bitlouc_logoii.png" style="display:block;border:0;" height="36" width="89">
							</a>
						</td> 
					</tr>
					<tr>
						<td align="left" valign="middle" style="padding-top: 30px;font-family:Verdana, Helvetica, sans-serif; font-size:14px;line-height: 25px; color: #595a5a;">
							<a href="http://bitlouc.com/#/os/'. $os_id .'" target="_blank">
								<span style="color: #dd1d21;">
									Instância
								</span>
								<strong> #'.$os_id.'</strong>
							</a> <br>
						</td>                                    
					</tr>
					<tr>
						<td align="left" valign="middle" style="padding-top: 30px;font-family:Verdana, Helvetica, sans-serif; font-size:20px; color:#3f3f3f; font-weight: bold;line-height: 25px;">
							'. $email_status .'.
						</td>
					</tr>
					<tr>
						<td class="corpo-footer" align="right" valign="top" width="100%" style="padding: 20px 0px 1px 1px; color: #404040; font-size: 10px; font-family: arial; line-height: 1px">
							Alterado por: '.$_SESSION['user_user'].'
						</td>
					</tr>
					
				';

			}
					
			return $item;
		}
		public function dados( $tipo, $os_id, $email_status ){

			if($tipo == '1'){
				$item = '';

			}
			if($tipo == '2'){
				$item = '
					<tr>
						<td align="left" valign="top" style="padding-top: 30px;">
							<a href="http://bitlouc.com" target="_blank">
								<img alt="BitLOUC" border="0" src="http://bitlouc.com/interface/imagem/bitlouc_logoii.png" style="display:block;border:0;" height="36" width="89">
							</a>
						</td> 
					</tr>
					<tr>
						<td align="left" valign="middle" style="padding-top: 30px;font-family:Verdana, Helvetica, sans-serif; font-size:14px;line-height: 25px; color: #595a5a;">
							<span style="color: #dd1d21;">
								Instancia
							</span>
							<strong> #'.$os_id.'</strong> <br>
						</td>                                    
					</tr>
					<tr>
						<td align="left" valign="middle" style="padding-top: 30px;font-family:Verdana, Helvetica, sans-serif; font-size:20px; color:#3f3f3f; font-weight: bold;line-height: 25px;">
							'. $email_status .' teste.
						</td>
					</tr>
					<tr>
						<td class="corpo-footer" valign="top" width="100%" style="padding: 35px 35px 40px 45px; color: #404040; font-size: 10px; font-family: arial; line-height: 12px">
							Alterado por: '.$_SESSION['user_user'].'
						</td>
					</tr>
				';

			}
					
			return $item;
		}
	}
