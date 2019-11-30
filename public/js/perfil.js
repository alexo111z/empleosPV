function mostrar_academica(){
    document.getElementById("CmbUniversidad").style.display = 'block';
    document.getElementById("TxtArea").style.display = 'block';
    document.getElementById("BtnGuardarAca").style.display = 'inline-block';
    document.getElementById("LblUniversidad").style.display = 'none';
    document.getElementById("LblArea").style.display = 'none';
    document.getElementById("BtnEditarAca").style.display = 'none';
    document.getElementById("SaveAca").style.display = 'inline-block';
}
function ocultar_academica(){
    document.getElementById("CmbUniversidad").style.display = 'none';
    document.getElementById("TxtArea").style.display = 'none';
    document.getElementById("BtnGuardarAca").style.display = 'none';
    document.getElementById("LblUniversidad").style.display = 'block';
    document.getElementById("LblArea").style.display = 'block';
    document.getElementById("BtnEditarAca").style.display = 'inline-block';
    document.getElementById("SaveAca").style.display = 'none';
}
function mostrar_conocimientos(){
    document.getElementById("TxtConocimientos").style.display = 'block';
    document.getElementById("BtnGuardarCon").style.display = 'inline-block';
    document.getElementById("BlockConocimientos").style.display = 'none';
    document.getElementById("BtnEditarCon").style.display = 'none';
    document.getElementById("SaveCon").style.display = 'inline-block';
}
function ocultar_conocimientos(){
    document.getElementById("TxtConocimientos").style.display = 'none';
    document.getElementById("BtnGuardarCon").style.display = 'none';
    document.getElementById("BlockConocimientos").style.display = 'block';
    document.getElementById("BtnEditarCon").style.display = 'inline-block';
    document.getElementById("SaveCon").style.display = 'none';
}

function mostrar_personal(){
    document.getElementById("CmbFecha").style.display = 'block';
    document.getElementById("DivSexo").style.display = 'block';
    document.getElementById("DivCiudad2").style.display = 'block';
    document.getElementById("BtnGuardarPersonal").style.display = 'inline-block';
    document.getElementById("SavePersonal").style.display = 'inline-block';
    document.getElementById("DivEdad").style.display = 'none';
    document.getElementById("DivCiudad").style.display = 'none';
    document.getElementById("TxtFecha").style.display = 'none';
    document.getElementById("TxtSexo").style.display = 'none';
    document.getElementById("BtnEditarPersonal").style.display = 'none';
}
function ocultar_personal(){
    document.getElementById("CmbFecha").style.display = 'none';
    document.getElementById("DivSexo").style.display = 'none';
    document.getElementById("DivCiudad2").style.display = 'none';
    document.getElementById("BtnGuardarPersonal").style.display = 'none';
    document.getElementById("SavePersonal").style.display = 'none';
    document.getElementById("DivEdad").style.display = 'block';
    document.getElementById("DivCiudad").style.display = 'block';
    document.getElementById("TxtFecha").style.display = 'block';
    document.getElementById("TxtSexo").style.display = 'block';
    document.getElementById("BtnEditarPersonal").style.display = 'inline-block';
}
function mostrar_contacto(){
    document.getElementById("TxtTel").style.display = 'block';
    document.getElementById("textEmail").style.display = 'none';
    document.getElementById("linea-infcontacto").style.display = 'none';
   // document.getElementById("TxtEmail").style.display = 'block';
    document.getElementById("DivPrivacidad").style.display = 'none';
    document.getElementById("DivPrivacidad2").style.display = 'block';
    document.getElementById("BtnGuardarContacto").style.display = 'inline-block';
    document.getElementById("LblTel").style.display = 'none';
    document.getElementById("LblEmail").style.display = 'none';
    document.getElementById("BtnEditarContacto").style.display = 'none';
    document.getElementById("SaveContacto").style.display = 'inline-block';
}
function ocultar_contacto(){
    document.getElementById("TxtTel").style.display = 'none';
    document.getElementById("textEmail").style.display = 'block';
    document.getElementById("linea-infcontacto").style.display = 'block';
   // document.getElementById("TxtEmail").style.display = 'none';
    document.getElementById("BtnGuardarContacto").style.display = 'none';
    document.getElementById("LblTel").style.display = 'block';
    document.getElementById("LblEmail").style.display = 'block';
    document.getElementById("BtnEditarContacto").style.display = 'inline-block';
    document.getElementById("DivPrivacidad").style.display = 'block';
    document.getElementById("DivPrivacidad2").style.display = 'none';
    document.getElementById("SaveContacto").style.display = 'none';
}
