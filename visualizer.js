// function modCliente(cf){}
// function modDev(piva){}
// function modLayout(id){}
function placeholderModifica(){
	alert("Siamo spiacenti, questa funzione non è al momento implementata.")
}

function insLayout(){
	loadLayout();
	$("#myModalLayout").modal();
}

function insModuli(){
	$("#myModalModule").modal();
}

function insDev(){
	$("#myModalDev").modal();
}

function insClienti(){
	$("#myModalClient").modal();
}

function insUsers(){
	$("#myModalUsers").modal();
}

function insSiti(){
	loadSiti();
	$("#myModalSiti").modal();
}

function visClienti(){
	$("#tabUtenti").hide();
	$("#tabUtenti_filter").hide();
	$("#tabUtenti_info").hide();
	$("#tabUtenti_paginate").hide();
	$("#tabCommis").hide();
	$("#tabCommis_filter").hide();
	$("#tabCommis_info").hide();
	$("#tabCommis_paginate").hide();
	$("#tabDev").hide();
	$("#tabDev_filter").hide();
	$("#tabDev_info").hide();
	$("#tabDev_paginate").hide();
	$("#tabLayout").hide();
	$("#tabLayout_filter").hide();
	$("#tabLayout_info").hide();
	$("#tabLayout_paginate").hide();
	$("#tabModul").hide();
	$("#tabModul_filter").hide();
	$("#tabModul_info").hide();
	$("#tabModul_paginate").hide();
	$("#tabSiti").hide();
	$("#tabSiti_filter").hide();
	$("#tabSiti_info").hide();
	$("#tabSiti_paginate").hide();
	$("#tabClient").show();
	$("#tabClient").dataTable({
	"sAjaxSource": "datatableClienti.php",
	"bFilter": true,
	"dom": "Bfrtip",
	"responsive": true,
	"bDestroy": true,
	"rowid":'CF',
	"aoColumns": [
	             { "mData": "CF" },
	             { "mData": "Citta" },
	             { "mData": "Indirizzo" },
	             { "mData": "Tel" },
							 { "mData": "n_siti" },
	             { "mData": "Spesa_tot" },
							 {"mData":"button1","mRender":function(data, type, row){
								 var dataPacket=row.CF+"&&"+row.Citta+"&&"+row.Indirizzo+"&&"+row.Tel;
                 return '<input type="button" onclick="visCommissioniDatoCliente(\''+dataPacket+'\')" value="Visualizza Siti"/>'
               }},
               {"mData":"button2","mRender":function(data, type, row){
                 return '<input type="button" onclick="placeholderModifica()" value="Modifica"/>';
               }},
						 ],
						});
}

	function visSiti(){
		$("#tabClient").hide();
		$("#tabClient_filter").hide();
		$("#tabClient_info").hide();
		$("#tabClient_paginate").hide();
		$("#tabCommis").hide();
		$("#tabCommis_filter").hide();
		$("#tabCommis_info").hide();
		$("#tabCommis_paginate").hide();
		$("#tabDev").hide();
		$("#tabDev_filter").hide();
		$("#tabDev_info").hide();
		$("#tabDev_paginate").hide();
		$("#tabLayout").hide();
		$("#tabLayout_filter").hide();
		$("#tabLayout_info").hide();
		$("#tabLayout_paginate").hide();
		$("#tabModul").hide();
		$("#tabModul_filter").hide();
		$("#tabModul_info").hide();
		$("#tabModul_paginate").hide();
		$("#tabUtenti").hide();
		$("#tabUtenti_filter").hide();
		$("#tabUtenti_info").hide();
		$("#tabUtenti_paginate").hide();
		$("#tabSiti").show();
		$("#tabSiti").dataTable({
		"sAjaxSource":"datatableSiti.php",
		"bFilter": true,
		"dom": "Bfrtip",
		"responsive": true,
		"bDestroy": true,
		"rowid":'CODICE',
		"aoColumns": [
								 { "mData": "CODICE" },
								 { "mData": "URL" },
								 { "mData": "DATA_PUBBLICAZIONE" },
								 { "mData": "CLIENTE" },
								 { "mData": "LAYOUTREF" },
								 {"mData":"button2","mRender":function(data, type, row){
									 return '<input type="button" onclick="placeholderModifica()" value="Modifica"/>'
								 }},
							 ],
							});
		}

	function visLayout(){
		$("#tabClient").hide();
		$("#tabClient_filter").hide();
		$("#tabClient_info").hide();
		$("#tabClient_paginate").hide();
		$("#tabCommis").hide();
		$("#tabCommis_filter").hide();
		$("#tabCommis_info").hide();
		$("#tabCommis_paginate").hide();
		$("#tabDev").hide();
		$("#tabDev_filter").hide();
		$("#tabDev_info").hide();
		$("#tabDev_paginate").hide();
		$("#tabUtenti").hide();
		$("#tabUtenti_filter").hide();
		$("#tabUtenti_info").hide();
		$("#tabUtenti_paginate").hide();
		$("#tabModul").hide();
		$("#tabModul_filter").hide();
		$("#tabModul_info").hide();
		$("#tabModul_paginate").hide();
		$("#tabSiti").hide();
		$("#tabSiti_filter").hide();
		$("#tabSiti_info").hide();
		$("#tabSiti_paginate").hide();
		$("#tabLayout").show();
		$("#tabLayout").dataTable({
		"sAjaxSource":"datatableLayout.php",
		"bFilter": true,
		"dom": "Bfrtip",
		"responsive": true,
		"bDestroy": true,
		"rowid":'ID',
		"aoColumns": [
								 { "mData": "ID" },
								 { "mData": "NOME" },
								 { "mData": "COSTO_TOTALE" },
								 { "mData": "SVILUPPATOREREF" },
								 {"mData":"button1","mRender":function(data, type, row){
									 dataPacket=row.ID+"&&"+row.NOME+"&&"+row.COSTO_TOTALE+"&&"+row.SVILUPPATOREREF;
									 return '<input type="button" onclick="visModuliDatoLayout(\''+dataPacket+'\')" value="Visualizza Moduli"/>'
								 }},
								 {"mData":"button2","mRender":function(data, type, row){
									 return '<input type="button" onclick="placeholderModifica()" value="Modifica"/>'
								 }},
							 ],
						 });
	}

	function visDev(){
		$("#tabClient").hide();
		$("#tabClient_filter").hide();
		$("#tabClient_info").hide();
		$("#tabClient_paginate").hide();
		$("#tabCommis").hide();
		$("#tabCommis_filter").hide();
		$("#tabCommis_info").hide();
		$("#tabCommis_paginate").hide();
		$("#tabUtenti").hide();
		$("#tabUtenti_filter").hide();
		$("#tabUtenti_info").hide();
		$("#tabUtenti_paginate").hide();
		$("#tabLayout").hide();
		$("#tabLayout_filter").hide();
		$("#tabLayout_info").hide();
		$("#tabLayout_paginate").hide();
		$("#tabModul").hide();
		$("#tabModul_filter").hide();
		$("#tabModul_info").hide();
		$("#tabModul_paginate").hide();
		$("#tabSiti").hide();
		$("#tabSiti_filter").hide();
		$("#tabSiti_info").hide();
		$("#tabSiti_paginate").hide();
		$("#tabDev").show();
		$("#tabDev").dataTable({
		"sAjaxSource": "datatableDev.php",
		"bFilter": true,
		"dom": "Bfrtip",
		"responsive": true,
		"bDestroy": true,
		"rowid":'PIVA',
		"aoColumns": [
		             { "mData": "PIVA" },
		             { "mData": "NOME" },
		             { "mData": "COGNOME" },
								 { "mData": "TELEFONO" },
								 {"mData":"button1","mRender":function(data, type, row){
									  var dataPacket=row.PIVA+"&&"+row.NOME+"&&"+row.COGNOME+"&&"+row.TELEFONO;
										return '<input type="button" onclick="visLayoutDatoDev(\''+dataPacket+'\')" value="Visualizza Layout"/>'
									}},
	               {"mData":"button2","mRender":function(data, type, row){
	                 return '<input type="button" onclick="placeholderModifica()" value="Modifica"/>'
	               }},
							 ],
							});
	}

