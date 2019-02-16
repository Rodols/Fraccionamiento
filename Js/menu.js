
var TabEntrada = document.getElementById("tabE");
var TabSalida = document.getElementById("tabS");
var RegistroEntrada = document.getElementById("EntradaMenu");
var RegistroSalida = document.getElementById("SalidaMenu");

window.onload= VistaTabs;

function VistaTabs(){
    VistaEntrada();
    VistaSalida();
}

function VistaEntrada(){ 
    var tituloE = TabEntrada.textContent; 
    var busqueda ="";
    busqueda =tituloE.indexOf("Entrada")
   if(busqueda>=1){
      RegistroEntrada.style.backgroundColor = "red";
     }else{
    RegistroEntrada.style.backgroundColor = "transparent";
     }

     }

     
function VistaSalida(){ 
    var tituloS = TabSalida.textContent; 
    var busqueda ="";
    busqueda =tituloS.indexOf("Salida")
   if(busqueda>=1){
       RegistroSalida.style.backgroundColor = "red";
     }else{
    RegistroSalida.style.backgroundColor = "transparent";
     }

     }