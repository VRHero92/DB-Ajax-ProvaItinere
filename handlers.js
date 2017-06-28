function handlerUtenti(data) {
  $("#btnIns").off('click');
  $('#btnIns').click(function() {
    //console.log("ho premuto");
    //var form=$('#newuser');
    var username = document.newuser.username.value;
    var password = document.newuser.password.value;
    var password2 = document.newuser.password2.value;
    //check password
    var type = $('input[id="type"]:checked').val();
    //console.log(" "+username+" "+password+" "+type);
    var dataUsr = {
      us: username,
      pass: password,
      pass2: password2,
      ru: type,
    };

    if (username == "") {
      alert("nome obbligatorio");
      return false;
    }

    if (password != password2) {
      alert("Le password non coincidono.");
      return false;

    }
    $.ajax({
      url: 'nuser.php',
      type: 'get',
      dataType: "json",
      contentType: "application/json",
      data: dataUsr,
      complete: function(results) {
        var txtResp = JSON.parse(results.responseText);
        if (txtResp.status.localeCompare("ok")) {
          var t = $("#tabUtenti").DataTable();
          t.ajax.reload();
          alert("inserimento riuscito");
        } else {
          alert("inserimento non riuscito");
        }
      }
    });
  });
}

function handlerClienti(data) {
  $("#btnIns2").off('click');
  $('#btnIns2').click(function() {
    var cfcl = document.newclient.codice.value;
    var city = document.newclient.citta.value;
    var street = document.newclient.indirizzo.value;
    var phone = document.newclient.telefono.value;
    console.log(" " + cfcl + " " + city + " " + street + " " + phone);
    var dataClnt = {
      cod1: cfcl,
      city1: city,
      stre1: street,
      ipho1: phone,
    };
    console.log(dataClnt);
    if (cfcl == "" || city == "" || street == "" || phone == "") {
      alert("Inserire tutti i campi.");
      return false;
    }

    $.ajax({
      url: 'nuclient.php',
      type: 'get',
      dataType: "json",
      contentType: "application/json",
      data: dataClnt,
      complete: function(results) {
        var txtResp = JSON.parse(results.responseText);
        if (txtResp.status.localeCompare("ok")) {
          var t = $("#tabClient").DataTable();
          t.ajax.reload();
          alert("inserimento riuscito");
        } else {
          alert("inserimento non riuscito");
        }
      }
    });
  });
}

function handlerDev(data) {
  $("#btnIns3").off('click');
  $('#btnIns3').click(function() {
    var peeva = document.newdev.piva.value;
    var nomen = document.newdev.nome.value;
    var cognomen = document.newdev.cognome.value;
    var aifo4s = document.newdev.telefono.value;
    console.log(" " + peeva + " " + nomen + " " + cognomen + " " + aifo4s);
    var dataDev = {
      pevaa: peeva,
      name: nomen,
      surname: cognomen,
      aifo5c: aifo4s,
    };
    console.log(dataDev);
    if (peeva == "" || nomen == "" || cognomen == "" || aifo4s == "") {
      alert("Inserire tutti i campi.");
      return false;
    }

    $.ajax({
      url: 'nudev.php',
      type: 'get',
      dataType: "json",
      contentType: "application/json",
      data: dataDev,
      complete: function(results) {
        var txtResp = JSON.parse(results.responseText);
        if (txtResp.status.localeCompare("ok")) {
          var t = $("#tabDev").DataTable();
          t.ajax.reload();
          alert("inserimento riuscito");
        } else {
          alert("inserimento non riuscito");
        }
      }
    });
  });
}

function handlerModule(data) {
  $("#btnIns4").off('click');
  $('#btnIns4').click(function() {
    var modul = document.newmodule.module.value;
    var funk = document.newmodule.funz.value;
    var cots = document.newmodule.cost.value;
    console.log(" " + modul + " " + funk + " " + cots);
    var dataModule = {
      modl: modul,
      funkt: funk,
      scott: cots,
    };
    console.log(dataModule);
    if (modul == "" || funk == "" || cots == "") {
      alert("Inserire tutti i campi.");
      return false;
    }

    $.ajax({
      url: 'numodule.php',
      type: 'get',
      dataType: "json",
      contentType: "application/json",
      data: dataModule,
      complete: function(results) {
        var txtResp = JSON.parse(results.responseText);
        if (txtResp.status.localeCompare("ok")) {
          var t = $("#tabModul").DataTable();
          t.ajax.reload();
          alert("inserimento riuscito");
        } else {
          alert("inserimento non riuscito");
        }
      }
    });
  });
}

