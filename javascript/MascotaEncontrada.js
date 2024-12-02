class UI{
    showMessage(mje){
        const div = document.createElement('div');
        div.className = 'mmsje';
        div.appendChild(document.createTextNode(mje));
        const tainer = document.querySelector('.tainer');
        const cont = document.querySelector('#cont');
        tainer.insertBefore(div, cont);
        div.scrollIntoView({ behavior: 'smooth', block: 'center' });
        setTimeout(()=>{
            document.querySelector('.mmsje').remove();
        }, 5000);
    }
}

let map;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 4.7110, lng: -74.0721 }, // Centro en Bogotá, Colombia
        zoom: 8
    });
    marker = new google.maps.Marker({
        position: { lat: 4.610, lng: -74.083 },
        map: map,
        draggable: true,
    });

    document.getElementById('reporteEncontradaForm').addEventListener("submit", function(e){
        const ui = new UI();
        var position = marker.getPosition();
        const lt = document.getElementById('latitud').value = position.lat();
        const lg = document.getElementById('longitud').value = position.lng();
        const idmsc = document.getElementById('id_mascota').value;
        const dcrip = document.getElementById('descripcion').value;
        const cntname = document.getElementById('contact_name').value;
        const ctncemail = document.getElementById('contact_email').value;
        const cntphne = document.getElementById('contact_phone').value;
        $.ajax({
            url: '../controller/macfound.php',
            method: 'POST',
            data: {
                idmacot: idmsc,
                dcrpet: dcrip,
                ctname: cntname,
                ctemail: ctncemail,
                ctphone: cntphne, 
                ltt: lt,
                lngtd: lg
            },
            success: function(rpt){
                ui.showMessage(rpt);
            },
            error: function(err){
                console.log("Error AL procesar ajax ", err);
            }
        })
        e.preventDefault();
    })
}


