//aqui se actualiza la vista, las funciones deben limpiar o rellenar los formularios y cerrar ventanas emergentes.

export const view = {
    forms: {},
    table: {},
    init: () => {
        view.forms.filters = document.forms['formFilters'];
        view.forms.export = document.forms['formExport'];
        view.forms.sale = document.forms['formAlta'];
        view.forms.edit = document.forms['editForm'];
        view.table.tabla = document.querySelector('#salesList');
        if(view.table.tabla !== null){
            view.table.cuerpo = view.table.tabla.tBodies[0];
        };
        
    },
    resetForm: () => {
        if(view.forms.sale !== undefined){
            view.forms.sale.reset();
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
    listSales: sales => {
        sales.forEach((sale)=>{
            // 1. Crear la fila
            const fila = document.createElement("tr");
            fila.classList.add("text-wrap");
            fila.dataset.id = sale.id;

            // 2. Definir el contenido HTML de la fila
            fila.innerHTML = `
                <td class="text-wrap">${sale.numero_venta}</td>
                <td class="text-wrap">${sale.cliente}</td>
                <td class="text-wrap">${sale.fecha}</td>
                <td class="text-break">${sale.forma_pago}</td>
                <td class="text-wrap">${sale.codigo_producto}</td>
                <td class="text-wrap">${sale.cantidad}</td>
                <td class="text-wrap">${sale.precio_unitario}</td>
                <td class="text-wrap">${sale.total}</td>
                <td id="tdBtns" class="text-center text-wrap"></td>
            `;

            // 3. Crear los botones y asignarlos a la última celda
            const tdAcciones = fila.querySelector('#tdBtns');

            const btnEditar = document.createElement('a');
            btnEditar.href = `sale/edit/${sale.id}`;
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
    loadsale: (sale) => {
        //hacer que el div donde esta la fecha y estado cambien dependiendo de sus valores
        view.forms.edit.elements['numero_venta'].value = sale.numero_venta;
        view.forms.edit.elements['razon_social'].value = sale.cliente;
        view.forms.edit.elements['forma_pago'].value = sale.forma_pago;
        view.forms.edit.elements['codigo_producto'].value = sale.codigo_producto;
        view.forms.edit.elements['cantidad'].value = sale.cantidad;
        view.forms.edit.elements['precio_unitario'].value = sale.precio_unitario;
        view.forms.edit.elements['total'].value = sale.total;
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