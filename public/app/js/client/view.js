//aqui se actualiza la vista, las funciones deben limpiar o rellenar los formularios y cerrar ventanas emergentes.

export const view = {
    forms: {},
    table: {},
    init: () => {
        view.forms.filters = document.forms['formFilters'];
        view.forms.export = document.forms['formExport'];
        view.forms.client = document.forms['formAlta'];
        view.forms.edit = document.forms['editForm'];
        view.table.tabla = document.querySelector('#clientsList');
        if(view.table.tabla !== null){
            view.table.cuerpo = view.table.tabla.tBodies[0];
        };
        
    },
    resetForm: () => {
        if(view.forms.client !== undefined){
            view.forms.client.reset();
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
    listClients: clients => {
        clients.forEach((client)=>{
            // 1. Crear la fila
            const fila = document.createElement("tr");
            fila.classList.add("text-wrap");
            fila.dataset.id = client.id;

            // 2. Definir el contenido HTML de la fila
            fila.innerHTML = `
                <td class="text-wrap">${client.nombres}</td>
                <td class="text-wrap">${client.apellido}</td>
                <td class="text-wrap">${client.tipo}</td>
                <td class="text-wrap">${client.razon_social}</td>
                <td class="text-wrap">${client.cuit}</td>
                <td class="text-wrap">${client.dni}</td>
                <td class="text-wrap">${client.correo}</td>
                <td class="text-wrap">${client.telefono}</td>
                <td class="text-wrap">${client.domicilio}</td>
                <td id="tdBtns" class="text-center text-wrap"></td>
            `;

            // 3. Crear los botones y asignarlos a la última celda
            const tdAcciones = fila.querySelector('#tdBtns');

            const btnEditar = document.createElement('a');
            btnEditar.href = `client/edit/${client.id}`;
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
    loadclient: (client) => {
        //hacer que el div donde esta la fecha y estado cambien dependiendo de sus valores
        view.forms.edit.elements['nombres'].value = client.nombres;
        view.forms.edit.elements['apellido'].value = client.apellido;
        view.forms.edit.elements['tipo'].value = client.tipo;
        view.forms.edit.elements['razon_social'].value = client.razon_social;
        view.forms.edit.elements['cuit'].value = client.cuit;
        view.forms.edit.elements['dni'].value = client.dni;
        view.forms.edit.elements['correo'].value = client.correo;
        view.forms.edit.elements['telefono'].value = client.telefono;
        view.forms.edit.elements['domicilio'].value = client.domicilio;
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