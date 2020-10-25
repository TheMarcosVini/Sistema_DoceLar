function geraRelat(){
    var doc = new jsPDF();
    now = new Date;
    var day = now.getDate();
    var year = now.getFullYear();
    var month = now.getMonth();
    month = month + 1;
    month = formatData(month);
    day = formatData(day);
    var name ="Relatório: "+  day+"/"+month + "/" + year + " RECEBER";

    for (let i = 1; i < 13; i++) {
        doc.autoTable({html:"#tableDoc"+i,theme: "striped"});
    }
    doc.save(name);
    function formatData(data){
        return data < 10 ?('0'+data) : data;
    }
}
