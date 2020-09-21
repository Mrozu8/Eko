class Elements {
    constructor(element) {
        this.addItem = $(element).find('#add-buy-item');
        this.lists = $(element).find('[data-buy-list]');
        this.qty = this.lists.find('[data-buy-quantity] input');
        this.price = this.lists.find('[data-buy-price] input');
        this.pricing = {
            qty:1,
            price:0,
            sum: 0
        };

        this.totalPrice = {
            total: 0
        };

        this.lastElement = 1;

        this.bindEvents();
    }

    bindEvents() {

        this.addItem.on('click.add_new_item', event => {
            let id = parseInt(this.lists[0].lastElementChild.getAttribute('data-id')) + 1;
            event.preventDefault();
            this.cloneRow(id);
        });

        this.lists.on('click', '[data-buy-delete]', event => {
            this.removeRow(event);
        });


        this.lists.on('keyup.qty', '[data-buy-quantity] input', event => {
            this.calculatePrice('qty' ,parseInt(event.currentTarget.value) , event);
        });

        this.lists.on('keyup.price', '[data-buy-price] input', event => {
            this.calculatePrice('price' ,parseFloat(event.currentTarget.value) , event);
        });
    }

    cloneRow(id) {
        this.lists.append('<div class="row-group" data-id="' + id + '">\n' +
            '                                <div class="form-row space-top--p-big" >\n' +
            '                                    <div class="form-group col-xl-1">\n' +
            '                                        <label for="inputEmail4">Kod</label>\n' +
            '                                        <input id="Kod" name="code[]" type="text" placeholder="xx-xx-xx" class="outline form-control" required>\n' +
            '                                    </div>\n' +
            '                                    <div class="form-group col-xl-3">\n' +
            '                                        <label for="inputEmail4">Nazwa Produktu</label>\n' +
            '                                        <input id="inputEmail4" name="name[]" type="text" placeholder="xxx xxx" class="outline form-control" required>\n' +
            '                                    </div>\n' +
            '                                    <div class="form-group col-xl-2">\n' +
            '                                        <label for="inputEmail4">Producent</label>\n' +
            '                                        <select id="inputEmail4" name="supplier[]" class="outline form-control" required>\n' +
            '                                            <option value="Bosh">Bosh</option>\n' +
            '                                            <option value="Amica">Amica</option>\n' +
            '                                            <option value="ITD">ITD</option>\n' +
            '                                        </select>\n' +
            '                                    </div>\n' +
            '\n' +
            '                                    <div class="form-group col-xl-1" data-buy-quantity>\n' +
            '                                        <label for="inputEmail4">Łączna ilość</label>\n' +
            '                                        <input id="inputEmail4" name="quantity[]" type="text" placeholder="xx" class="outline form-control quantity"  required>\n' +
            '                                    </div>\n' +
            '                                    <div class="form-group col-xl-2">\n' +
            '                                        <label for="inputEmail4">Przemyśl</label>\n' +
            '                                        <input id="inputEmail4" name="warehouse[1][]" type="text" placeholder="Magazyn" class="outline form-control" >\n' +
            '                                    </div>\n' +
            '                                    <div class="form-group col-xl-2">\n' +
            '                                        <label for="inputEmail4">Jarosław</label>\n' +
            '                                        <input id="inputEmail4" name="warehouse[2][]" type="text" placeholder="Magazyn" class="outline form-control" >\n' +
            '                                    </div>\n' +
            '\n' +
            '                                </div>\n' +
            '                                <div class="form-row">\n' +
            '                                    <div class="form-group col-xl-2" data-buy-price>\n' +
            '                                        <label for="inputEmail4"></label>\n' +
            '                                        <input id="inputEmail4" name="unit_price[]" type="text" placeholder="Cena za sztukę" class="outline form-control unit-price"  required>\n' +
            '                                    </div>\n' +
            '                                    <div class="form-group col-xl-2 offset-5" data-brutto>\n' +
            '                                        <label for="inputEmail4"></label>\n' +
            '                                        <input id="brutto" name="price_net" type="text" placeholder="Brutto" class="outline form-control input-md tax" readonly>\n' +
            '                                    </div>\n' +
            '                                    <div class="form-group col-xl-2" data-sum-item>\n' +
            '                                        <label for="inputEmail4"></label>\n' +
            '                                        <input id="all" name="" type="text" placeholder="Razem" class="outline form-control input-md tax-all" readonly>\n' +
            '                                    </div>\n' +
            '                                   <div class="form-group col-xl-1 vertical-mid">\n' +
            '                                       <button type="button" class="btn btn-danger icon-btn" data-buy-delete>\n' +
            '                                        <i class="fas fa-minus"></i>\n' +
            '                                        </button>' +
            '                                    </div>' +
            '                                </div>\n' +
            '                                <hr>\n' +
            '                            </div>');
    }

    removeRow(event) {
        $(event.currentTarget).closest('.row-group').fadeOut().remove();
        this.calculateTotalPrice();
    }

    calculatePrice(key, value , event){

        let row = $(event.currentTarget).closest('[data-id]');

        if (this.lastElement !== row.find('.form-row').prevObject[0].dataset['id']) {
            this.pricing.price = 0;
            this.pricing.qty = 1;
        }

        if(key === 'qty' && value !== 0){
            this.pricing['price'] = row.find('[data-buy-price] input').val();
        }

        this.pricing[key] = value;
        this.pricing['sum'] = this.pricing['qty'] * this.pricing['price']  * 1.23;

        let brutto = this.pricing['price'] * 1.23;


        if (isNaN(this.pricing.sum)) {
            this.pricing.sum = 0;
        }
        row.find('[data-sum-item] input').val(this.pricing.sum.toFixed(2));
        // console.log(this.pricing);
        row.find('[data-brutto] input').val(brutto.toFixed(2));

        this.lastElement = row.find('.form-row').prevObject[0].dataset['id'];

        this.calculateTotalPrice();

    }

    calculateTotalPrice(){
        let inputPrice = this.lists.find('[data-sum-item] input');
        // console.log(inputPrice.length);
        let tmpPrice = 0;
        inputPrice.each(( index , item )=> {
            if(item.value){
                tmpPrice = tmpPrice + parseFloat($(item).val());
            }
        });

        $('[data-total-price]').val(tmpPrice.toFixed(2));

        this.totalPrice = tmpPrice;
    }
}

export default {
    init() {
        $("[data-buy-form]").each((index, element) => {
            new Elements(element);
        });
    }
}
