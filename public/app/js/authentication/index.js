import { view } from './view.js';
import { controller } from './controller.js';

const resetPass = document.getElementById('resetPass');
const resetBtn = document.getElementById('resetBtn');
const emailForm = document.getElementById('emailForm');
const emailInput = document.getElementById('correo');
const errorFeedback = document.getElementById('errorFeedback');
const validationIcon = document.getElementById('validationIcon');
const toastMessage = document.getElementById('toastMessage');

const changePassForm = document.getElementById('changePassForm');
const newPassInput = document.getElementById('newPass');
const confirmPassInput = document.getElementById('confirmPass');
const feedbackError = document.getElementById('passMatchFeedback');

// Instanciar elementos interactivos utilizando la API de Bootstrap
const modalElement = document.getElementById('emailModal');
const bootstrapModal = new bootstrap.Modal(modalElement);

const toastElement = document.getElementById('successToast');
const bootstrapToast = new bootstrap.Toast(toastElement);

const btnChangePass = document.getElementById('btnChangePass');

// Expresión regular estándar para correo
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

document.addEventListener('DOMContentLoaded', (event) => {

    view.init();
    // Foco automático en el input al mostrarse el modal
    modalElement.addEventListener('shown.bs.modal', () => {
        emailInput.focus();
    });

    // Limpieza del estado del formulario y validación al cerrar
    modalElement.addEventListener('hidden.bs.modal', () => {
        emailForm.reset();
        clearValidation();
    });

    // Función para limpiar clases y mensajes
    const clearValidation = () => {
        emailInput.classList.remove('is-valid', 'is-invalid');
        errorFeedback.classList.add('d-none');
        validationIcon.innerHTML = '';
    };

    // Validación dinámica mientras el usuario escribe
    emailInput.addEventListener('input', () => {
        const value = emailInput.value.trim();

        if (value === '') {
            clearValidation();
            return;
        }

        if (emailRegex.test(value)) {
            // Estado Válido
            emailInput.classList.remove('is-invalid');
            emailInput.classList.add('is-valid');
            errorFeedback.classList.add('d-none');
            validationIcon.innerHTML = `<i class="bi bi-check-lg text-success fs-5"></i>`;
        } else {
            // Estado Inválido
            emailInput.classList.remove('is-valid');
            emailInput.classList.add('is-invalid');
            validationIcon.innerHTML = `<i class="bi bi-x-lg text-danger fs-5"></i>`;
        }
    });

    // Enviar formulario
    resetBtn.addEventListener('click', (event) => {
        event.preventDefault();
        const emailValue = emailInput.value.trim();

        if (emailRegex.test(emailValue)) {
            
            controller.resetPass();
            

            // Cerrar el modal usando API nativa de Bootstrap
            bootstrapModal.hide();

            // Esperar fin de la animación del modal para disparar el Toast
            setTimeout(() => {
                toastMessage.textContent = `Hemos reseteado la cuenta.`;
                bootstrapToast.show();
            }, 350);
        } else {
            // Forzar visualización de error si el usuario presiona enviar inválido
            emailInput.classList.remove('is-valid');
            emailInput.classList.add('is-invalid');
            errorFeedback.classList.remove('d-none');
            validationIcon.innerHTML = `<i class="bi bi-x-lg text-danger fs-5"></i>`;
            emailInput.focus();
        }
    });

    btnChangePass.addEventListener('click', (e) => {
        e.preventDefault(); // Evita el envío automático

        // Validar si los campos están vacíos o no cumplen con los requisitos mínimos de HTML5
        if (!changePassForm.checkValidity()) {
            changePassForm.classList.add('was-validated');
            return;
        }

        // Validar si las contraseñas coinciden
        if (newPassInput.value !== confirmPassInput.value) {
            confirmPassInput.classList.add('is-invalid');
            feedbackError.classList.remove('d-none');
            return;
        }

        // Si todo está correcto, aquí puedes procesar la petición (ej. usando fetch() a tu backend)
        confirmPassInput.classList.remove('is-invalid');
        feedbackError.classList.add('d-none');

        controller.resetPass();
        
        // Ejemplo de cómo cerrar el modal tras el éxito:
        const instance = bootstrap.Modal.getInstance(document.getElementById('changePasswordModal'));
        instance.hide();
        changePassForm.reset();
        changePassForm.classList.remove('was-validated');
    });

    // Limpiar alertas rojas mientras el usuario vuelve a escribir
    confirmPassInput.addEventListener('input', () => {
        if (newPassInput.value === confirmPassInput.value) {
            confirmPassInput.classList.remove('is-invalid');
            feedbackError.classList.add('d-none');
        }
    });
});