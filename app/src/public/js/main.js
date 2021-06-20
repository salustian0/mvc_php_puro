window.onload = function(){
    /**
     * Validando campos
     * @type {NodeListOf<Element>}
     */
    const required = document.querySelectorAll(".required");
    const form = document.querySelectorAll(".validate-form");

    for(let i =0; i < form.length; i++){
        let current_form = form[i];
        current_form.addEventListener("submit",function(e){
            let required_fields  = current_form.querySelectorAll(".required");
            for (let i = 0; i < required_fields.length; i++){
                let current = required_fields[i];
                current.removeAttribute('style', 'borderColor');
                let error_info_element = current.parentNode.querySelectorAll(".error-info");
                for (let j = 0; j  < error_info_element.length; j++){
                    error_info_element[j].parentNode.removeChild(error_info_element[j]);
                }

                if(current.value === ""){
                    e.preventDefault();
                    current.style.borderColor = "red";
                    let msg_error = document.createElement("p");
                    msg_error.innerText = "Esse campo não pode ser nulo!";
                    msg_error.className = "error-info";
                    msg_error.style.color = "red";
                    current.after(msg_error);
                }
            }
        });
    }


}