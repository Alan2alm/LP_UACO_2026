import { view } from './view.js';
import { controller } from './controller.js';

const form = document.getElementById('editForm');
const inputs = form.querySelectorAll('input, select');
const btnEdit = document.getElementById('btnEdit');
const btnUpdate = document.getElementById('btnUpdate');
const btnCancel = document.getElementById('btnCancel');
const inputCantidad = document.getElementById('cantidad');
const inputPrecio = document.getElementById('precio_unitario');
const inputTotal = document.getElementById('total');

const editMode = (edit) => {
    inputs.forEach(input => input.disabled = !edit);
    btnEdit.classList.toggle('d-none', edit);
    btnUpdate.classList.toggle('d-none', !edit);
    btnCancel.classList.toggle('d-none', !edit);
};

document.addEventListener('DOMContentLoaded', () => {
    
    view.init();

    inputCantidad.addEventListener('input', (event) => {
        inputTotal.value = inputCantidad.value * inputPrecio.value;
    });

    inputPrecio.addEventListener('input', (event) => {
        inputTotal.value = inputCantidad.value * inputPrecio.value;
    });

    btnEdit.addEventListener('click', () => editMode(true));

    btnCancel.addEventListener('click', () => {
        form.reset();
        editMode(false);
    });

    btnUpdate.onclick = () => {
        if (form.checkValidity()) {
            //alert.classList.remove('d-none');
            form.classList.remove('was-validated');
            controller.update();
        } else {
            //alert.classList.add('d-none');
            form.classList.add('was-validated');
        }
    };



});