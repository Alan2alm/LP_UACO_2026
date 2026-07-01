import { view } from './view.js';
import { service } from './service.js';

//en el controller se llevan a cabo las instrucciones de guardado y demas.
//save, load, list, update, delete

export const controller = {
    load: async id => {
        let client = await service.load(id);
        view.loadClient(client);
    },
    save: () => {
        let data = Object.fromEntries(new FormData(view.forms.client));
        service.save(data);
    },
    list: async () => {
        let data = Object.fromEntries(new FormData(view.forms.filters));
        data.estado = parseInt(data.estado);
        data.resetPass = parseInt(data.resetPass);
        view.addValueExport();
        let clients = await service.list(data);
        view.listClients(clients);
    },
    update: () => {
        let data = Object.fromEntries(new FormData(view.forms.edit));
        data.id = parseInt(data.id);
        service.update(data);
        window.location.replace('client/index');
    },
    delete: async id => {
        //let client = await service.delete(id);
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