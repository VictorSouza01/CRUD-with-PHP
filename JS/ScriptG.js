function verifica_simbolo(){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) {
        return true;
    }
    else{
    	if (tecla==8 || tecla==0){
            return true;
        } 
	    else {
            alert("Somente números")
            return false;
        }
    }
}
function GerarSenha(){
    var chars;
    var password = "";

    chars = "0123456789abcdefABCDEF"
    for (var i = 0; i < 15; i++) {
        var randomNumber = Math.floor(Math.random() * chars.length);
        password += chars.substring(randomNumber, randomNumber + 1);
      }
      document.getElementById('txt_password').value = password
}
function MostrarSenha(){
    var senha = document.getElementById("txt_password").type;
    var retorno = senha == "password" ? "text":"password"; //Operador ternario para definir o valor da variavel retorno
    document.getElementById("txt_password").type = retorno;
}
function Copiar(){
    var senha = document.getElementById("txt_password").value;
    navigator.clipboard.writeText(senha);
}
var validacao; //Variavel para verificação na hora de cadastrar
function checarEmail(field) {
    usuario = field.value.substring(0, field.value.indexOf("@"));
    dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
    
    if ((usuario.length >=1) &&
        (dominio.length >=3) &&
        (usuario.search("@")==-1) &&
        (dominio.search("@")==-1) &&
        (usuario.search(" ")==-1) &&
        (dominio.search(" ")==-1) &&
        (dominio.search(".")!=-1) &&
        (dominio.indexOf(".") >=1)&&
        (dominio.lastIndexOf(".") < dominio.length - 1)) {
            MensagemErrorSair(idText)
            validacao = 0;
    }
    else{
        idText="txt_email";
        msg="E-mail inválido!";
        MensagemError(msg, idText);
    }
}
function MascaraCPF(){
    var cpf = document.getElementById("txt_cpf");
    var tecla=(window.event)?event.keyCode:e.which;   

    if (cpf.value.length==3 || cpf.value.length==7){
        if (tecla == 8){}
        else{
            cpf.value += "."
        }
    }
    else if (cpf.value.length==11){
        if (tecla == 8){}
        else{
            cpf.value += "-"
        }
    }
}
function MascaraTel(){
    var tel = document.getElementById("txt_tel");
    var tecla=(window.event)?event.keyCode:e.which;   

    if (tel.value.length==1){
        if(tel.value=="("){}
        else{
            if (tecla == 8){}
            else{
                tel.value = "(" + tel.value
            }
        }
    }
    else if(tel.value.length==3){
        if (tecla == 8){}
        else{
            tel.value += ")"
        } 
    }
    else if (tel.value.length==9){
        if (tecla == 8){}
        else{
            tel.value += "-"
        }
    }
}
function MensagemErrorSair(idText){
    document.getElementById(idText).style.borderBottomColor = "rgb(150,150,150)";
    document.getElementById("msgemail").innerHTML="<font color='red'></font>";
}

function MensagemError(msg, idText){ //function pra mensagem
    document.getElementById("msgemail").innerHTML =  "<font color='red'>" + msg + "</font>";
    document.getElementById(idText).style.borderBottomColor = "red";
    setTimeout(function (){
        document.getElementById("msgemail").innerHTML = "<font color='red'></font>";
    }, 800)
}

function ValidacaoQtd(){
    var cpf = document.getElementById("txt_cpf");

    if(cpf.value.length < 14){
        idText="txt_cpf";
        msg="CPF Inválido";
        MensagemError(msg, idText);
    }
    else{
        MensagemErrorSair(idText)
    }
}
function ValidacaoQtdTEL(){
    var tel = document.getElementById("txt_tel");

    if(tel.value.length < 14){
        idText="txt_tel";
        msg="Telefone Inválido";
        MensagemError(msg, idText);
    }
    else{
        MensagemErrorSair(idText)
    }
}
function verifica_email(){
    var email = document.getElementById("txt_email").value;
    var tel = document.getElementById("txt_tel");
    var cpf = document.getElementById("txt_cpf");

    if(validacao==1 || email == ""){
        idText="txt_email";
        msg="E-mail Inválido!";
        MensagemError(msg, idText);
    }
    else if(tel.value.length < 14){
        idText="txt_tel";
        msg="CPF ou Telefone inválido!";
        MensagemError(msg, idText);
    }
    else if(cpf.value.length < 14){
        idText="txt_cpf";
        msg="CPF ou Telefone inválido!";
        MensagemError(msg, idText);
    }
    else{
        document.frm_cadastro.action='PHP/gravar.php';
    }
}
function RevelaElemento(){
    document.getElementById("TituloCopiar").opacity = "1";
    document.getElementById("TextoApresentado").style.opacity = "1";
    document.getElementById("TituloCopiar").innerHTML = "<font color='red'>Copiar Senha</font>";
    document.getElementById("TextoApresentado").style.border = "2px solid red";
    document.getElementById("TextoApresentado").style.borderTopLeftRadius = "10px"
    document.getElementById("TextoApresentado").style.borderBottomRightRadius ="10px"
}
function EsconderElemento(){
    document.getElementById("TituloCopiar").innerHTML = "<font color='red'></font>";
    document.getElementById("TituloCopiar").opacity = "0";
    document.getElementById("TextoApresentado").style.opacity = "0";
}