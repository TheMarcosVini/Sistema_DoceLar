var itens = 0;
var itens2 = 0;
var itens3 = 0;
const total = [0];
var width = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
var options = '<?php require("../backend/order_mat.php")?>';
function addRow(){
  options = document.getElementById("optionsOK");
  itens++;
  var html = '<tr id=' + itens + '>';
  html += '<td>'
  html += '<select name="mat'+itens+'" style="width:150px;" class="custom-select mr-sm-2 " id="inlineFormCustomSelect" data-size="2">'
  html += options.innerHTML;
  html += '</select>'
  html += '</td>'
  html += '<td><input type="text" name="qtd'+ itens +'" id="qtd'+ itens +'" oninput="autoTotal(name),Total2(name)" class="form-control"  placeholder="Quantidade" value="0"></td>';
  html += '<td><input type="text" name="tam'+ itens +'" class="form-control"  placeholder="Tamanho"></td>';
  html += '<td><input type="text" name="val'+ itens +'" id="val'+ itens +'" oninput="autoTotal(name),Total2(name)"  class="form-control"  value="0" placeholder="Valor Unitário"></td>';
  html += '<td><input type="text" name="sub'+ itens +'" id="sub'+ itens +'"    class="form-control" value="0" placeholder="Valor Unitário"> </td>';
  html += '<td><input type="text" name="dat'+ itens +'" class="form-control"  placeholder="Data"></td>';
  html += '<td id='+ itens +' style="vertical-align: middle; text-align:center;" name='+ itens +'><a id='+ itens +' name='+ itens +' style="color:red;" class="feather-icon icon-trash" onclick="selectRow(), reloadArray(id), reloadValueTotal()"  ></a></td>';
  html +='</tr>';
  document.getElementById("table").insertRow().innerHTML = html;
  document.getElementById("cont").value = itens;
}
function selectRow(){
  var table = document.getElementById("tabs"),rIndex,cIndex;
  // table rows
  for(var i = 1; i < table.rows.length; i++){
    // row cells
    for(var j = 0; j < table.rows[i].cells.length; j++){
      table.rows[i].cells[j].onclick = function()
      {
        rIndex = this.parentElement.rowIndex;
        cIndex = this.cellIndex+1;
        if (cIndex == 7) {
          removeLinha(rIndex);
        }
      };
    }
  }
}
function removeLinha(rIndex) {
  document.getElementById("tabs").deleteRow(rIndex);
}
function reloadArray(name) {
  total.splice(name,1, 0);
}
function reloadValueTotal() {
  var soma = 0;
  for (var i = 0; i < total.length; i++) {
    soma = soma + total[i];
  }
  document.getElementById("total").value = soma.toFixed(2);
}
function autoTotal(name){
  name = name.substr(3);
  var sub = "sub" + name;
  var qtd = "qtd" + name;
  var valor = "val" + name;
  document.getElementById(sub).value= "";
  var Qtd = document.getElementById(qtd).value;
  var Preco = document.getElementById(valor).value;
  var ConvertQtd = parseFloat(Qtd.replace(',','.'));
  var ConvertPreco = parseFloat(Preco.replace(',','.'));
  var Total = parseFloat(ConvertQtd * ConvertPreco).toFixed(2);
  var ConvertTotal = Total .replace(',','.');
  document.getElementById(sub).value = ConvertTotal;
}
function Total2(name){
  name = name.substr(3);
  var realid = "sub" + name;
  var subTotal = document.getElementById(realid).value;
  subTotal = parseFloat(subTotal);
  total.splice(name,1, subTotal);
  var soma = 0;
  for (var i = 0; i < total.length; i++) {
    soma = soma + total[i];
  }
  document.getElementById("total").value = soma.toFixed(2);
}
function Total(id){
  var realid = id.substr(9);
  var mainID = "pedidoVal" + realid;
  var subTotal = document.getElementById(mainID).value;
  var realqtd = "pedidoQTD" +  realid;
  var qtd = document.getElementById(realqtd).value;
  qtd = parseFloat(qtd.replace(',','.'));
  subTotal = parseFloat(subTotal.replace(',','.'));
  subTotal = subTotal * qtd;
  total.splice(realid,1, subTotal);
  var soma = 0;
  for (var i = 0; i < total.length; i++) {
    soma = soma + total[i];
  }
  document.getElementById("total").value = soma.toFixed(2);
}
// arrays Para dados do pedido //
const quantity = [0];
const ambiente = [0];
const material = [0];
function arrayQtt(id){
  var qtt =  document.getElementById(id).value;
  var posicao = id.substr(9);
  quantity.splice(posicao,1, qtt );
}
function arrayAmb(id){
  var qtt =  document.getElementById(id).value;
  var posicao = id.substr(9);
  ambiente.splice(posicao,1, qtt );
}
function arrayMat(id){
  var qtt =  document.getElementById(id).value;
  var posicao = id.substr(10);
  material.splice(posicao,1, qtt );
}
// arrays Para dados do pedido //
function addRow2(){
  itens2++;
  total.splice(itens2,1, 0 );
  var html = '<tr id=' + itens2 + '>';
  html += '<td><input type="text" class="form-control" onchange="arrayQtt(id), Total(id), reloadSub(id)" name="pedidoQTD'+ itens2 +'" id="pedidoQTD'+ itens2 +'" placeholder="Quantidade" value="0"></td>';
  html += '<td><input type="text" class="form-control" onchange="arrayAmb(id)" name="pedidoAmb'+ itens2 +'" id="pedidoAmb'+ itens2 +'" placeholder="Ambiente" "></td>';
  html += '<td><input type="text" class="form-control" onchange="arrayMat(id)" name="pedidoAcab'+ itens2 +'" id="pedidoAcab'+ itens2 +'" placeholder="Acabamento/Material" ></td>';
  html += '<td><input type="text" class="form-control" name="pedidoValor'+ itens2 +'" id="pedidoVal'+ itens2 +'" oninput="Total(id), reloadSub(id)" placeholder="" value="0"></td>';
  html += '<td><input type="text" class="form-control" name="subT'+ itens2 +'" id="subT'+ itens2 +'" readonly  placeholder="" value=""></td>';
  html += ''
  html += '</tr>'
  document.getElementById("table").insertRow().innerHTML = html;
}
function reloadSub(id) {
  var posicao = id.substr(9);
  var realid = "subT" + posicao;
  document.getElementById(realid).value = total[posicao].toFixed(2);
}
function resetRows(){
  var table = document.getElementById("tabs"),rIndex,cIndex;
  for(var i = -12; i < table.rows.length; i++){
    document.getElementById("table2").deleteRow(-1);
  }
  var itens3 = 0;
  addRow3(itens3);
}
function recalVal(){
  var valor = 0.00;
  var parcelas = document.getElementById('parcelas').value;
  for (var i = 1; i <= parcelas; i++) {
    var realid = "valor" + i;
    var val = document.getElementById(realid).value;
    val = val.replace(".", "");
    val = val.replace(",", ".");
    val = parseFloat(val);
    valor = valor + val;
  }
  valor = valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
  document.getElementById("total2").value = valor;
}
function addRow3(itens3){
  var QtdParcelas = document.getElementById("parcelas").value;
  var totalParcelas = document.getElementById("total").value;
  var valorParcela = totalParcelas/QtdParcelas;
  var desconto = document.getElementById('desconto').value;
  var valorParcela = valorParcela.toFixed(2) * (1 -(desconto / 100) );
  valorParcela = valorParcela.toFixed(2);
  var valorDescontado = totalParcelas * (1 -(desconto / 100) );
  document.getElementById("total2").value = valorDescontado.toFixed(2);
  for (var i = 0; i < QtdParcelas; i++) {
    itens3++;
    var html = '<tr id=' + itens3 + '>';
    html += '<td><input  type="number" class="form-control" name="numeroPCL'+ itens3 +'" value="'+ itens3 +'" id="qtd'+ itens3 +'" placeholder="'+itens3+'"></td>';
    html += '<td><input type="text" class="form-control"  oninput="recalVal()" name="valorPCL'+ itens3 +'"" value="'+valorParcela +'" id="valor'+ itens3 +'" placeholder="0,00" "></td>';
    html += '<td><input type="text"  class="form-control"  name="dataPCL'+ itens3 +'"  id="data'+ itens3 +'" placeholder="Data" ></td>';
    html += ''
    html += '</tr>'
    document.getElementById("table2").insertRow().innerHTML = html;
  }
  $("#data1").change(function(){
    var dataDigitada = document.getElementById('data1').value;
    //Pegar data Atual para somar
    var currentDate = parseDate(dataDigitada);
    //pegar data atual para exibir
    var currentDate1 = new Date();
    //Capturar Quantidade de meses
    var meses = "1";
    //Parse Int dos meses
    //Trazer data Atual
    currentDate1.setDate(currentDate1.getDate());
    //Exibir a data ja atualizada
    var QtdParcelas = document.getElementById("parcelas").value;
    var inc = 2;
    for (var i = 1; i < QtdParcelas; i++) {
      var realid = "data" + inc ;
      var a = parseInt(meses);
      currentDate.setMonth(currentDate.getMonth() + a);
      document.getElementById(realid).value = currentDate.toLocaleDateString();
      inc++;
      a++;
    }
  });
}
function parseDate(texto) {
  let dataDigitadaSplit = texto.split("/");
  let dia = dataDigitadaSplit[0];
  let mes = dataDigitadaSplit[1];
  let ano = dataDigitadaSplit[2];
  if (ano < 4 && parseInt(ano) < 50) {
    ano = "20" + ano;
  } else if (ano < 4 && parseInt(ano) >= 50) {
    ano = "19" + ano;
  }
  ano = parseInt(ano);
  mes = mes - 1;
  return new Date(ano, mes, dia);
}


