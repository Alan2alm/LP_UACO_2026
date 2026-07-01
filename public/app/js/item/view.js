//aqui se actualiza la vista, las funciones deben limpiar o rellenar los formularios y cerrar ventanas emergentes.

export const view = {
    forms: {},
    table: {},
    init: () => {
        view.forms.filters = document.forms['formFilters'];
        view.forms.export = document.forms['formExport'];
        view.forms.item = document.forms['formAlta'];
        view.forms.edit = document.forms['editForm'];
        view.table.tabla = document.querySelector('#itemsList');
        if(view.table.tabla !== null){
            view.table.cuerpo = view.table.tabla.tBodies[0];
        };
        
    },
    resetForm: () => {
        if(view.forms.item !== undefined){
            view.forms.item.reset();
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
    listItems: items => {
        items.forEach((item)=>{
            // 1. Crear la fila
            const fila = document.createElement("tr");
            fila.classList.add("text-wrap");
            fila.dataset.id = item.id;

            // 2. Definir el contenido HTML de la fila
            fila.innerHTML = `
                <td>${item.nombre}</td>
                <td>${item.codigo}</td>
                <td class="text-wrap">${item.descripcion}</td>
                <td>${item.categoria}</td>
                <td>$${item.precio}</td>
                <td>${item.stock}</td>
                <td id="tdBtns" class="text-center"></td>
            `;

            // 3. Crear los botones y asignarlos a la última celda
            const tdAcciones = fila.querySelector('#tdBtns');

            const btnEditar = document.createElement('a');
            btnEditar.href = `item/edit/${item.id}`;
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
    loadItem: (item) => {
        view.forms.edit.elements['nombre'].value = item.nombre;
        view.forms.edit.elements['precio'].value = item.precio;
        view.forms.edit.elements['stock'].value = item.stock;
        view.forms.edit.elements['categoriaProd'].value = item.categoria;
        view.forms.edit.elements['prodDescripcion'].value = item.descripcion;
    },
    listToArray: () => {
        const filas = Array.from(view.table.tabla.rows);

        // Extrae la primera fila como cabecera y limpia los espacios
        const cabeceras = Array.from(filas[0].cells).map(th => th.innerText.toLowerCase().trim());

        // Ignora la cabecera (slice(1)) y mapea el resto de filas a objetos
        const data = filas.slice(1).map(fila => {
        const objetoFila = {};
        Array.from(fila.cells).forEach((celda, indice) => {
            if(cabeceras[indice] != 'opciones'){
                objetoFila[cabeceras[indice]] = celda.innerText.trim();
            }
            
        });
        return objetoFila;
        });
        return data;
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