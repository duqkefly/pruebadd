var myForm  = document.querySelector("#tiendaForm");
var myForm2 = document.querySelector("#productoForm");
var info   = document.querySelector("#info");
var info2   = document.querySelector("#info2");

/* var nombre      = myForm.elements[0];
var email       = myForm.elements[1];
var phone       = myForm.elements[2];
var descripcion = myForm.elements[3]; */

/* var nombre2 = myForm2.elements[1];
var descripcion2 = myForm.elements[3];
var valor = myForm.elements[4];
var imagen = myForm.elements[5]; */

mail_regex= /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
num_regex = /^[0-9]+$/;

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

myForm2.addEventListener("submit",(e)=>{
    e.preventDefault();
    var block = false; //Control de paso del form

    var nombre2      = myForm2.elements[1];
    var descripcion2 = myForm2.elements[3];
    var valor        = myForm2.elements[4];
    var imagen       = myForm2.elements[5];    

    if(nombre2.value == ''){
        block = true;
    }

    if(descripcion2.value == ''){
        block = true;
    }

    if(!num_regex.test(valor.value) || valor.value == ''){
        block = true;
    }

    if(imagen.value == ''){
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