
var TabEntrada = document.getElementById("tabE"); 
var TabSalida = document.getElementById("tabS"); 
var TabVisitantes = document.getElementById("tabV"); 
var TabBitacora = document.getElementById("tabB");
 
var RegistroEntrada = document.getElementById("EntradaMenu");
var RegistroSalida = document.getElementById("SalidaMenu");
var Visitantes = document.getElementById("VisitantesMenu");
var Bitacora = document.getElementById("BitacoraMenu");

var busqueda ="";
var numero=0;


 
function VistaEntrada(){ 

    var tituloE = TabEntrada.textContent;
    busqueda =tituloE.indexOf("Registro de Entrada");
     if(busqueda==0){
      RegistroEntrada.style.backgroundColor = "blue";
     }else{
    RegistroEntrada.style.backgroundColor = "transparent";
     }
     }

     
function VistaSalida(){ 
   var tituloS = TabSalida.textContent;
    busqueda =tituloS.indexOf("Registro de Salida");
      if(busqueda==0){
       RegistroSalida.style.backgroundColor = "blue";
     }else{
    RegistroSalida.style.backgroundColor = "transparent";
     }
     }

     function VistaVisitantes(){ 
        var tituloV = TabVisitantes.textContent;
        var busqueda =tituloV.indexOf("Visitas dentro del fraccionamiento");
          if(busqueda==0){
           Visitantes.style.backgroundColor = "blue";
          }else{
         Visitantes.style.backgroundColor = "transparent";
          }
          }

          function VistaBitacora(){ 
            var tituloB = TabBitacora.textContent;
             busqueda =tituloB.indexOf("Historial de visitas");
                if(busqueda==0){
                Bitacora.style.backgroundColor = "blue";
              }else{
             Bitacora.style.backgroundColor = "transparent";
              }
              }