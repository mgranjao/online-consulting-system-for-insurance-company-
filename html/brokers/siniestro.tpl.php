<?php
	$this->display("html/layouts/header.tpl.php");
?>

	<?php
		$this->display("html/layouts/menu_brokers.tpl.php");
	?>

<div  class="right">
	
	<div  id="" class="inside">

		<?php
			//$this->display("html/layouts/menu_empresa_siniestro.tpl.php");
		

		?>
	
		<div  id="" class="clear"></div>

		<div  id="" class="data">
			
			<div  id="" class="inside">
			
			<h1>Siniestros </h1>
					

			<p>
				Consulta los documentos necesarios para reclamar un siniestro. Selecciona el tipo de siniestro que deseas consultar.
			</p>

				<!-- Siniestros -->


				<div id="prod-acc">
					<div class="acc-box view-tab">

						<div class="view-tab click_box" id="botontab-1"></div>	
							<h4>
										Reclamo de Vida (muerte natural o accidental)</h4>
									<div class="acc-info hidden" id="tabview-1">
										<p>
											*El aviso de siniestro debe realizarse los <strong><u>2 a&ntilde;os&nbsp;</u></strong>siguientes de la ocurrencia del siniestro</p>
										<ul>
											<li>
												Formulario de reclamaci&oacute;n de vida.</li>
											<li>
												Partida de nacimiento y/o Copia de c&eacute;dula de identidad del asegurado&nbsp;</li>
											<li>
												Partida de nacimiento y/o Copia de c&eacute;dula de identidad de los beneficiarios</li>
											<li>
												Partida de defunci&oacute;n del asegurado (copia certificada)</li>
											<li>
												Informe o certificado del o de los m&eacute;dicos tratantes</li>
											<li>
												Certificado de inhumaci&oacute;n y sepultura</li>
										</ul>
										<p>
											<strong><u>Adicionales (en caso de muerte accidental)</u></strong></p>
										<ul>
											<li>
												Copia certificada del Acta de levantamiento de cad&aacute;ver</li>
											<li>
												Copia certificada del Parte policial</li>
											<li>
												Protocolo de autopsia</li>
											<li>
												Posesi&oacute;n efectiva de legitimarios/herederos (si no hubieren beneficiarios designados).</li>
											<li>
												Declaraci&oacute;n de muerte presunta, publicaciones.</li>
										</ul>
										<p>
											<u><strong>Vida desgravamen:</strong></u></p>
										<ul>
											<li>
												Adem&aacute;s de los requisitos detallados para vida, incluir tabla de amortizaci&oacute;n y copia del contrato del cr&eacute;dito.</li>
											<li>
												Corte de estado de cuenta</li>
										</ul>
									</div>


					</div>
					<div class="acc-box view-tab">
						<div class="view-tab click_box" id="botontab-2"></div>	
						<h4>
									Gastos m&eacute;dicos por accidente</h4>
								<div class="acc-info hidden" id="tabview-2">
									<p>
										*Aviso de siniestro debe realizarse los <u><strong>30 d&iacute;as</strong></u> siguientes de la ocurrencia del siniestro</p>
									<ul>
										<li>
											Formulario de reclamaci&oacute;n de beneficios y de declaraci&oacute;n m&eacute;dica (completado en su totalidad.</li>
										<li>
											Copia de c&eacute;dula o partida de nacimiento del asegurado</li>
										<li>
											Copia de la cedula del representante en caso de ser estudiante.</li>
										<li>
											Facturas originales por todos los gastos incurridos</li>
										<li>
											Recetas m&eacute;dicas u orden de ex&aacute;menes (originales)</li>
										<li>
											Informaci&oacute;n cl&iacute;nica, radiol&oacute;gica, histol&oacute;gica y de laboratorio (Historia cl&iacute;nica completa)</li>
									</ul>
							</div>
					</div>
					<div class="acc-box view-tab">
						<div class="view-tab click_box" id="botontab-3"></div>
						<h4>
									Renta diaria por hospitalizaci&oacute;n</h4>
								<div class="acc-info hidden" id="tabview-3">
									<p>
										*Aviso de siniestro debe realizarse los <strong><u>3 d&iacute;as</u></strong> siguientes de la ocurrencia del siniestro</p>
									<ul>
										<li>
											Formulario de reclamaci&oacute;n de renta diaria por hospitalizaci&oacute;n.</li>
										<li>
											Copia de cedula del asegurado</li>
										<li>
											Historia cl&iacute;nica</li>
										<li>
											Certificado del hospital/cl&iacute;nica, firmado por el doctor tratante, sobre el tiempo o permanencia en el mismo</li>
										<li>
											Copia de cedula del representante en caso de ser menor de edad el asegurado</li>
									</ul>
								</div>
					</div>
					<div class="acc-box view-tab" >
						<div class="view-tab click_box" id="botontab-4"></div>
						<h4>
									Enfermedades graves</h4>
								<div class="acc-info hidden" id="tabview-4">
									<p>
										*Aviso de siniestro debe realizarse los <strong><u>30 d&iacute;as</u></strong> siguientes de la ocurrencia del siniestro</p>
									<ul>
										<li>
											Formulario de reclamaci&oacute;n de enfermedades graves.</li>
										<li>
											Copia de cedula del asegurado</li>
										<li>
											Informaci&oacute;n cl&iacute;nica, radiol&oacute;gica, histol&oacute;gica y de laboratorio (Historia cl&iacute;nica completa)</li>
										<li>
											Certificado del m&eacute;dico indicando diagnostico, tratamiento, etc.</li>
									</ul>
								</div>
					</div>
					<div class="acc-box view-tab" >

						<div class="view-tab click_box" id="botontab-5"></div>
						<h4>
									Incapacidad total y permanente</h4>
								<div class="acc-info hidden" id="tabview-5">
									<p>
										*Aviso de siniestro debe realizarse los <strong><u>30 d&iacute;as</u></strong> siguientes de la ocurrencia del siniestro</p>
									<ul>
										<li>
											Formulario de reclamaci&oacute;n de beneficios por ITP.</li>
										<li>
											Informe y certificado m&eacute;dico detallando causa y fecha de la incapacidad</li>
										<li>
											Informaci&oacute;n cl&iacute;nica, radiol&oacute;gica, histol&oacute;gica y de laboratorio (Historia cl&iacute;nica completa)</li>
										<li>
											Carnet de CONADIS</li>
									</ul>
									<p>
										&nbsp;</p>
								</div>
					</div>
					<div class="acc-box view-tab" >

						<div class="view-tab click_box" id="botontab-6"></div>
						<h4>
									Desempleo</h4>
								<div class="acc-info hidden" id="tabview-6">
									<ul>
										<li>
											Aviso del siniestro por desempleo firmado por el deudor asegurado</li>
										<li>
											Copia certificada del contrato de trabajo que estuvo desempe&ntilde;ando en el momento de la p&eacute;rdida del empleo o prueba de vinculaci&oacute;n legal del empleador donde conste el &uacute;ltimo cargo desempe&ntilde;ado y tiempo laborado.</li>
										<li>
											Copia del acta de finiquito de la que se desprender&aacute; si hubo despido</li>
										<li>
											Copia del carnet de afiliaci&oacute;n del IESS</li>
										<li>
											El contratante debe presentar: Documento donde conste el nombre del deudor desempleado, valor de las cuotas mensuales del cr&eacute;dito y la fecha de vencimiento de las mismas.</li>
									</ul>
								</div>
					</div>
				</div>



				<!-- Fin de Siniestros -->
		

			<div class="clear"></div>
			
			</div>

		</div>

	</div>


	

</div>
<div  id="" class="clear"></div>


<?php
	$this->display("html/layouts/footer.tpl.php");
?>