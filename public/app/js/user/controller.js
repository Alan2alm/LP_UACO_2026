import { view } from './view.js';
import { service } from './service.js';

//en el controller se llevan a cabo las instrucciones de guardado y demas.
//save, load, list, update, delete

let urlActual;
const patron = new URLPattern({ pathname: '/user/edit' });

export const controller = {
    load: async id => {
        let user = await service.load(id);
        view.loaduser(user);
    },
    save: () => {
        let data = Object.fromEntries(new FormData(view.forms.user));
        data.estado = parseInt(data.estado);
        data.resetPass = parseInt(data.resetPass);
        service.save(data);
    },
    list: async () => {
        //let users = await service.list(filters);
        //view.listUsers(users);

        let data = Object.fromEntries(new FormData(view.forms.filters));
        data.estado = parseInt(data.estado);
        data.resetPass = parseInt(data.resetPass);
        view.addValueExport();
        let users = await service.list(data);
        view.listUsers(users);
    },
    update: () => {
        let data = Object.fromEntries(new FormData(view.forms.edit));
        data.id = parseInt(data.id);
        data.estado = parseInt(data.estado);
        data.resetPass = parseInt(data.resetPass);
        service.update(data);
        window.location.replace('user/index');
    },
    delete: async id => {
        //let user = await service.delete(id);
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