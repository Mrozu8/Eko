// /*
// // ============ sale page ============
//
// let id = 1;
//
// let input_group = document.querySelector('.list-item');
//
// document.querySelector('#add-item').addEventListener('click', function () {
//     let id = input_group.lastElementChild.getAttribute('id');
//     id++;
//
//     let group = '<div class="form-row" id="'+id+'">\n' +
//         '                        <div class="form-group col-md-1">\n' +
//         '                            <label for="inputEmail4">Kod</label>\n' +
//         '                            <input id="Kod" name="code[]" type="text" placeholder="xx-xx-xx" class="outline form-control input-md">\n' +
//         '                        </div>\n' +
//         '                        <div class="form-group col-md-3">\n' +
//         '                            <label for="inputEmail4">Nazwa Produktu</label>\n' +
//         '                            <input id="inputEmail4" name="name[]" type="text" placeholder="xxx xxx" class="outline form-control">\n' +
//         '                        </div>\n' +
//         '                        <div class="form-group col-md-1" data-quantity>\n' +
//         '                            <label for="inputEmail4">Ilość</label>\n' +
//         '                            <input id="inputEmail4" name="quantity[]" type="text" placeholder="xx"  class="outline form-control qt" >\n' +
//         '                        </div>\n' +
//         '                        <div class="form-group col-md-2" data-price>\n' +
//         '                            <label for="inputEmail4">Cena</label>\n' +
//         '                            <input id="inputEmail4" name="unit_price[]" type="text" placeholder="Za sztukę" class="outline form-control unit-price" >\n' +
//         '                        </div>\n' +
//         '                        <div class="form-group col-md-2">\n' +
//         '                            <label for="inputEmail4">Brutto</label>\n' +
//         '                            <input id="brutto" name="price_net" type="text" placeholder="Za sztukę" class="outline form-control input-md tax" readonly>\n' +
//         '                        </div>\n' +
//         '                        <div class="form-group col-md-2">\n' +
//         '                            <label for="inputEmail4">Razem</label>\n' +
//         '                            <input id="all" name="" type="text" placeholder="Łącznie brutto" class="outline form-control input-md tax-all" readonly>\n' +
//         '                        </div>\n' +
//         '                        <div class="col-md-1 delete-item vertical-mid" data-delete-button>\n' +
//         '                            <button type="button" class="btn btn-danger" data-id="'+id+'" onclick="remove('+id+');"><i class="fas fa-minus"></i></button>\n' +
//         '                        </div>\n' +
//         '                    </div>';
//
//
//
//     input_group.innerHTML += group;
// });
//
//
// function remove(id) {
//     let element = document.getElementById(id);
//     element.parentNode.removeChild(element);
// }
// // $('[data-delete-button]').find('[data-id]').on('click', function (e) {
// //     console.log(this);
// // });

// */


/*document.querySelector('.qt').addEventListener('keyup', function (e) {
    let price = document.querySelector('.unit-price');
    console.log(price.value);
    let brutto = price.value * 1.23;
    let all = this.value * brutto;
    document.querySelector('.tax').setAttribute('value', brutto);
    document.querySelector('.tax-all').setAttribute('value', all);
});


document.querySelector('.unit-price').addEventListener('keyup', function (e) {
    let quantity = document.querySelector('.qt');
    let brutto = this.value * 1.23;
    let all = brutto * quantity.value;
    document.querySelector('.tax').setAttribute('value', brutto);
    document.querySelector('.tax-all').setAttribute('value', all);
});*/