// function dataParcelas(id){
//   var dataDigitada = document.getElementById(id).value;
//   //Pegar data Atual para somar
//   var currentDate = parseDate(dataDigitada);
//   //pegar data atual para exibir
//   var currentDate1 = new Date();
//   //Capturar Quantidade de meses
//   var meses = "1";
//   //Parse Int dos meses
//   //Trazer data Atual
//   currentDate1.setDate(currentDate1.getDate());
//   //Exibir a data ja atualizada
//   var QtdParcelas = document.getElementById("parcelas").value;
//   var inc = 2;
//   for (var i = 1; i < QtdParcelas; i++) {
//     var realid = "data" + inc ;
//     var a = parseInt(meses);
//     currentDate.setMonth(currentDate.getMonth() + a);
//     document.getElementById(realid).value = currentDate.toLocaleDateString();
//     inc++;
//     a++;
//   }
// }
function situation(id){
  var realid = id.substr(0,4);
  var realid2 = id.substr(4);
  switch (realid) {
    case "btn1":
    var btn2 = "btn2" + realid2;
    document.getElementById(id).style.display = 'none';
    document.getElementById(btn2).style.display = 'block';
    var value = "fechada";
    $.ajax({
      url:'../backend/res_sit.php',
      method: 'POST',
      data: {valor: value, orc:realid2},
      success: function(result) {}
    });
    break;
    case "btn2":
    var btn1 = "btn1" + realid2;
    document.getElementById(id).style.display = 'none';
    document.getElementById(btn1).style.display = 'block';
    var value = "aberta";
    $.ajax({
      url:'../backend/res_sit.php',
      method: 'POST',
      data: {valor: value, orc:realid2},
      success: function(result) {}
    });
    break;
  }
}
window.onload = function() {
  (function() { //keep the global space clean
    ///// STEP 0 - setup
    // source data table and canvas tag
    var data_table = document.getElementById('mydata');
    var canvas = document.getElementById('canvas');
    var td_index = 1; // which TD contains the data
    ///// STEP 1 - Get the, get the, get the data!
    // get the data[] from the table
    var tds, data = [], color, colors = ['#99e599', '#ff9e81'], value = 0, total = 0;
    var trs = data_table.getElementsByTagName('tr'); // all TRs
    for (var i = 0; i < trs.length; i++) {
      tds = trs[i].getElementsByTagName('td'); // all TDs
      if (tds.length === 0) continue; //  no TDs here, move on
      // get the value, update total
      value  = parseFloat(tds[td_index].innerHTML);
      data[data.length] = value;
      total += value;
      // random color
      color = getColor();
      colors[colors.length] = color; // save for later
      // trs[i].style.backgroundColor = color; // color this TR
    }
    ///// STEP 2 - Draw pie on canvas
    // exit if canvas is not supported
    if (typeof canvas.getContext === 'undefined') {
      return;
    }
    // get canvas context, determine radius and center
    var ctx = canvas.getContext('2d');
    var canvas_size = [canvas.width, canvas.height];
    var radius = Math.min(canvas_size[0], canvas_size[1]) / 2;
    var center = [canvas_size[0]/2, canvas_size[1]/2];
    var sofar = 0; // keep track of progress
    // loop the data[]
    for (var piece in data) {
      var thisvalue = data[piece] / total;
      ctx.beginPath();
      ctx.moveTo(center[0], center[1]); // center of the pie
      ctx.arc(  // draw next arc
        center[0],
        center[1],
        radius,
        Math.PI * (- 0.5 + 2 * sofar), // -0.5 sets set the start to be top
        Math.PI * (- 0.5 + 2 * (sofar + thisvalue)),
        false
      );
      ctx.lineTo(center[0], center[1]); // line back to the center
      ctx.closePath();
      ctx.fillStyle = colors[piece];    // color
      ctx.fill();
      sofar += thisvalue; // increment progress tracker
    }
    ///// DONE!
    // utility - generates random color
    function getColor() {
      var rgb = [];
      for (var i = 0; i < 3; i++) {
        rgb[i] = Math.round(100 * Math.random() + 155) ; // [155-255] = lighter colors
      }
      return 'rgb(' + rgb.join(',') + ')';
    }
  })() // exec!
}
function cad_classe(){
  var value = document.getElementById('txtClass').value;
  document.getElementById('txtClass').value = "";
  if (value !== "") {
    $.ajax({
      url:'../backend/res_cad_classe.php',
      method: 'POST',
      data: {valor: value},
      success: function(result){}
    });
  }
  window.location.reload();
}
//replace(/[^\d]+/g,'') <------- apenas numeros//
function popup(id){
  document.getElementById('popup').style.display = 'block';
  document.getElementById('popup2').style.display = 'block';
  document.getElementById('tudo').style.display = 'block';
  var conf = $('#confirmer').val();
  if (conf == 2) {
    $( "#retMat" ).click(function() {
      var valor = $('#qtd').val();
      $.ajax({
        url:'../backend/res_ret_mat.php',
        method: 'POST',
        data: {valor: valor, id: id},
        success: function(result){
          $('#qtd').val("");
        },
        success: function(result){
          window.location.reload();
        },
      });
    });
  }

}
function closeThis(){
  document.getElementById('popup').style.display = 'none';
  document.getElementById('popup2').style.display = 'none';
  document.getElementById('tudo').style.display = 'none';
  window.location.reload();
}
function verifica(){
  if (document.getElementById('tipo').value != "" &&
  document.getElementById('valor_conta').value != "" &&
  document.getElementById('dataCompra').value != "" &&
  document.getElementById('dataFinal').value != "" &&
  document.getElementById('desc').value != "") {
    cadConta();
    document.getElementById('tipo').value == "";
    document.getElementById('valor_conta').value = "";
    document.getElementById('dataCompra').value ="";
    document.getElementById('dataFinal').value = "";
    document.getElementById('desc').value = "";
  }else {
    alert("Informe todos os campos");
  }
}
function efeito() {
  document.getElementById('sucesso').style.animation = "";
  setTimeout(() => document.getElementById('sucesso').style.animation = "fadeout 2s ease-in-out", 5);
}
var movein = false;
var moveout = false;
function moveIn(e){
  if(!movein){
    setTimeout(() => document.getElementById(e).style.marginTop = "-10px", 1);
    movein = true;
    moveout = false;
  }
}
function moveOut(e){
  if(!moveout){
    setTimeout(() => document.getElementById(e).style.marginTop = "0px", 1);
    movein = false;
    moveout = true;
  }
}
function cadConta(){
  var tipo = $("#tipo").val();
  var valor_conta = $("#valor_conta").val();
  var dataCompra = $("#dataCompra").val();
  var dataFinal = $("#dataFinal").val();
  var descri = $("#desc").val();
  $.ajax({
    url:'../backend/res_cad_conta.php',
    method: 'POST',
    data: {tipo: tipo, valor_conta: valor_conta, dataCompra: dataCompra, dataFinal: dataFinal, descri: descri},
    success: function(result) {
      efeito();
      
    },
    fail: function(result){
      console.error();
    }
  });
}
function abrirSecao(secao){
  window.open(""+secao+"", "_parent");
}
