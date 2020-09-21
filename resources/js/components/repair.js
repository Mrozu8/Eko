class Elements {
    constructor(element) {
        this.addItem = $(element).find('#add-item');
        this.lists = $(element).find('[data-list]');
        this.qty = this.lists.find('[data-quantity] input');
        this.price = this.lists.find('[data-price] input');
        this.cost_worker = this.lists.find('[data-cost] input');
        this.delivery = this.lists.find('[data-delivery-cost] input');
        this.pricing = {
            qty:1,
            price:0,
            sum: 0,
            delivery: 0,
            cost_worker: 0,
        };

        this.lastElement = 1;

        this.totalPrice = {
            total: 0
        };
        this.bindEvents();
    }

    bindEvents() {
        this.addItem.on('click.add_new_item', event => {
            // let id = this.lists.find('.form-row').length + 1;
            let id = parseInt(this.lists[0].lastElementChild.getAttribute('data-id')) + 1;
            event.preventDefault();
            this.cloneRow(id);
        });

        this.lists.on('click', '[data-delete]', event => {
            this.removeRow(event);
        });


        this.lists.on('keyup.qty', '[data-quantity] input', event => {
            console.log('1');
            this.calculatePrice('qty' ,parseInt(event.currentTarget.value) , event);
        });

        this.lists.on('keyup.price', '[data-price] input', event => {
            this.calculatePrice('price' ,parseFloat(event.currentTarget.value) , event);
        });


        $('[data-cost]').on('keyup', event => {
            this.pricing.cost_worker = parseFloat(event.currentTarget.value);
            this.calculateTotalPrice();
        });

        $('[data-delivery-cost]').on('keyup', event => {
            this.pricing.delivery = parseFloat(event.currentTarget.value);
            this.calculateTotalPrice();
        });
    }

    cloneRow(id) {
        this.lists.append('<div class="form-row" data-id="' + id + '">\n' +
            '                            <div class="form-group col-xl-1">\n' +
            '                                <label for="inputEmail4">Kod</label>\n' +
            '                                <input id="code" name="code[]" type="text" placeholder="xx-xx-xx" class="outline form-control" data-code required>\n' +
            '                            </div>\n' +
            '                            <div class="form-group col-xl-3">\n' +
            '                                <label for="inputEmail4">Nazwa Produktu</label>\n' +
            '                                <input id="inputEmail4" name="name[]" type="text" placeholder="xxx xxx" class="outline form-control" required>\n' +
            '                            </div>\n' +
            '                            <div class="form-group col-xl-1" data-quantity>\n' +
            '                                <label for="inputEmail4">Ilość</label>\n' +
            '                                <input id="inputEmail4" name="quantity[]" type="number" min="0" placeholder="xx"  class="outline form-control qt" data-qty required >\n' +
            '                            </div>\n' +
            '                            <div class="form-group col-xl-2" data-price>\n' +
            '                                <label for="inputEmail4">Cena</label>\n' +
            '                                <input id="inputEmail4" name="unit_price[]" type="number" min="0" placeholder="Za sztukę" class="outline form-control unit-price" required >\n' +
            '                            </div>\n' +
            '                            <div class="form-group col-xl-2" data-brutto>\n' +
            '                                <label for="inputEmail4">Brutto</label>\n' +
            '                                <input id="brutto" name="price_net" type="text" placeholder="Za sztukę" class="outline form-control input-md tax" readonly>\n' +
            '                            </div>\n' +
            '                            <div class="form-group col-xl-2" data-sum-item>\n' +
            '                                <label for="inputEmail4">Razem</label>\n' +
            '                                <input id="all" name="" type="text" placeholder="Łącznie brutto" class="outline form-control input-md tax-all" readonly>\n' +
            '                            </div>\n' + '' +
            '                            <div class="form-group col-xl-1 vertical-mid">\n' +
            '                            <button type="button" class="btn btn-danger icon-btn" data-delete>\n' +
            '                               <i class="fas fa-minus"></i>\n' +
            '                            </button>' +
            '                            </div>' +
            '\n' +
            '                        </div>');
    }

    removeRow(event) {
        $(event.currentTarget).closest('.form-row').fadeOut().remove();
        this.calculateTotalPrice();
    }

    calculatePrice(key, value , event){

        let row = $(event.currentTarget).closest('[data-id]');

        // console.log(this.lastElement);

        if (this.lastElement !== row.find('.form-row').prevObject[0].dataset['id']) {
            this.pricing.price = 0;
            this.pricing.qty = 1;
        }

        if(key === 'qty' && value !== 0){
            this.pricing['price'] = row.find('[data-price] input').val();
        }

        this.pricing[key] = value;
        this.pricing['sum'] = this.pricing['qty'] * this.pricing['price']  * 1.23;

        let brutto = this.pricing['price'] * 1.23;

        if (isNaN(this.pricing.sum)) {
            this.pricing.sum = 0;
        }
        // console.log(this.pricing);


        row.find('[data-sum-item] input').val(this.pricing.sum.toFixed(2));
        row.find('[data-brutto] input').val(brutto.toFixed(2));

        this.lastElement = row.find('.form-row').prevObject[0].dataset['id'];


        this.calculateTotalPrice();

    }

    calculateTotalPrice(){
        let inputPrice = this.lists.find('[data-sum-item] input');
        let tmpPrice = 0;
        inputPrice.each(( index , item )=> {
            if(item.value){
                tmpPrice = tmpPrice + parseFloat($(item).val());
            }
        });

        let total = tmpPrice + parseFloat(this.pricing.cost_worker) + parseFloat(this.pricing.delivery);
        console.log(total);
        $('[data-total-price]').val(total.toFixed(2));

        this.totalPrice = tmpPrice;


    }
}

export default {
    init() {
        $("[data-repair-form]").each((index, element) => {
            new Elements(element);
        });
    }
}
