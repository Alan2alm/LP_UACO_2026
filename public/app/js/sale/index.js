import { view } from './view.js';
import { controller } from './controller.js';



document.addEventListener('DOMContentLoaded', () => {
    // Se inicializan las librerias externas
    view.init();

    // Se agrega funcionalidad a los botones de la vista
    document.querySelector('#btnNewSale').onclick = () => {
        window.location.href = 'sale/create';
    };

    //obtener los filtros de form de los filtros, enviarlos a traves del controller y actualizar la tabla.
    document.querySelector('#btnfiterList').onclick = () => {
        controller.resetList();
        controller.list();
    };

    document.querySelector('#btnClearFilters').onclick = () => {
        controller.resetList();
        controller.resetForm();
        controller.list();
    };
    

    //los botones de editar y borrar de la tabla se configuraran al cargar los elementos de la tabla.
    controller.list();    


    //Seleccionas un contenedor ancestro del btn Borrar.
    const contenedor = document.getElementById('salesList');

    //Escuchar los clics en el contenedor
    contenedor.addEventListener('click', function(evento) {
        //Verificas si el elemento clickeado es el btn Borrar
        if (evento.target && evento.target.id === 'btnBorrar') {
            if(confirm("¿Desea Eliminar la Venta?")){
                const padre = evento.target.parentElement;
                const ancestro = padre.parentElement;
                console.log(ancestro);
                controller.delete(ancestro.dataset.id);
                controller.resetList();
                controller.list();
            }
        }
    });
});
