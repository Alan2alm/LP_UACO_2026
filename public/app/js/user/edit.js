import { view } from './view.js';
import { controller } from './controller.js';

const form = document.getElementById('editForm');
const inputs = form.querySelectorAll('input, select');
const btnEdit = document.getElementById('btnEdit');
const btnUpdate = document.getElementById('btnUpdate');
const btnCancel = document.getElementById('btnCancel');

const url = window.location.href;;
const segmentos = url.split('/');
const ultimoAtributo = segmentos.pop();

const editMode = (edit) => {
    inputs.forEach(input => input.disabled = !edit);
    btnEdit.classList.toggle('d-none', edit);
    btnUpdate.classList.toggle('d-none', !edit);
    btnCancel.classList.toggle('d-none', !edit);
};

document.addEventListener('DOMContentLoaded', () => {
    
    view.init();

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

/*
const form = document.getElementById('editForm');
const inputs = form.querySelectorAll('input, select');
const btnEdit = document.getElementById('btnEdit');
const btnUpdate = document.getElementById('btnUpdate');
const btnCancel = document.getElementById('btnCancel');

const editMode = (edit) => {
    inputs.forEach(input => input.disabled = !edit);
    btnEdit.classList.toggle('d-none', edit);
    btnUpdate.classList.toggle('d-none', !edit);
    btnCancel.classList.toggle('d-none', !edit);
};

btnEdit.addEventListener('click', () => editMode(true));

btnCancel.addEventListener('click', () => {
    form.reset();
    editMode(false);
});

form.addEventListener('submit', (event) => {
    event.preventDefault();
    if (form.checkValidity()) {
        editMode(false);
    } else {
        form.classList.add('was-validated');
    }
});*/