"use strict";

function setupDeliteForms() {
    let deliteForms = document.querySelectorAll('form.delition-form');

    for (let form of deliteForms) {
        form.addEventListener('submit', function (event){
            event.preventDefault(); 

            if (window.confirm('Are you sure you want to delite this object?')){
                form.submit();
            }else{
                return false;
            }
        });
    }
}

document.addEventListener("DOMContentLoaded", function (){
    setupDeliteForms();
})