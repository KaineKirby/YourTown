//Your Town- js file.
"use strict";

//GLOBAL VARIABLES TO SUPPORT ================================

var i; //for for loops

function executeLater() {
   //check which page browser is on 
   var pathname = window.location.pathname;
   
   switch(pathname){
         case: "/index.html";
               //do functions of stuff thats on the index page
               break;
         case: "/living.html";
               //do functions of stuff thats on the living page
               break;
         case: "/visit.html";
               //do functions of stuff thats on visit page
               break;
         case: "/eat.html";
         
               //you get the point 
               break;
   }
   
    
}

//some other functions go here 



window.onload  = executeLater;
