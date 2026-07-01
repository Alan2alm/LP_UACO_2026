//lleva a cabo los pedidos al back y genera mensajes o json resultantes.

export const service = {
    reset: correo => {
        fetch(`user/resetByMail`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(correo)
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