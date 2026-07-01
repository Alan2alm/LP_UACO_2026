import { view } from './view.js';
import { service } from './service.js';

//en el controller se llevan a cabo las instrucciones de guardado y demas.
//save, load, list, update, delete

let urlActual;
const patron = new URLPattern({ pathname: '/sale/edit' });

export const controller = {
    load: async id => {
        let sale = await service.load(id);
        view.loadSale(sale);
    },
    save: () => {
        let data = Object.fromEntries(new FormData(view.forms.sale));
        data.cantidad = parseInt(data.cantidad);
        data.precio_unitario = parseFloat(data.precio_unitario);
        data.total = parseFloat(data.cantidad * data.precio_unitario);
        service.save(data);
    },
    list: async () => {
        //let sales = await service.list(filters);
        //view.listsales(sales);

        let data = Object.fromEntries(new FormData(view.forms.filters));
        data.cantidad = parseInt(data.cantidad);
        data.precio_unitario = parseFloat(data.precio_unitario);
        data.total = parseFloat(data.total);
        view.addValueExport();
        let sales = await service.list(data);
        view.listSales(sales);
    },
    update: () => {
        let data = Object.fromEntries(new FormData(view.forms.edit));
        data.cantidad = parseInt(data.cantidad);
        data.precio_unitario = parseFloat(data.precio_unitario);
        data.total = parseFloat(data.total);
        service.update(data);
        window.location.replace('sale/index');
    },
    delete: async id => {
        //let sale = await service.delete(id);
        const idSend = { "id": id };
        await service.delete(idSend);
    },
    exportToPDF: () => {
        //exporta los valores al pdf a traves de php si es posible.
    },
    resetForm: () => {
        view.resetForm();
    },
    resetList: () => {
        view.resetList();
    }
};