<?php
/*
<--
*/

function getCabezas(){
	include("connections/oculto.inc");
	$idQuiniela = "";
	$idSorteo = "";
	$nroSorteo = "";
	$num = 0;
	$fs = "";
	$url=$_SERVER['REQUEST_URI'];
	
	 //conección a la base de datos
	$dbhandle = mssql_connect($myServer, $myUser, $myPass)
	 or die("Couldn't connect to SQL Server on $myServer"); 
	
	 //selección de base de datos
	$selected = mssql_select_db($myDB, $dbhandle)
	  or die("Couldn't open database $myDB"); 
	 
	
	//Obtiene sorteo con datos actuales
	$querySorteoPublicado = "select * from sorteo_publicado";
	
	$rsSorteo = mssql_query($querySorteoPublicado, $dbhandle)
		or die('Ocurrio un error: ' . mssql_get_last_message().' - Query: '.$querySorteoPublicado);
	
	$num = mssql_num_rows($rsSorteo);
	
	
	if($num>0){
		$divs='
		<div class="center wow fadeInDown">
				<h2>'.mssql_result($rsSorteo, 0, "fecha").'</h2>
		</div>';
		
		$divsLosP = '
		<div class="center wow fadeInDown">
				<h2>Los Primeros</h2>
		</div>
		<div class="row-fluid">
			<div class="features">';
		$divsMatu = '
		<div class="center wow fadeInDown">
				<h2>Matutina</h2>
		</div>		
		<div class="row-fluid">
			<div class="features">';
		$divsVesp = '
		<div class="center wow fadeInDown">
				<h2>Vespertina</h2>
		</div>		
		<div class="row-fluid">
			<div class="features">';
		$divsNoct = '
		<div class="center wow fadeInDown">
				<h2>Nocturna</h2>
		</div>		
		<div class="row-fluid">
			<div class="features">';
		$divsMatuElse = '	<div class="row-fluid">
	<div class="features">';
		$divsLosPElse = '	<div class="row-fluid">
	<div class="features">';
		$divsVespElse = '	<div class="row-fluid">
	<div class="features">';
		$divsNoctElse = '	<div class="row-fluid">
	<div class="features">';
        $countMatu=0;
        $countVesp=0;
        $countNoct=0;
		
	
		for ($i=0;$i<=$num-1;$i++){
			// idquiniela
			// 1=nacional 2=provincia 3=oro 5=santiago 6=corrientes 7=tucumán 11=santa fé 12=córdoba 13=Mendoza 14=neuquén 15=salta  17=Entre Ríos
			
			
//-------------------Los Primeros----------------------			
			// Los Pimeros - Nacional
			if(mssql_result($rsSorteo, $i, "idquinielaP") == "1" && mssql_result($rsSorteo, $i, "losprimeros")!="--") {

				$divsLosP .= '			<div class="col-md-4 col-sm-4 wow fadeInDown span3 tiny " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-tiny ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>
					<div class="section ">
						<div class="pricing-table-features">';
					
						$divsLosP .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "losprimeros").'</strong> </a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
					
			} // Los Pimeros - Provincia
			elseif(mssql_result($rsSorteo, $i, "idquinielaP") == "2" && mssql_result($rsSorteo, $i, "losprimeros")!="--") {
				
				$divsLosP .= '			<div class="col-md-4 col-sm-4 wow fadeInDown span3 small " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-small ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>

					<div class="section ">
						<div class="pricing-table-features">';
					
				$divsLosP .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "losprimeros").'</strong> </a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
			} // Los Pimeros - Santa Fe
			elseif(mssql_result($rsSorteo, $i, "idquinielaP") == "11" && mssql_result($rsSorteo, $i, "losprimeros") != "--"){

				$divsLosP .= '			<div class="col-md-4 col-sm-4 wow fadeInDown span3 medium " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-medium ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>
					<div class="section ">
						<div class="pricing-table-features">';
					
				$divsLosP .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "losprimeros").'</strong> </a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
			
			} // resto de loterías small en otra row
			else {
				if(mssql_result($rsSorteo, $i, "losprimeros")!="--") {
	
					$divsLosPElse .= '			<div class="col-md-3 col-sm-4 wow fadeInDown span3 supertiny " data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="pricing-table-header-supertiny ">
							<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
						</div>
						<div class="section ">
							<div class="pricing-table-features">';
						
							$divsLosPElse .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "losprimeros").'</strong> </a>
							</div>
							<div class="body"> 
								<span> 
									<ol>
										<li>aca va la tabla</li> 
									</ol>
								</span> 
							</div>
						</div>
					</div>';
				}
						
			}
		

