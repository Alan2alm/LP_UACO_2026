import { view } from './view.js';
import { controller } from './controller.js';

const form = document.getElementById('formAlta');
const alert = document.getElementById('successAlert');
const claveInput = document.getElementById('clave');
const claveConfirmInput = document.getElementById('claveConfirm');


document.addEventListener('DOMContentLoaded', ()=>{

    view.init();
    
    //Asignacion de funcionalidad al boton de ALTA
    document.getElementById("btnRegistrar").onclick = () => {
        if (form.checkValidity() && (claveInput.value === claveConfirmInput.value)) {
          alert.classList.remove('d-none');
          form.classList.remove('was-validated');
          console.log(Object.fromEntries(new FormData(view.forms.user)));
          controller.save();
          view.resetForm();
        } else {
          alert.classList.add('d-none');
          form.classList.add('was-validated');
        }
    };
});