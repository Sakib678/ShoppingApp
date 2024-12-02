window.onload = function() {  
    document.addEventListener('click', e => {
        if (e.target.matches('button.select-product')) {
            getProductByID(e.target.value);
        }     
    else if(e.target.matches('button.edit-product')){
        editProductByID(e.target.value)
    }
    });
}

function  getProductByID(id) {
    window.location= "/product/"+id;
}

function editProductByID(id){
    window.location="/product/"+id+"/edit";
}