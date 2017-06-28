<?php

// Avvia la sessione
session_start();

include("db.php");

$conn = mysqli_connect($db_host, $db_user, $db_password);
mysqli_select_db($conn, $db_database);

// Controlla ruolo
if($_SESSION["type"] != 1)
{
	die("Permesso negato");
}

?>
<html>
<head><title>Amministrazione</title>
	<script type="text/javascript" language="javascript" src="handlers.js"></script>
	<script type="text/javascript" language="javascript" src="adv_visualizer.js"></script>
	<link rel="stylesheet" type="text/css" href="jquerydatatables.css">
	<link rel="stylesheet" href="jquery-ui.css">
	<script type="text/javascript" language="javascript" src="jquery-1124.js"></script>
	<script src="jquery-ui.js"></script>
	<script type="text/javascript" language="javascript" src="jquerydatatables.js"></script>


	<script type="text/javascript" language="javascript" src="stampaRicevute.js"></script>
	<script type="text/javascript" language="javascript" src="visualizer.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#tabClient").hide();
		$("#tabCommis").hide();
		$("#tabDev").hide();
		$("#tabLayout").hide();
		$("#tabModul").hide();
		$("#tabSiti").hide();
		$("#tabUtenti").hide();
		$('.modal').on('hidden.bs.modal', function(e)
    {
        $(this).removeData();
    }) ;
	});
	</script>
	<div class="container-fluid">
<h2 style="margin-left:5px; width:300px">IO SONO <?php echo strtoupper($_SESSION["username"]); ?>!</h2>
<div style="position: absolute; right:0px; top:5px;">
<form action="logout.php">
<input type="submit" value="Logout"  onclick="submit"/>
</form>
<br>
</div>
<p style="margin-left:5px; width:200px">Scegli un'operazione:</p>
<div class="wrapper" class="col-md-2">
<ul class="nav nav-pills nav-stacked" style="width:200px; float:left;">
<li><input type="button" value="Visualizza Clienti"  onclick="visClienti()"/>
</li>
<li><input type="button" value="Visualizza Sviluppatori"  onclick="visDev()"/>
</li>
<li><input type="button" value="Visualizza Layout"  onclick="visLayout()"/>
</li>
<li><input type="button" value="Visualizza Siti"  onclick="visSiti()"/>
</li>
<li><input type="button" value="Visualizza Moduli"  onclick="visModuli()"/>
</li>
<li><input type="button" value="Visualizza Commissioni"  onclick="visCommissioni()"/>
</li>
<li><input type="button" value="Visualizza Utenti"  onclick="visUsers()"/>
</li>
</ul>

	<ul class="nav nav-pills nav-stacked" style="width:200px; position:absolute; right:0px;">
	<li><input type="button" value="Inserisci Clienti"  onclick="insClienti()"/>
	</li>
	<li><input type="button" value="Inserisci Sviluppatori"  onclick="insDev()"/>
	</li>
	<li><input type="button" value="Inserisci Layout"  onclick="insLayout()"/>
	</li>
	<li><input type="button" value="Inserisci Siti"  onclick="insSiti()"/>
	</li>
	<li><input type="button" value="Inserisci Moduli"  onclick="insModuli()"/>
	</li>
	<li><input type="button" value="Inserisci Utenti"  onclick="insUsers()"/>
	</li>
	</ul>

</div>
<br>


<div class="col-md-8" style="margin-top:0px;">
<table class="table table-striped table-hover" id="tabUtenti" cellspacing="0" width="100%">
	<thead>
			<tr>
					<th>Username</th>
					<th>Tipo Login</th>
					<th></th>
			</tr>
	</thead>
	<tfoot>
			<tr>
					<th>Username</th>
					<th>Tipo Login</th>
					<th></th>
			</tr>
	</tfoot>
</table>

<table class="table table-striped table-hover" id="tabCommis" cellspacing="0" width="100%">
	<thead>
			<tr>
					<th>CF Cliente</th>
					<th>Partita Iva Sviluppatore</th>
					<th>URL Sito</th>
					<th></th>
			</tr>
	</thead>
	<tfoot>
			<tr>
				<th>CF Cliente</th>
				<th>Partita Iva Sviluppatore</th>
				<th>URL Sito</th>
				<th></th>
			</tr>
	</tfoot>
</table>

