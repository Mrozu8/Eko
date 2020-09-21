class Elements {
    constructor(element) {
        this.addItem = $(element).find('#add-order-item');
        this.lists = $(element).find('[data-order-list]');

        this.bindEvents();
    }

    bindEvents() {
        this.addItem.on('click.add_new_item', event => {
            let id = parseInt(this.lists[0].lastElementChild.getAttribute('data-id')) + 1;
            event.preventDefault();
            this.cloneRow(id);
        });

        this.lists.on('click', '[data-order-delete]', event => {
            this.removeRow(event);
        });

    }

    cloneRow(id) {
        this.lists.append('<div class="form-row space-top--p-mid" data-id="'+id+'">\n' +
            '                            <div class="form-group col-xl-1">\n' +
            '                                <label for="inputEmail4">Kod:</label>\n' +
            '                                <input id="Kod" name="code[]" type="text" placeholder="xx-xx-xx" class="outline form-control">\n' +
            '                            </div>\n' +
            '                            <div class="form-group col-xl-3">\n' +
            '                                <label for="inputEmail4">Nazwa Produktu:</label>\n' +
            '                                <input id="inputEmail4" name="name[]" type="text" placeholder="xxx xxx" class="outline form-control">\n' +
            '                            </div>\n' +
            '                            <div class="form-group col-xl-2">\n' +
            '                                <label for="supplier">Producent:</label>\n' +
            '                                <select id="supplier" name="supplier[]" class="outline form-control">\n' +
            '                                    <option value="Bosh">Bosh</option>\n' +
            '                                    <option value="Amica">Amica</option>\n' +
            '                                    <option value="ITD">ITD</option>\n' +
            '                                </select>\n' +
            '                            </div>\n' +
            '                            <div class="form-group col-xl-1" data-quantity>\n' +
            '                                <label for="inputEmail4">Ilość:</label>\n' +
            '                                <input id="inputEmail4" name="quantity[]" type="text" placeholder="xx"  class="outline form-control qt" >\n' +
            '                            </div>\n' +
            '                            <div class="form-group col-xl-2" data-price>\n' +
            '                                <label for="inputEmail4">Numer zlecenia:</label>\n' +
            '                                <input id="inputEmail4" name="order_item_number[]" type="text" placeholder="xxx-xxx" class="outline form-control" >\n' +
            '                            </div>\n' +
            '                            <div class="form-group col-xl-2">\n' +
            '                                <label for="inputEmail4">Notatka:</label>\n' +
            '                                <input id="inputEmail4" name="item_note[]" type="text" placeholder="Za sztukę" class="outline form-control">\n' +
            '                            </div>\n' +
            '                                   <div class="form-group col-xl-1 vertical-mid">\n' +
            '                                       <button type="button" class="btn btn-danger icon-btn" data-order-delete>\n' +
            '                                        <i class="fas fa-minus"></i>\n' +
            '                                        </button>' +
            '                                    </div>' +
            '\n' +
            '                        </div>');
    }

    removeRow(event) {
        $(event.currentTarget).closest('.form-row').fadeOut().remove();
        this.calculateTotalPrice();
    }
}

export default {
    init() {
        $("[data-order-form]").each((index, element) => {
            new Elements(element);
        });
    }
}
