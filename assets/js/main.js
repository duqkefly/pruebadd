/**
 * DECLARACIONES
 */
var myForm     = document.querySelector("#myForm");
var msje       = document.querySelector("#msje");
var msje1      = document.querySelector("#msje-1");
var msje2      = document.querySelector("#msje-2");
var email      = document.querySelector("#email");
var password   = document.querySelector("#password");

/**
 * Reseteo del Input al dar click
 */
email.addEventListener("click",()=>{
    msje.style.visibility = "hidden";
})

password.addEventListener("click",()=>{
    msje.style.visibility = "hidden";
})

//**VALIDAR FORMATO DE EMAIL**/
email.addEventListener("keyup",()=>{
    regex= /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    if(!regex.test(email.value)){
        msje1.style.color = 'rgb(180, 33, 52)';
        msje1.style.visibility = "visible"; 
        msje1.innerHTML = "<i class='fas fa-lock'></i> Ingrese formato de email válido: ejm.: algo@algo.com";
    }else{
        msje1.style.color = 'green';
        msje1.innerHTML = "<i class='fas fa-lock-open'></i> Muy bien, email válido";
        msje1.style.display = "block";
    }
});

/**
 * VALIDAR FORMATO DE PASSWORD
 */
password.addEventListener("keyup",()=>{
    regex= /^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/;
    if(!regex.test(password.value)){
        msje2.style.color = 'rgb(180, 33, 52)';
        msje2.style.visibility = "visible"; 
        msje2.innerHTML = " <div><i class='fas fa-lock'></i> Verifique almenos:</div> (1+) Mayuscula, (1+) minuscula, (1+) caracter especial";
    }else{
        msje2.style.color = 'green';
        msje2.innerHTML = "<i class='fas fa-lock-open'></i> Muy bien, password válido";
    }
});

/**
 * Envio de formulario de Login via ajax y redireccion
 */
myForm.addEventListener("submit",(e)=>{    
    e.preventDefault();
    if(email.value == "" || password.value == ""){
        msje.style.visibility = "visible";
        msje.classList.add("alert-danger");                       
        msje.innerHTML = "Ingrese toda la Informacion requerida";
    }else{
        grecaptcha.ready(function() {
            grecaptcha.execute('6LfWuOEUAAAAAGoJWPYMmIi3H47-jNT9-5_lqwFC', {action: 'form_sended'}).then(function(token) {
                myForm.elements[2].value = token;
                var formData = new FormData(myForm);
                xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if(xhr.readyState === 3){
                        console.log('authentication process...');
                    }
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        respuesta = xhr.response;
                        console.log(respuesta);
                        if(respuesta == '1'){
                            msje.style.visibility = "visible";
                            msje.classList.remove("alert-danger");
                            msje.classList.add("alert-success");
                            msje.innerHTML = "Login admin exitoso";    
                            setTimeout(()=>{
                                window.location = "main/succesfull_admin_login";
                            }, 1500);
                        }else if(respuesta == '2'){
                            msje.style.visibility = "visible";
                            msje.classList.remove("alert-danger");
                            msje.classList.add("alert-success");
                            msje.innerHTML = "Login de Usuario exitoso";     
                            setTimeout(()=>{
                                window.location = "main/succesfull_user_login";
                            }, 1500);
                        }else if(respuesta == '3'){
                            msje.style.visibility = "visible";
                            msje.classList.remove("alert-danger");
                            msje.classList.remove("alert-success");
                            msje.classList.add("alert-warning");
                            msje.innerHTML = "Debes actualizar tu password";    
                            setTimeout(()=>{
                                window.location = "main/updatePassword";
                            }, 1500);
                        }else{                       
                            msje.style.visibility = "visible";
                            msje.classList.remove("alert-success");
                            msje.classList.add("alert-danger");                       
                            msje.innerHTML = "Login no exitoso, verifique su informacion";
                            setTimeout(()=>{
                                window.location = "main";
                            }, 2000);
                        }
                    }
                }
                xhr.open("POST","main/recaptcha",true);
                xhr.send(formData);
                msje1.style.visibility  = "hidden";      
                msje2.style.visibility = "hidden";                
                myForm.reset();
            });
        });
    }
});