function visModuli(){
	$("#tabClient").hide();
	$("#tabClient_filter").hide();
	$("#tabClient_info").hide();
	$("#tabClient_paginate").hide();
	$("#tabCommis").hide();
	$("#tabCommis_filter").hide();
	$("#tabCommis_info").hide();
	$("#tabCommis_paginate").hide();
	$("#tabDev").hide();
	$("#tabDev_filter").hide();
	$("#tabDev_info").hide();
	$("#tabDev_paginate").hide();
	$("#tabLayout").hide();
	$("#tabLayout_filter").hide();
	$("#tabLayout_info").hide();
	$("#tabLayout_paginate").hide();
	$("#tabUtenti").hide();
	$("#tabUtenti_filter").hide();
	$("#tabUtenti_info").hide();
	$("#tabUtenti_paginate").hide();
	$("#tabSiti").hide();
	$("#tabSiti_filter").hide();
	$("#tabSiti_info").hide();
	$("#tabSiti_paginate").hide();
	$("#tabModul").show();
	$("#tabModul").dataTable({
	"sAjaxSource": "datatableModuli.php",
	"bFilter": true,
	"dom": "Bfrtip",
	"responsive": true,
	"bDestroy": true,
	"rowid":'ID',
	"aoColumns": [
							 { "mData": "ID" },
							 { "mData": "NOME" },
							 { "mData": "FUNZIONE" },
							 { "mData": "COSTO" },
							 {"mData":"button2","mRender":function(data, type, row){
								 return '<input type="button" onclick="placeholderModifica()" value="Modifica"/>'
							 }},
						 ],
						});

}

