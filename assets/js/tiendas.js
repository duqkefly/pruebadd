var myForm  = document.querySelector("#tiendaForm");
var info   = document.querySelector("#info");

mail_regex= /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
num_regex = /^[0-9]+$/;
float_regex = /^([0-9])*[.]?[0-9]*$/;

myForm.addEventListener("submit",(e)=>{
    e.preventDefault();

    var nombre      = myForm.elements[0];
    var email       = myForm.elements[1];
    var phone       = myForm.elements[2];
    var descripcion = myForm.elements[3];

    var block = false; //Control de paso del form
   
    if(nombre.value == ''){
        block = true;
    }

    if(!mail_regex.test(email.value) || email.value == ''){
        block = true;
    }

    if(!num_regex.test(phone.value) || phone.value == ''){
        block = true;
    }

    if(descripcion.value == ''){
        block = true;
    }

    if(block == true){
        info.style.display = 'block';
        info.innerHTML = "Verifique llenar correctamente su información";
    }else{
        info.style.display = 'none';
        info.innerHTML = "";
        myForm.submit();
    }
})