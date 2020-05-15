var myForm  = document.querySelector("#tiendaForm");
var myForm2 = document.querySelector("#productoForm");
var info   = document.querySelector("#info");
var info2   = document.querySelector("#info2");

var nombre      = myForm.elements[0];
var email       = myForm.elements[1];
var phone       = myForm.elements[2];
var descripcion = myForm.elements[3];

var nombre2 = myForm2.elements[1];

mail_regex= /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
num_regex = /^[0-9]+$/;

myForm.addEventListener("submit",(e)=>{
    var block = false; //Control de paso del form
    e.preventDefault();
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

myForm2.addEventListener("submit",(e)=>{
    var block = false; //Control de paso del form
    e.preventDefault();
    
    if(nombre2.value == ''){
        block = true;
    }
    
    if(block == true){
        info2.style.display = 'block';
        info2.innerHTML = "Verifique llenar correctamente su información";
    }else{
        info2.style.display = 'none';
        info2.innerHTML = "";
        myForm2.submit();
    }

})