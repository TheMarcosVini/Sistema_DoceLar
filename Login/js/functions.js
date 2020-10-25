function confirmarDel(){
	document.getElementById("confirm1").style.display = "block";
}
function showPass(){
	var tipo = document.getElementById("pass");
		if (tipo.type == "password") {
			tipo.type= "text";
		}else{
			tipo.type = "password";
		}
}
function letterOnly(){
    evt = window.event;
    var tecla = evt.keyCode;
    var letters =  [193, 195, 201, 202, 205, 211, 212, 218, 225, 227 ,233, 237, 243, 244, 250];

    if(tecla >= 33 && tecla <= 64 || tecla >= 91 && tecla <= 96 || tecla >=123 && tecla <= 191 || tecla >= 383){

      evt.preventDefault();
    }
}
function passChars(){
	evt = window.event;
    var tecla = evt.keyCode;

    if(tecla >= 32 && tecla <=47 || tecla >= 58 && tecla <= 63 || tecla >= 91 && tecla <= 96 ){

      evt.preventDefault();
    }
}
