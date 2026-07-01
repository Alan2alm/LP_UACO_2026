//lleva a cabo los pedidos al back y genera mensajes o json resultantes.

export const service = {
    load: async id => {
        let result = [];
        await fetch('client/load', {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(id)
        })
        .then(response => {
            if (response.ok) return response.json();
            throw new Error(response, response.status);
        })
        .then(data => { 
            if(data.success){
                result = data.data;
            }
            else {
                alert(data.message);
            }
        })
        .catch(error => { console.error("Ha ocurrido un error", error); });

        return result;
    },
    save: client => {
        fetch('client/save', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(client)
        })
        .then(response => {
            if (response.ok) return response.json();
            throw new Error(response, response.status);
        })
        .then(data => { 
            if(data.success){
                alert(data.message);
            }
            else {
                alert(data.message);
            }
        })
        .catch(error => { console.error("Ha ocurrido un error", error); });
    },
    list: async (filters = {}) => {
        let result = [];
        await fetch('client/list', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(filters)
        })
        .then(response => {
            if (response.ok) return response.json();
            throw new Error(response, response.status);
        })
        .then(data => { 
            if(data.success){
                result = data.data;
            }
            else {
                alert(data.message);
            }
        })
        .catch(error => { console.error("Ha ocurrido un error", error) });

        return result;
    },
    delete: id => {
        fetch(`client/delete`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(id)
        })
        .then(response => {
            if (response.ok) return response.json();
            throw new Error(response, response.status);
        })
        .then(data => { 
            if(data.success){
                alert(data.message);
            }
            else {
                alert(data.message);
            }
        })
        .catch(error => { console.error("Ha ocurrido un error", error); });
    },
    update: client => {
        fetch('client/update', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(client)
        })
        .then(response => {
            if (response.ok) return response.json();
            throw new Error(response, response.status);
        })
        .then(data => { 
            if(data.success){
                alert(data.message);
            }
            else {
                alert(data.message);
            }
        })
        .catch(error => { console.error("Ha ocurrido un error", error); });
    }
};