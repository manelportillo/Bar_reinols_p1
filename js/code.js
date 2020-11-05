window.location.reload= function(){
    alteracionColor();
}

function alteracionColor() {
    
    var Mesa=document.getElementsByClassName('item');
    var Disponibilidad=document.getElementsByClassName('Disponibilidad');

    for (let i = 0; i < Mesa.length; i++) {
        //alert(Mesa[i]);
        //alert(Disponibilidad[i].innerHTML);
        
        if(Disponibilidad[i].innerHTML == 'Disponible'){
            Mesa[i].style.backgroundColor = "green";
        }else if(Disponibilidad[i].innerHTML == 'Reservada'){
            Mesa[i].style.backgroundColor = "red";
        }else{
            Mesa[i].style.backgroundColor = "grey";
        }
    }

    
}
