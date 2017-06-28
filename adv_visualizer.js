function visCommissioniDatoCliente(banana){
  var advarray=banana.split("&&");
  var advData={
    codefis: advarray[0],
    town: advarray[1],
    rue: advarray[2],
    ring: advarray[3]
  }
  console.log(advData);
  $("#modalTitle").html(advData.codefis);
  $("#modalcitta").text("Citta': "+advData.town);
  $("#modalrue").text("Indirizzo: "+advData.rue);
  $("#modalring").text("Telefono: "+advData.ring);
  var id_client=advData.codefis;
  console.log(id_client);
	$("#tabClientAdv").dataTable({
	"sAjaxSource": "retrCommis.php?id_client="+id_client,
	"bFilter": true,
	"dom": "Bfrtip",
	"responsive": true,
	"bDestroy": true,
	"rowid":'cfc',
	"aoColumns": [
	             { "mData": "cfc" },
	             { "mData": "pivad" },
	             { "mData": "urls" },
						 ]
						});
	$("#myModalComDatoCliente").modal();
	}


function visLayoutDatoDev(banana){
  var advarray=banana.split("&&");
  var advData={
    pvia: advarray[0],
    nomen: advarray[1],
    cognomen: advarray[2],
    telefonum: advarray[3]
  }
  console.log(advData);
  $("#modalTitle2").html(advData.pvia);
  $("#modalnome").text("Citta': "+advData.nomen);
  $("#modalcognome").text("Indirizzo: "+advData.cognomen);
  $("#modaltel").text("Telefono: "+advData.telefonum);
  var id_dev=advData.pvia;
  console.log(id_dev);
	$("#tabLayoutAdv").dataTable({
	"sAjaxSource": "retrLayoutAdv.php?id_dev="+id_dev,
	"bFilter": true,
	"dom": "Bfrtip",
	"responsive": true,
	"bDestroy": true,
	"rowid":'cfc',
	"aoColumns": [
	             { "mData": "idd" },
	             { "mData": "nomed" },
	             { "mData": "costod" },
						 ]
						});
	$("#myModalLayoutDatoDev").modal();
}

function visModuliDatoLayout(banana){
  var advarray=banana.split("&&");
  var advData={
    idm: advarray[0],
    nomem: advarray[1],
    costom: advarray[2],
    devm: advarray[3]
  }
  console.log(advData);
  $("#modalidm").text("ID Layout: "+advData.idm);
  $("#modalTitle3").html(advData.nomem);
  $("#modalcostom").text("Costo: "+advData.costom);
  $("#modaldevm").text("Sviluppatore "+advData.devm);
  var id_layout=advData.idm;
  console.log(id_layout);
	$("#tabModuloAdv").dataTable({
	"sAjaxSource": "retrModuloAdv.php?id_layout="+id_layout,
	"bFilter": true,
	"dom": "Bfrtip",
	"responsive": true,
	"bDestroy": true,
	"rowid":'cfc',
	"aoColumns": [
	             { "mData": "idmod" },
	             { "mData": "nomemod" },
               { "mData": "funzmod" },
	             { "mData": "costomod" },
						 ]
						});
	$("#myModalModuliDatoLayout").modal();
}
