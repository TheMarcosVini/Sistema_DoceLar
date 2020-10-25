function geraRelat() {
    var doc = new jsPDF();
    now = new Date;
    var day = now.getDate();
    var year = now.getFullYear();
    var month = now.getMonth();
    month = month + 1;
    month = formatData(month);
    day = formatData(day);
    doc.autoTable({ html: "#tableDoc", theme: "striped" });
    var name ="Relatório: "+  day+"/"+month + "/" + year+" PAGAR";
    doc.save(name);
    function formatData(data){
        return data < 10 ?('0'+data) : data;
    }
}
