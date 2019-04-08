<?php



	class EmailControl {

		public function inicio( $tipo, $os_id ){

			if($tipo == '1'){
				$item = '
					
				';

			}
			if($tipo == '2'){
				$item = '
					<td align="center" valign="middle" style="padding:20px 0px 30px;background-color: #f2f2f2;">
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
					</td>
				';

			}
			return $item;
		}

		public function top( $tipo, $os_id, $email_status ){

			if($tipo == '1'){
				$item = '
				<div style="margin:0px auto;max-width:600px">
					<table role="presentation" cellpadding="0" cellspacing="0" style="font-size:0px;width:100%;border-collapse:collapse" align="center" border="0">
						<tbody>
							<tr>
								<td style="text-align:center;vertical-align:top;direction:ltr;font-size:0px;padding:0px 0px;padding-top:0px border-collapse:collapse">
									<div class="m_-3796989667682919919mj-column-per-100 m_-3796989667682919919outlook-group-fix" style="vertical-align:top;display:inline-block;direction:ltr;font-size:13px;text-align:left;width:100%">
										<table role="presentation" cellpadding="0" cellspacing="0" width="100%" border="0" style="border-collapse:collapse">
											<tbody>
												<tr>
													<td style="word-wrap:break-word;font-size:0px;padding:1px 25px;border-collapse:collapse" align="left">
														<table role="presentation" cellpadding="0" cellspacing="0" style="border-collapse:collapse;border-spacing:0px" align="center" border="0">
															<tbody>
																<tr>
																	<td style="width:80px;border-collapse:collapse">
																		<img alt="" height="auto" src="http://localhost/codephp/php/bitlouc/interface/imagem/bitlouc_logoii.png" style="border:none;border-radius:0px;display:block;font-size:13px;outline:none;text-decoration:none;width:100%;height:auto;line-height:100%" width="80" class="CToWUd">
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			';

			}
			if($tipo == '2'){
				$item = '
					<tr>
						<td align="left" valign="top" style="padding-top: 30px;">
							<a href="http://bitlouc.com" target="_blank">
								<img alt="BitLOUC" border="0" src="http://localhost/codephp/php/bitlouc/interface/imagem/bitlouc_logoii.png" style="display:block;border:0;" height="36" width="89">
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
							'. $email_status .'.
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
								<img alt="BitLOUC" border="0" src="http://localhost/codephp/php/bitlouc/interface/imagem/bitlouc_logoii.png" style="display:block;border:0;" height="36" width="89">
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
							Alterado por: '.$_SESSION['loginUser'].'
						</td>
					</tr>
				';

			}
					
			return $item;
		}
	}
