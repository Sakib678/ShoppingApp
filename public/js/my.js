window.onload = function() {  
    document.addEventListener('click', e => {
        if (e.target.matches('button.select-product')) {
            getProductByID(e.target.value);
        }     
    });
}

function  getProductByID(id) {
    window.location= "/product/"+id;
}