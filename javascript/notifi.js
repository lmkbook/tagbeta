class UI{
    showmessage(messege){
        const div = document.createElement('div');
        div.className = 'msje';
        div.appendChild(document.createTextNode(`${messege}`));
        const cont = document.querySelector('.cont');
        const tainer = document.querySelector('#tainer');
        cont.insertBefore(div, tainer);
        div.scrollIntoView({ behavior: 'smooth', block: 'center' });
        setTimeout(() => {
            document.querySelector('.msje').remove();
        }, 5000);
    }
}
const ui = new UI();
window.addEventListener('load', function(){
    $.ajax({
        url: '../controller/nticofirm.php',
        method: 'POST',
        dataType: 'json',
        success: function(rta){
            console.log(rta);
            const select = document.getElementById('select');
            rta.data.forEach(opcion => {
                const option = document.createElement('option');
                option.value = opcion.idpet;
                option.textContent = opcion.namepet;
                select.appendChild(option);
                
                
            });
            
        },
        error: function(xhr, status, err){
            console.log("Error al procesar la solicitud ajax");
            console.log("Codigo de error: ", xhr.status);
            console.log("Estado: ", status)
            console.log("Error: ", err);
        }
    });
})
    
function initMap(ll, long) {
    const map = new google.maps.Map(document.querySelector("#map"), {
        zoom: 8,
        center: { lat: 4.610, lng: -74.083 }, // Coordenadas de Bogotá
        
    });
    const marker = new google.maps.Marker({
        position: { lat: ll, lng: long },
        map: map,
        draggable: false,

    });
}

function petFound(petid){
    $.ajax({
        url: '../controller/petfounf.php',
        method: 'POST',
        dataType: 'json',
        data: {
            idp: petid
        },
        success: function(res){
            ui.showmessage(res.mse);
        },
        error: function(errno){
            ui.showmessage(errno);
        }
    });
}

function petdel(petdi){
    $.ajax({
        url: '../controller/delpetfound.php',
        method: 'POST',
        dataType: 'json',
        data: {
            idPet: petdi
        },
        success: function(respues){
            ui.showmessage(respues.mnsje);
            document.getElementById('frm').remove();
        },
        error: function(err){
            ui.showmessage(err);
        }
    });
}

function aja(idpet){
    $.ajax({
        url: '../controller/busfoundpet.php',
        method: 'POST',
        dataType: 'json',
        data: {
            petid: idpet
        },
        success: function(rta){
            const vl = [
                rta.Nameusrfound,
                rta.Email,
                rta.Cel,
            ];
            const lb =[
                'Nombre de la persona que encontro la mascota',
                'Correo electronico del encontrador',
                'Celular del encontrador'
            ];
            for(let i = 0; vl.length > i; i++){
                const cmp = document.getElementById('cmp');
                const lbel = document.createElement('label');
                lbel.textContent = `${lb[i]}`;
                const br = document.createElement('br');
                const int = document.createElement('input');
                
                int.value = `${vl[i]}`;
                cmp.appendChild(lbel);
                cmp.appendChild(int);
                cmp.appendChild(br);
                
                
            }
            lltd = parseFloat(rta.lltd);
            lggtd = parseFloat(rta.lggtd);
            initMap(lltd, lggtd);
            const del = document.getElementById('cmp');
            const br = document.createElement('br');
            const butt = document.createElement('button');
            const buttOn = document.createElement('button');
            buttOn.id = `delrepot`;
            butt.id = `confirsi`;
            buttOn.innerHTML = `Eliminar reporte`;
            butt.innerHTML = `Confirmar mascota encontrada`;
            del.appendChild(butt);
            del.appendChild(br);
            del.appendChild(buttOn);
            butt.addEventListener("click", function(){
                petFound(idpet);
            });
            buttOn.addEventListener("click", function(){
                petdel(idpet);
            });
            
        },
        error: function(xhr, status, err){
            console.log("Error al procesar la solicitud ajax");
            console.log("Codigo de error: ", xhr.status);
            console.log("Estado del servidor: ", status);
            console.log("Error de servidor: ", err);
            console.log("Respuesta del servidor: ", err.textContent);
        }
        
    });
}
 

document.addEventListener("submit", function(e){
    const idpet = document.getElementById('select').value;
    if(idpet === '' || idpet === '-'){
        ui.showmessage("Seleccione una mascota");
        e.preventDefault();
        return;
    }else{
        aja(idpet);
        e.preventDefault();
    }
    
});