function loadLayout(data) {
  $("#IDpiva").find("option").remove().end();
  $("#groundZero").empty();

  $.ajax({
    url: 'retrDev.php',
    type: 'get',
    dataType: "json",
    contentType: "application/json",
    data: "",
    complete: function(results) {
      var txtResp = JSON.parse(results.responseText);
      var rowLenght = parseInt(txtResp.recordsTotal);
      if (rowLenght > 0) {
        for (var i = 0; i < rowLenght; i++) {
          var piva = txtResp.data[i].piva;
          $("#IDpiva").append('<option value="' + piva + '"> ' + piva + '</option>');
        }
      } else {
        alert('Nessuno sviluppatore');
      }
    }
  });

  $.ajax({
    url: 'retrModuli.php',
    type: 'get',
    dataType: "json",
    contentType: "application/json",
    data: "",
    complete: function(results) {
      var txtResp = JSON.parse(results.responseText);
      var rowLenght = parseInt(txtResp.recordsTotal);
      if (rowLenght > 0) {
        for (var i = 0; i < rowLenght; i++) {
          var id = txtResp.data[i].id;
          var nome = txtResp.data[i].nome;
          $("#groundZero").append('<input type="checkbox" value="' + id + '"/>' + nome + '<br>');
        }
      } else {
        alert('Nessun modulo');
      }
    }
  });
}

function handlerLayout(data) {
  $("#btnIns5").off('click');
  $('#btnIns5').click(function() {
    var nomelayout = document.newlayout.layout.value;
    var pivalayout = document.newlayout.IDpiva.value;
    if (nomelayout == "") {
      alert("tutti i campi sono obbligatori");
      return false;
    }
    var arrayModuli = [];
    $("#groundZero :checked").each(function() {
      var idMod = parseInt($(this).val());
      console.log(idMod);
      arrayModuli.push(idMod);
    });

    if (arrayModuli == "") {
      alert("Selezionare un modulo,")
    }

    var dataLayout = {
      layname: nomelayout,
      laypiva: pivalayout,
      layarray: arrayModuli,
    };
    console.log(dataLayout);

    $.ajax({
      url: 'nulayout.php',
      type: 'get',
      dataType: "json",
      contentType: "application/json",
      data: dataLayout,
      complete: function(results) {
        var txtResp = JSON.parse(results.responseText);
        if (txtResp.status.localeCompare("ok")) {
          var t = $("#tabLayout").DataTable();
          t.ajax.reload();
          alert("inserimento riuscito");
        } else {
          alert("inserimento non riuscito");
        }
      }
    });
  });
}

function loadSiti(data) {
  $("#IDcliente").find("option").remove().end();
  $("#IDlayout").find("option").remove().end();
  $.ajax({
    url: 'retrLayout.php',
    type: 'get',
    dataType: "json",
    contentType: "application/json",
    data: "",
    complete: function(results) {
      var txtResp = JSON.parse(results.responseText);
      var rowLenght = parseInt(txtResp.recordsTotal);
      if (rowLenght > 0) {
        for (var i = 0; i < rowLenght; i++) {
          var id = txtResp.data[i].id;
          var nome = txtResp.data[i].nome;
          $("#IDlayout").append('<option value="' + id + '">' + nome + '</option>');
        }
      } else {
        alert('Nessun layout');
      }
    }
  });

  $.ajax({
    url: 'retrClient.php',
    type: 'get',
    dataType: "json",
    contentType: "application/json",
    data: "",
    complete: function(results) {
      var txtResp = JSON.parse(results.responseText);
      var rowLenght = parseInt(txtResp.recordsTotal);
      if (rowLenght > 0) {
        for (var i = 0; i < rowLenght; i++) {
          var id = txtResp.data[i].id;
          $("#IDcliente").append('<option value="' + id + '">' + id + '</option>');
        }
      } else {
        alert('Nessun cliente');
      }
    }
  });
}

function handlerSiti(data) {
  $("#btnIns6").off('click');
  $('#btnIns6').click(function() {
    var urlsito = document.newsite.urlsito.value;
    var datesito = document.newsite.date.value;
    var clientesito = document.newsite.IDcliente.value;
    var layoutsito = document.newsite.IDlayout.value;

    var dataSite = {
      urlsito: urlsito,
      datesito: datesito,
      clientesito: clientesito,
      layoutsito: layoutsito
    };

    $.ajax({
      url: 'nusite.php',
      type: 'get',
      dataType: "json",
      contentType: "application/json",
      data: dataSite,
      complete: function(results) {
        var txtResp = JSON.parse(results.responseText);
        if (txtResp.status.localeCompare("ok")) {
          var t = $("#tabSiti").DataTable();
          t.ajax.reload();
          alert("inserimento riuscito");
        } else {
          alert("inserimento non riuscito");
        }
      }
    });
  });
}
