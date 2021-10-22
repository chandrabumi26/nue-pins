var minButton = document.getElementsByClassName('btn-num-product-down color1 flex-c-m size7 bg8 eff2');
var plusButton = document.getElementsByClassName('btn-num-product-up color1 flex-c-m size7 bg8 eff2');
var qty =  document.getElementsByClassName('size8 m-text18 t-center num-product');
var hargaCart = document.querySelectorAll('.column-3.cart');
var jumlah = document.querySelectorAll('.column-5.jumlah');
var stock = document.querySelectorAll('.stock-produk');
var id = document.querySelectorAll('.id-keranjang');
var subtotal = document.getElementById('totalbayar');

for(var a=0; a<hargaCart.length; a++){
    // set to rupiah
    var zz = parseInt(hargaCart[a].innerText);
    hargaCart[a].innerText = rupiah(zz);

    // unset rupiah
    // var ss = jumlah[a].innerText;
    // var dd = ss.replace('Rp.','');
    // var oo = dd.replace(/\./g,'');
    // jumlah[a].innerText = oo;
}
var arr = [];
for(var b=0; b<jumlah.length; b++){
    var ss = jumlah[b].innerText;
    var dd = ss.replace('Rp.','');
    var oo = dd.replace(/\./g,'');
    var blu = parseInt(oo);
    arr.push(blu);
    subtotal.innerText =  rupiah(arr.reduce((a, b) => a + b, 0));
}

function kurang(p){
    for(var i =0; i<minButton.length; i++){
        if(minButton[i]==p){
            var bla = parseInt(qty[i].value);
            var ss = hargaCart[i].innerText;
            var dd = ss.replace('Rp.','');
            var oo = dd.replace(/\./g,'');
            var blu = parseInt(oo);
            var total = blu * parseInt(bla-1);
            if(total<=0){
                // Delete Keranjang
                qty[i].value = 1;
                var totalZero = blu * parseInt(bla);
                jumlah[i].innerText = rupiah(totalZero);
                var buatId = parseInt(id[i].innerText);
                window.location = "deleteDataKeranjang/" + buatId;
            }else{
                jumlah[i].innerText = rupiah(total);
                var buatId = parseInt(id[i].innerText);
                var buatJumlah = parseInt(bla-1);
                var buatTotal = total;
                window.location = "updateDataKeranjang/" +buatId+"/"+buatJumlah+"/"+buatTotal;
            }
        }
    }
}

function tambah(p){
    for(var i =0; i<plusButton.length; i++){
        if(plusButton[i]==p){
            qty[i].value = parseInt(qty[i].value++);
            var bla = parseInt(qty[i].value);
            var ss = hargaCart[i].innerText;
            var dd = ss.replace('Rp.','');
            var oo = dd.replace(/\./g,'');
            var blu = parseInt(oo);
            var total = blu * parseInt(bla+1);
            var stok = parseInt(stock[i].innerText);
            if(qty[i].value>=stok){
                qty[i].value = parseInt(qty[i].value)-1;
                bla = parseInt(qty[i].value);
            }
            jumlah[i].innerText = rupiah(blu * parseInt(bla+1));
            var buatId = parseInt(id[i].innerText);
            var buatJumlah = parseInt(bla+1);
            var buatTotal = blu*parseInt(bla+1);
            window.location = "updateDataKeranjang/" +buatId+"/"+buatJumlah+"/"+buatTotal;
        }
    }
}



function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function rupiah(number){
	var hasil_rupiah = "Rp." + number_format(number,0,',','.'); 
	return hasil_rupiah;
}