<table class="table table-striped table-hover" id="tabClient" cellspacing="0" width="100%">
	<thead>
			<tr>
					<th>Codice Fiscale Cliente</th>
					<th>Citt&agrave</th>
					<th>Indirizzo</th>
					<th>Telefono</th>
					<th>N° Siti</th>
					<th>Spesa Totale</th>
					<th></th>
					<th></th>
			</tr>
	</thead>
	<tfoot>
			<tr>
				<th>Codice Fiscale Cliente</th>
				<th>Citt&agrave</th>
				<th>Indirizzo</th>
				<th>Telefono</th>
				<th>N° Siti</th>
				<th>Spesa Totale</th>
				<th></th>
				<th></th>
			</tr>
	</tfoot>
</table>

<table class="table table-striped table-hover" id="tabDev" cellspacing="0" width="100%">
	<thead>
			<tr>
					<th>Partita IVA</th>
					<th>Nome</th>
					<th>Cognome</th>
					<th>Telefono</th>
					<th></th>
					<th></th>
			</tr>
	</thead>
	<tfoot>
			<tr>
				<th>Partita IVA</th>
				<th>Nome</th>
				<th>Cognome</th>
				<th>Telefono</th>
				<th></th>
				<th></th>
			</tr>
	</tfoot>
</table>

<table class="table table-striped table-hover" id="tabLayout" cellspacing="0" width="100%">
	<thead>
			<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Costo Totale Layout</th>
					<th>Sviluppatore</th>
					<th></th>
					<th></th>
			</tr>
	</thead>
	<tfoot>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Costo Totale Layout</th>
				<th>Sviluppatore</th>
				<th></th>
				<th></th>
			</tr>
	</tfoot>
</table>

<table class="table table-striped table-hover" id="tabModul" cellspacing="0" width="100%">
	<thead>
			<tr>
					<th>ID</th>
					<th>Nome Modulo</th>
					<th>Funzione</th>
					<th>Costo</th>
					<th></th>
			</tr>
	</thead>
	<tfoot>
			<tr>
				<th>ID</th>
				<th>Nome Modulo</th>
				<th>Funzione</th>
				<th>Costo</th>
				<th></th>
			</tr>
	</tfoot>
</table>

<table class="table table-striped table-hover" id="tabSiti" cellspacing="0" width="100%">
	<thead>
			<tr>
					<th>Codice</th>
					<th>URL</th>
					<th>Data Pubblicazione</th>
					<th>Cliente</th>
					<th>ID Layout Utilizzato</th>
					<th></th>
			</tr>
	</thead>
	<tfoot>
			<tr>
				<th>Codice</th>
				<th>URL</th>
				<th>Data Pubblicazione</th>
				<th>Cliente</th>
				<th>ID Layout Utilizzato</th>
				<th></th>
			</tr>
	</tfoot>
