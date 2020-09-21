
document.querySelector('[data-validate]').addEventListener('submit', function () {
    let formData = new FormData(document.querySelector('[data-validate]'));
    let error = 0;
    let errorArray = 0;
    let errorArrayWarehouse = 0;

    if (formData.getAll('invoice')[0] === null || formData.getAll('invoice')[0] === "") {
        let validate = document.querySelector('#invoice');
        let info = document.querySelector('#invoice_valid');
        validate.classList.remove('outline');
        validate.classList.add('outline-validate');
        info.classList.remove('hide-block');
        info.classList.add('show-block');
        error = 1;
    }
    else {
        let validate = document.querySelector('#invoice');
        let info = document.querySelector('#invoice_valid');
        validate.classList.add('outline');
        validate.classList.remove('outline-validate');
        info.classList.add('hide-block');
        info.classList.remove('show-block');
    }

    if (formData.getAll('nip')[0] === null || formData.getAll('nip')[0] === "") {
        let validate = document.querySelector('#nip');
        let info = document.querySelector('#nip_valid');
        validate.classList.remove('outline');
        validate.classList.add('outline-validate');
        info.classList.remove('hide-block');
        info.classList.add('show-block');
        error = 1;
    }
    else {
        let validate = document.querySelector('#nip');
        let info = document.querySelector('#nip_valid');
        validate.classList.add('outline');
        validate.classList.remove('outline-validate');
        info.classList.add('hide-block');
        info.classList.remove('show-block');
    }

    if (formData.getAll('dealer_name')[0] === null || formData.getAll('dealer_name')[0] === "") {
        let validate = document.querySelector('#dealer_name');
        let info = document.querySelector('#dealer_name_valid');
        validate.classList.remove('outline');
        validate.classList.add('outline-validate');
        info.classList.remove('hide-block');
        info.classList.add('show-block');
        error = 1;
    }
    else {
        let validate = document.querySelector('#dealer_name');
        let info = document.querySelector('#dealer_name_valid');
        validate.classList.add('outline');
        validate.classList.remove('outline-validate');
        info.classList.add('hide-block');
        info.classList.remove('show-block');
    }

    if (formData.getAll('address')[0] === null || formData.getAll('address')[0] === "") {
        let validate = document.querySelector('#address');
        let info = document.querySelector('#address_valid');
        validate.classList.remove('outline');
        validate.classList.add('outline-validate');
        info.classList.remove('hide-block');
        info.classList.add('show-block');
        error = 1;
    }
    else {
        let validate = document.querySelector('#address');
        let info = document.querySelector('#address_valid');
        validate.classList.add('outline');
        validate.classList.remove('outline-validate');
        info.classList.add('hide-block');
        info.classList.remove('show-block');
    }

    formData.getAll('code[]').forEach(validArray);
    formData.getAll('name[]').forEach(validArray);
    formData.getAll('supplier[]').forEach(validArray);
    formData.getAll('quantity[]').forEach(validArray);
    formData.getAll('price[]').forEach(validArray);

    function validArray(val) {
        let info = document.querySelector('#array_valid');
        if (val === "" || val === null) {
            info.classList.remove('hide-block');
            info.classList.add('show-block');
            errorArray = 1;
        }

        if (errorArray === 0) {
            info.classList.add('hide-block');
            info.classList.remove('show-block');
        }
    }

    formData.getAll('quantity[]').forEach(validArrayQuantity);

    function validArrayQuantity(val, index) {
        let info = document.querySelector('#array_valid_warehouse');

        let x = parseInt(formData.getAll('warehouse[1][]')[index]);
        let y = parseInt(formData.getAll('warehouse[2][]')[index]);

        if (isNaN(x)) {
            x = 0;
        }
        else if(isNaN(y)) {
            y = 0;
        }

        let sum = x + y;

        if (parseInt(val) !== sum) {
            info.classList.remove('hide-block');
            info.classList.add('show-block');
            errorArrayWarehouse = 1;
        }

        if (parseInt(val) <= 0) {
            info.classList.remove('hide-block');
            info.classList.add('show-block');
            errorArrayWarehouse = 1;
        }

        if (errorArrayWarehouse === 0) {
            info.classList.add('hide-block');
            info.classList.remove('show-block');
        }
    }

    if (error === 1 || errorArray === 1 || errorArrayWarehouse === 1) {
        event.preventDefault();
        return false;
    }
});
