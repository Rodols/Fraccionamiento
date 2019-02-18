
var TabEntrada = document.getElementById("tabE"); 
var TabSalida = document.getElementById("tabS"); 
var TabVisitantes = document.getElementById("tabV"); 
var TabBitacora = document.getElementById("tabB");
 
var RegistroEntrada = document.getElementById("EntradaMenu");
var RegistroSalida = document.getElementById("SalidaMenu");
var Visitantes = document.getElementById("VisitantesMenu");
var Bitacora = document.getElementById("BitacoraMenu");

var busqueda ="";
var tituloE ="";
var tituloS="";
var tituloV ="";
var tituloB ="";
 
function VistaEntrada(){ 
     tituloE = TabEntrada.textContent;
    busqueda =tituloE.indexOf("Registro de entrada");
        if(busqueda==0){
            RegistroEntrada.style.backgroundColor = "#5C821A";    
                            
        }   else{
                RegistroEntrada.style.backgroundColor = "transparent";
             }
}

     
function VistaSalida(){ 
   tituloS = TabSalida.textContent;
    busqueda =tituloS.indexOf("Registro de salida");
      if(busqueda==0){
         RegistroSalida.style.backgroundColor = "#5C821A";
         }else{
             RegistroSalida.style.backgroundColor = "transparent";
        }
 }

     function VistaVisitantes(){ 
         tituloV = TabVisitantes.textContent;
        busqueda =tituloV.indexOf("Visitas dentro del fraccionamiento");
            if(busqueda==0){
                 Visitantes.style.backgroundColor = "#5C821A";
                 }else{
                    Visitantes.style.backgroundColor = "transparent";
             }
     }

          function VistaBitacora(){ 
            tituloB = TabBitacora.textContent;
             busqueda =tituloB.indexOf("Historial de visitas");
                if(busqueda==0){
                    Bitacora.style.backgroundColor = "#5C821A";
                }else{
                 Bitacora.style.backgroundColor = "transparent";
                }
         }