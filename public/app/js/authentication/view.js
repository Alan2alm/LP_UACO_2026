//aqui se actualiza la vista, las funciones deben limpiar o rellenar los formularios y cerrar ventanas emergentes.

export const view = {
    forms: {},
    init: () => {
        view.forms.session = document.forms['sessionForm'];
        view.forms.emailForm = document.forms['emailForm'];
        view.forms.changePassForm = document.forms['changePassForm'];
    },
    resetForm: () => {
        if(view.forms.session !== undefined){
            view.forms.session.reset();
        }
        if(view.forms.emailForm !== undefined){
            view.forms.emailForm.reset();
        }
        if(view.forms.changePassForm !== undefined){
            view.forms.changePassForm.reset();
        }
        
    },
    abrirModalPass: () =>{
        // Buscar el elemento del modal en el DOM
        const modalElement = document.getElementById('changePasswordModal');
        
        // Instanciar el objeto Modal de Bootstrap 5 y mostrarlo
        const changePassModal = new bootstrap.Modal(modalElement);
        changePassModal.show();
    }
};