window.location.reload= function(){
    alteracionColor();
}

function alteracionColor() {
    
    var Mesa=document.getElementsByClassName('item');

    for (let i = 0; i < Mesa.length; i++) {
        //alert(Mesa[i]);
        //alert(Disponibilidad[i].innerHTML);
        var Disponibilidad=document.getElementById('item{$i}');

        if(Disponibilidad[i].innerHTML == 'Disponible'){
            Mesa[i].style.backgroundColor = "green";
        }else if(Disponibilidad[i].innerHTML == 'Reservada'){
            Mesa[i].style.backgroundColor = "red";
        }else{
            Mesa[i].style.backgroundColor = "grey";
        }
    }

    
}