//------------------------Matutina-------------------------------
			// Matutina - Nacional
			if(mssql_result($rsSorteo, $i, "idquinielaP") == "1" && mssql_result($rsSorteo, $i, "matutina")!="--") {
				$countMatu += 1;

				$divsMatu .= '			<div class="col-md-3 col-sm-4 wow fadeInDown span3 tiny " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-tiny ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>
					<div class="section ">
						<div class="pricing-table-features">';
					
						$divsMatu .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "matutina").'</strong> </a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
					
			} // Matutina - Provincia
			elseif(mssql_result($rsSorteo, $i, "idquinielaP") == "2" && mssql_result($rsSorteo, $i, "matutina")!="--") {
				
				$divsMatu .= '			<div class="col-md-3 col-sm-4 wow fadeInDown span3 small " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-small ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>

					<div class="section ">
						<div class="pricing-table-features">';
					
				$divsMatu .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "matutina").'</strong></a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
			} // Matutina - Santa Fe
			elseif(mssql_result($rsSorteo, $i, "idquinielaP") == "11" && mssql_result($rsSorteo, $i, "matutina") != "--"){

				$divsMatu .= '			<div class="col-md-3 col-sm-4 wow fadeInDown span3 medium " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-medium ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>
					<div class="section ">
						<div class="pricing-table-features">';
					
				$divsMatu .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "matutina").'</strong></a> 
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
			
			} // Matutina - Oro
			elseif(mssql_result($rsSorteo, $i, "idquinielaP") == "3" && mssql_result($rsSorteo, $i, "matutina") != "--"){

				$divsMatu .= '			<div class="col-md-3 col-sm-4 wow fadeInDown span3 pro " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-pro ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>
					<div class="section ">
						<div class="pricing-table-features">';
					
				$divsMatu .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "matutina").'</strong></a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
			
			} // resto de loterías small en otra row
			else {
				if(mssql_result($rsSorteo, $i, "matutina")!="--") {
	
					$divsMatuElse .= '			<div class="col-md-3 col-sm-4 wow fadeInDown span3 supertiny " data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="pricing-table-header-supertiny ">
							<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
						</div>
						<div class="section ">
							<div class="pricing-table-features">';
						
							$divsMatuElse .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "matutina").'</strong></a> 
							</div>
							<div class="body"> 
								<span> 
									<ol>
										<li>aca va la tabla</li> 
									</ol>
								</span> 
							</div>
						</div>
					</div>';
				}
						
			}
			
//------------------------Vespertina-------------------------------			
			// Vespertina - Nacional
			if(mssql_result($rsSorteo, $i, "idquinielaP") == "1" && mssql_result($rsSorteo, $i, "vespertina")!="--") {
				$countVesp += 1;

				$divsVesp .= '			<div class="col-md-4 col-sm-4 wow fadeInDown span3 tiny " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-tiny ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>
					<div class="section ">
						<div class="pricing-table-features">';
					
						$divsVesp .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "vespertina").'</strong> </a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
					
			} // Vespertina - Provincia
			elseif(mssql_result($rsSorteo, $i, "idquinielaP") == "2" && mssql_result($rsSorteo, $i, "vespertina")!="--") {
				
				$divsVesp .= '			<div class="col-md-4 col-sm-4 wow fadeInDown span3 small " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-small ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>

					<div class="section ">
						<div class="pricing-table-features">';
					
				$divsVesp .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "vespertina").'</strong> </a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
			} // Vespertina - Santa Fe
			elseif(mssql_result($rsSorteo, $i, "idquinielaP") == "11" && mssql_result($rsSorteo, $i, "vespertina") != "--"){

				$divsVesp .= '			<div class="col-md-4 col-sm-4 wow fadeInDown span3 medium " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-medium ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>
					<div class="section ">
						<div class="pricing-table-features">';
					
				$divsVesp .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "vespertina").'</strong> </a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
			
			} // resto de loterías small en otra row
			else {
				if(mssql_result($rsSorteo, $i, "vespertina")!="--") {
	
					$divsVespElse .= '			<div class="col-md-4 col-sm-4 wow fadeInDown span3 supertiny " data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="pricing-table-header-supertiny ">
							<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
						</div>
						<div class="section ">
							<div class="pricing-table-features">';
						
							$divsVespElse .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "vespertina").'</strong> </a>
							</div>
							<div class="body"> 
								<span> 
									<ol>
										<li>aca va la tabla</li> 
									</ol>
								</span> 
							</div>
						</div>
					</div>';
				}
						
			}


