import { view } from './view.js';
import { controller } from './controller.js';

const form = document.getElementById('formAlta');
const alert = document.getElementById('successAlert');
/*(function () {
  'use strict'
  
  

  form.addEventListener('submit', event => {
    event.preventDefault();
    event.stopPropagation();

    if (form.checkValidity()) {
      alert.classList.remove('d-none');
      form.classList.remove('was-validated');
      form.reset();
    } else {
      alert.classList.add('d-none');
      form.classList.add('was-validated');
    }
  }, false);
})();*/

document.addEventListener('DOMContentLoaded', ()=>{

    view.init();
    
    //Asignacion de funcionalidad al boton de ALTA
    document.getElementById("btnRegistrar").onclick = () => {
        if (form.checkValidity()) {
          alert.classList.remove('d-none');
          form.classList.remove('was-validated');
          console.log(Object.fromEntries(new FormData(view.forms.item)));
          controller.save();
          view.resetForm();
        } else {
          alert.classList.add('d-none');
          form.classList.add('was-validated');
        }
    };
});