var plusButtonModal = document.getElementsByClassName('btn-num-product-up color1 flex-c-m size7 bg8 eff2 modal-bt');
var qtyModal =  document.getElementsByClassName('size8 m-text18 t-center num-product qty-modal');
var stockModal = document.getElementsByClassName('size8 m-text18 t-center num-product qty-dua');

function tambahModal(p){
    for(var i =0; i<plusButtonModal.length; i++){
        if(plusButtonModal[i]==p){
            qtyModal[i].value = parseInt(qtyModal[i].value++);
            var stok = parseInt(stockModal[i].value);
            if(qtyModal[i].value>=stok){
                qtyModal[i].value = parseInt(qtyModal[i].value)-1;
            }
        }
    }
}