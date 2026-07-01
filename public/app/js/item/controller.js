import { view } from './view.js';
import { service } from './service.js';

//en el controller se llevan a cabo las instrucciones de guardado y demas.
//save, load, list, update, delete

/*let urlActual;
const patron = new URLPattern({ pathname: '/item/edit' });*/

export const controller = {
    load: async id => {
        let item = await service.load(id);
        view.loadItem(item);
    },
    save: () => {
        let data = Object.fromEntries(new FormData(view.forms.item));
        data.categoriaId = parseInt(data.categoriaId);
        data.stock = parseInt(data.stock);
        data.precio = parseFloat(data.precio);
        service.save(data);
    },
    list: async () => {
        //let items = await service.list(filters);
        //view.listItems(items);

        let data = Object.fromEntries(new FormData(view.forms.filters));
        data.categoriaId = parseInt(data.categoriaId);
        data.precio = parseFloat(data.precio);
        view.addValueExport();
        let items = await service.list(data);
        view.listItems(items);
    },
    update: () => {
        let data = Object.fromEntries(new FormData(view.forms.edit));
        data.categoriaId = parseInt(data.categoriaId);
        data.stock = parseInt(data.stock);
        data.precio = parseFloat(data.precio);
        service.update(data);
        window.location.replace('item/index');
    },
    delete: async id => {
        //let item = await service.delete(id);
        const idSend = { "id": id };
        await service.delete(idSend);
        /*urlActual = window.location.href;
        if(patron.test(urlActual.pathname)){
            window.location.href = 'item/index';
        }*/
    },
    resetForm: () => {
        view.resetForm();
    },
    resetList: () => {
        view.resetList();
    }
};