//aqui se actualiza la vista, las funciones deben limpiar o rellenar los formularios y cerrar ventanas emergentes.

export const view = {
    forms: {},
    table: {},
    init: () => {
        view.forms.filters = document.forms['formFilters'];
        view.forms.export = document.forms['formExport'];
        view.forms.user = document.forms['formAlta'];
        view.forms.edit = document.forms['editForm'];
        view.table.tabla = document.querySelector('#usersList');
        if(view.table.tabla !== null){
            view.table.cuerpo = view.table.tabla.tBodies[0];
        };
        
    },
    resetForm: () => {
        if(view.forms.user !== undefined){
            view.forms.user.reset();
        }else if(view.forms.filters !== undefined){
            view.forms.filters.reset();
        }else if(view.forms.edit !== undefined){
            view.forms.edit.reset();
        }
        
    },
    resetList: () => {
        if(view.table.cuerpo.childElementCount > 0){
            view.table.cuerpo.innerHTML="";
        }
    },
    listUsers: users => {
        users.forEach((user)=>{
            // 1. Crear la fila
            const fila = document.createElement("tr");
            fila.classList.add("text-wrap");
            fila.dataset.id = user.id;
            let estado;
            let resetP;

            if(user.estado === 1){
                estado = 'Activo';
            }else{
                estado = 'Inactivo';
            };

            if(user.resetPass === 1){
                resetP = 'Necesita Resetear';
            }else{
                resetP = 'Contraseña Funcional';
            };

            // 2. Definir el contenido HTML de la fila
            fila.innerHTML = `
                <td class="text-wrap">${user.nombres}</td>
                <td class="text-wrap">${user.apellido}</td>
                <td class="text-wrap">${user.cuenta}</td>
                <td class="text-break">${user.correo}</td>
                <td class="text-wrap">${user.perfil}</td>
                <td class="text-wrap">${estado}</td>
                <td class="text-wrap">${resetP}</td>
                <td class="text-wrap">${user.fechaAlta}</td>
                <td id="tdBtns" class="text-center text-wrap"></td>
            `;

            // 3. Crear los botones y asignarlos a la última celda
            const tdAcciones = fila.querySelector('#tdBtns');

            const btnEditar = document.createElement('a');
            btnEditar.href = `user/edit/${user.id}`;
            btnEditar.className = 'btn btn-sm btn-warning p-2 me-2';
            btnEditar.textContent = 'Editar';

            const btnBorrar = document.createElement('button');
            btnBorrar.className = 'btn btn-sm btn-danger p-2';
            btnBorrar.textContent = 'Borrar';
            btnBorrar.id = 'btnBorrar';

            // 4. Agregar los botones a la celda usando appendChild
            tdAcciones.appendChild(btnEditar);
            tdAcciones.appendChild(btnBorrar);

            // 5. agregar la fila a la tabla
            view.table.cuerpo.appendChild(fila);
        });
    },
    loadUser: (user) => {
        //hacer que el div donde esta la fecha y estado cambien dependiendo de sus valores
        view.forms.edit.elements['nombres'].value = user.nombres;
        view.forms.edit.elements['apellido'].value = user.apellido;
        view.forms.edit.elements['usuario'].value = user.usuario;
        view.forms.edit.elements['perfil'].value = user.perfil;
        view.forms.edit.elements['estado'].value = user.estado;
        view.forms.edit.elements['passReset'].value = user.passReset;
    },
    addValueExport: () => {
        if(view.forms.formFilters != undefined){
            view.forms.export.elements['id'].value = view.forms.formFilters.elements['id'].value;
        }
        if(view.forms.formFilters != undefined){
            view.forms.export.elements['categoriaId'].value = view.forms.formFilters.elements['categoriaId'].value;
        }
        if(view.forms.formFilters != undefined){
            view.forms.export.elements['precio'].value = view.forms.formFilters.elements['precio'].value;
        }
    }
};