//------------------------Nocturna-------------------------------			
			// Nocturna - Nacional
			if(mssql_result($rsSorteo, $i, "idquinielaP") == "1" && mssql_result($rsSorteo, $i, "nocturna")!="--") {
				$countNoct += 1;

				$divsNoct .= '			<div class="col-md-3 col-sm-4 wow fadeInDown span3 tiny " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-tiny ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>
					<div class="section ">
						<div class="pricing-table-features">';
					
						$divsNoct .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "nocturna").'</strong></a> 
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
					
			} // Nocturna - Provincia
			elseif(mssql_result($rsSorteo, $i, "idquinielaP") == "2" && mssql_result($rsSorteo, $i, "nocturna")!="--") {
				
				$divsNoct .= '			<div class="col-md-3 col-sm-4 wow fadeInDown span3 small " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-small ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>

					<div class="section ">
						<div class="pricing-table-features">';
					
				$divsNoct .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "nocturna").'</strong> </a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
			} // Nocturna - Santa Fe
			elseif(mssql_result($rsSorteo, $i, "idquinielaP") == "11" && mssql_result($rsSorteo, $i, "nocturna") != "--"){

				$divsNoct .= '			<div class="col-md-3 col-sm-4 wow fadeInDown span3 medium " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-medium ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>
					<div class="section ">
						<div class="pricing-table-features">';
					
				$divsNoct .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "nocturna").'</strong> </a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
			
			} // Nocturna - Oro
			elseif(mssql_result($rsSorteo, $i, "idquinielaP") == "3" && mssql_result($rsSorteo, $i, "nocturna") != "--"){

				$divsNoct .= '			<div class="col-md-3 col-sm-4 wow fadeInDown span3 pro " data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="pricing-table-header-pro ">
						<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
					</div>
					<div class="section ">
						<div class="pricing-table-features">';
					
				$divsNoct .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "nocturna").'</strong> </a>
						</div>
						<div class="body"> 
							<span> 
								<ol>
									<li>aca va la tabla</li> 
								</ol>
							</span> 
						</div>
					</div>
				</div>';
					
			
			} // resto de loterías small en otra row
			else {
				if(mssql_result($rsSorteo, $i, "nocturna")!="--") {
	
					$divsNoctElse .= '			<div class="col-md-3 col-sm-4 wow fadeInDown span3 supertiny " data-wow-duration="1000ms" data-wow-delay="600ms">
						<div class="pricing-table-header-supertiny ">
							<h2><a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'">'.iconv('Windows-1252', 'UTF-8//TRANSLIT', mssql_result($rsSorteo, $i, "quiniela")).'</a></h2>
						</div>
						<div class="section ">
							<div class="pricing-table-features">';
						
							$divsNoctElse .='							<a href="http://www.oraculosemanal.com/_testing3/Visualizaciones/iframeSorteos.asp?idQuiniela='.mssql_result($rsSorteo, $i, "idQuinielaP").'"><strong>'.mssql_result($rsSorteo, $i, "nocturna").'</strong> </a>
							</div>
							<div class="body"> 
								<span> 
									<ol>
										<li>aca va la tabla</li> 
									</ol>
								</span> 
							</div>
						</div>
					</div>';
				}
						
			}

			
						
		} //for
	} //if num>0
	
	$divsLosP.='</div>
</div><!--/row-->';
	$divsMatu.='</div>
</div><!--/row-->';	
	$divsVesp.='</div>
</div><!--/row-->';		
	$divsNoct.='</div>
</div><!--/row-->';	
	$divsLosPElse.='</div>
</div><!--/row-->';
	$divsMatuElse.='</div>
</div><!--/row-->';	
	$divsVespElse.='</div>
</div><!--/row-->';		
	$divsNoctElse.='</div>
</div><!--/row-->';	
	
	$divs .= $divsLosP.'
	'.$divsLosPElse.'
	';
	if($countMatu > 0){
	$divs .='
		'.$divsMatu.'
		'.$divsMatuElse.'
		';
	}
	if($countVesp > 0){
	$divs .='
		'.$divsVesp.'
		'.$divsVespElse.'
		';
	}
	if($countNoct > 0){
		$divs .='
		'.$divsNoct.'
		'.$divsNoctElse.'
		';
	}
	return $divs;

}

?>