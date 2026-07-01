import { view } from './view.js';
import { controller } from './controller.js';

const form = document.getElementById('formAlta');
const alert = document.getElementById('successAlert');
const inputCantidad = document.getElementById('cantidad');
const inputPrecio = document.getElementById('precio_unitario');
const inputTotal = document.getElementById('total');
  

document.addEventListener('DOMContentLoaded', () => {

  view.init();

  inputCantidad.addEventListener('input', (event) => {
    inputTotal.value = inputCantidad.value * inputPrecio.value;
  });

  inputPrecio.addEventListener('input', (event) => {
    inputTotal.value = inputCantidad.value * inputPrecio.value;
  });

  
      
  document.getElementById("btnRegistrar").onclick = () => {
      if (form.checkValidity()) {
        alert.classList.remove('d-none');
        form.classList.remove('was-validated');
        console.log(Object.fromEntries(new FormData(view.forms.sale)));
        controller.save();
        view.resetForm();
      } else {
        alert.classList.add('d-none');
        form.classList.add('was-validated');
      }
  };
});