function visCommissioni(){
	$("#tabClient").hide();
	$("#tabClient_filter").hide();
	$("#tabClient_info").hide();
	$("#tabClient_paginate").hide();
	$("#tabCommis").show();
	$("#tabDev").hide();
	$("#tabDev_filter").hide();
	$("#tabDev_info").hide();
	$("#tabDev_paginate").hide();
	$("#tabLayout").hide();
	$("#tabLayout_filter").hide();
	$("#tabLayout_info").hide();
	$("#tabLayout_paginate").hide();
	$("#tabModul").hide();
	$("#tabModul_filter").hide();
	$("#tabModul_info").hide();
	$("#tabModul_paginate").hide();
	$("#tabSiti").hide();
	$("#tabSiti_filter").hide();
	$("#tabSiti_info").hide();
	$("#tabSiti_paginate").hide();
	$("#tabUtenti").hide();
	$("#tabUtenti_filter").hide();
	$("#tabUtenti_info").hide();
	$("#tabUtenti_paginate").hide();
	$("#tabCommis").dataTable({
	"sAjaxSource": "datatableCommissioni.php",
	"bFilter": true,
	"dom": "Bfrtip",
	"responsive": true,
	"bDestroy": true,
	"rowid":'cfcliente',
	"aoColumns": [
							 { "mData": "cfcliente" },
							 { "mData": "pivadev" },
							 { "mData": "urlsito" },
							 {"mData":"button2","mRender":function(data, type, row){
								 return '<input type="button" onclick="placeholderModifica()" value="Modifica"/>'
							 }},
						 ],
						});
}

function visUsers(){
	$("#tabClient").hide();
	$("#tabClient_filter").hide();
	$("#tabClient_info").hide();
	$("#tabClient_paginate").hide();
	$("#tabCommis").hide();
	$("#tabCommis_filter").hide();
	$("#tabCommis_info").hide();
	$("#tabCommis_paginate").hide();
	$("#tabDev").hide();
	$("#tabDev_filter").hide();
	$("#tabDev_info").hide();
	$("#tabDev_paginate").hide();
	$("#tabLayout").hide();
	$("#tabLayout_filter").hide();
	$("#tabLayout_info").hide();
	$("#tabLayout_paginate").hide();
	$("#tabModul").hide();
	$("#tabModul_filter").hide();
	$("#tabModul_info").hide();
	$("#tabModul_paginate").hide();
	$("#tabSiti").hide();
	$("#tabSiti_filter").hide();
	$("#tabSiti_info").hide();
	$("#tabSiti_paginate").hide();
	$("#tabUtenti").show();
	$("#tabUtenti").dataTable({
	"sAjaxSource": "datatableUtenti.php",
	"bFilter": true,
	"dom": "Bfrtip",
	"responsive": true,
	"bDestroy": true,
	"rowid":'ID',
	"aoColumns": [
							 { "mData": "username" },
							 { "mData": "type" },
							 {"mData":"button2","mRender":function(data, type, row){
								 return '<input type="button" onclick="placeholderModifica()" value="Modifica"/>'
							 }},
						 ],
						});
}