</table>
</div>
</div>

	<div id="myModalUsers" class="modal fade" role="dialog">
		  <div  class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Inserimento Utenti</h4>
		      </div>
		      <div class="modal-body">
						<form name="newuser">
						Username<input type='text' name='username'><br>
						Password<input type='password' name='password'><br>
						Conferma Password<input type='password' name='password2'><br>
						<label class="control-label requiredField" for="type"> Tipo</label>
										<label class="radio-inline"><input  id="type" name="type" type="radio" value="1"/> Amministratore</label>
										<label class="radio-inline"><input  id="type" name="type" type="radio" value="2"  checked="checked"/> Sviluppatore</label>
										<label class="radio-inline"><input id="type"
										name="type" type="radio" value="3"/> Cliente</label>
						<input type='button' id='btnIns' value="Inserisci Utente">
					</form>

					<script>
						$('pulsantinvio').bind('click', handlerUtenti());
					</script>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
		      </div>
		    </div>
			</div>
		</div>

	<div id="myModalClient" class="modal fade" role="dialog">
					<div  class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Inserimento Clienti</h4>
							</div>
							<div class="modal-body">
								<form name="newclient">
								CF Cliente<input type='text' name='codice'><br>
								Citta<input type='text' name='citta'><br>
								Indirizzo<input type='text' name='indirizzo'><br>
								Telefono<input type='text' name='telefono'><br>
								<input type='button' id='btnIns2' value="Inserisci Cliente">
							</form>

							<script>
								$('btnIns2').bind('click', handlerClienti());
							</script>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
							</div>
						</div>
					</div>
				</div>

	<div id="myModalDev" class="modal fade" role="dialog">
			<div  class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Inserimento Sviluppatori</h4>
					</div>
					<div class="modal-body">
						<form name="newdev">
						Partita Iva<input type='text' name='piva'><br>
						Nome<input type='text' name='nome'><br>
						Cognome<input type='text' name='cognome'><br>
						Telefono<input type='text' name='telefono'><br>
						<input type='button' id='btnIns3' value="Inserisci Sviluppatore">
					</form>

					<script>
						$('btnIns3').bind('click', handlerDev());
					</script>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
					</div>
				</div>
			</div>
		</div>

	<div id="myModalModule" class="modal fade" role="dialog">
			<div  class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Inserimento Moduli</h4>
					</div>
					<div class="modal-body">
						<form name="newmodule">
						Nome Modulo<input type='text' name='module'><br>
						Funzione<input type='text' name='funz'><br>
						Costo<input type='text' name='cost'><br>
						<input type='button' id='btnIns4' value="Inserisci Modulo">
					</form>

					<script>
						$('btnIns4').bind('click', handlerModule());
					</script>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
					</div>
				</div>
			</div>
		</div>

		<div id="myModalLayout" class="modal fade" role="dialog">
				<div  class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Inserimento Layout</h4>
						</div>
						<div class="modal-body">
							<form name="newlayout">
							Nome Layout<input type='text' name='layout'><br>
							P.Iva Sviluppatore<select id="IDpiva"></select><br>
							<div id="groundZero">
							Moduli<div id="CheckModulo"></div><br>
						</div>
							<input type='button' id='btnIns5' value="Inserisci Layout">
						</form>

						<script>
							$('btnIns5').bind('click', handlerLayout());
						</script>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
						</div>
					</div>
				</div>
			</div>

			<div id="myModalSiti" class="modal fade" role="dialog">
					<div  class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Inserimento Siti</h4>
							</div>
							<div class="modal-body">
								<form name="newsite">
								URL<input type='text' name='urlsito'><br>
								Data Pubblicazione<input type='text' name='date'><br>
								Cliente<select id="IDcliente"></select><br>
								Layout<select id="IDlayout"></select><br>
								<input type='button' id='btnIns6' value="Inserisci Sito">
							</form>

							<script>
								$('btnIns6').bind('click', handlerSiti());
							</script>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
							</div>
						</div>
					</div>
				</div>

				<div id="myModalComDatoCliente" class="modal fade" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title" id="modalTitle"></h4>
								</div>
								<div class="modal-body">
									<label id="modalcitta"></label><br>
									<label id="modalrue"></label><br>
									<label id="modalring"></label><br>
									<table class="table table-striped table-hover" id="tabClientAdv" cellspacing="0" width="100%">
										<thead>
												<tr>
														<th>Codice Fiscale Cliente</th>
														<th>P.Iva Sviluppatore</th>
														<th>URL Sito</th>
												</tr>
										</thead>
										<tfoot>
												<tr>
													<th>Codice Fiscale Cliente</th>
													<th>P.Iva Sviluppatore</th>
													<th>URL Sito</th>
												</tr>
										</tfoot>
									</table>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
								</div>
							</div>
						</div>
					</div>

					<div id="myModalLayoutDatoDev" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title" id="modalTitle2"></h4>
									</div>
									<div class="modal-body">
										<label id="modalnome"></label><br>
										<label id="modalcognome"></label><br>
										<label id="modaltelefono"></label><br>
										<table class="table table-striped table-hover" id="tabLayoutAdv" cellspacing="0" width="100%">
											<thead>
													<tr>
															<th>ID Layout</th>
															<th>Nome Layout</th>
															<th>Costo</th>
													</tr>
											</thead>
											<tfoot>
													<tr>
														<th>ID Layout</th>
														<th>Nome Layout</th>
														<th>Costo</th>
													</tr>
											</tfoot>
										</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
									</div>
								</div>
							</div>
						</div>

						<div id="myModalModuliDatoLayout" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" id="modalTitle3"></h4>
										</div>
										<div class="modal-body">
											<label id="modalidm"></label><br>
											<!-- <label id="modalnomem"></label><br> -->
											<label id="modalfunzionem"></label><br>
											<label id="modalcostom"></label><br>
											<table class="table table-striped table-hover" id="tabModuloAdv" cellspacing="0" width="100%">
												<thead>
														<tr>
																<th>Id Modulo</th>
																<th>Nome Modulo</th>
																<th>Funzione</th>
																<th>Costo Modulo</th>
														</tr>
												</thead>
												<tfoot>
														<tr>
															<th>Id Modulo</th>
															<th>Nome Modulo</th>
															<th>Funzione</th>
															<th>Costo Modulo</th>
														</tr>
												</tfoot>
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
										</div>
									</div>
								</div>
							</div>



</body>
</html>
