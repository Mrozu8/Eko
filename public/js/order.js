
document.querySelector('#switch-order').addEventListener('change', function () {
    if (this.checked === false) {
        document.querySelector('#order-show').classList.remove('show-block-flex');
        document.querySelector('#order-show').classList.add('hide-block');
    }
    else {
        document.querySelector('#order-show').classList.remove('hide-block');
        document.querySelector('#order-show').classList.add('show-block-flex');
    }
});



document.querySelector('[data-validate]').addEventListener('submit', function () {
    let formData = new FormData(document.querySelector('[data-validate]'));
    let error = 0;
    let errorArray = 0;
    let data = document.querySelector('#switch-order');


    if (formData.getAll('order_number')[0] === null || formData.getAll('order_number')[0] === "") {
        let validate = document.querySelector('#order_number');
        let info = document.querySelector('#order_number_valid');
        validate.classList.remove('outline');
        validate.classList.add('outline-validate');
        info.classList.remove('hide-block');
        info.classList.add('show-block');
        error = 1;
    }
    else {
        let validate = document.querySelector('#order_number');
        let info = document.querySelector('#order_number_valid');
        validate.classList.add('outline');
        validate.classList.remove('outline-validate');
        info.classList.add('hide-block');
        info.classList.remove('show-block');
    }

    if (formData.getAll('order_type')[0] !== "Magazyn") {

        if (data.checked === false) {
            document.querySelector('#order-show').classList.remove('hide-block');
            document.querySelector('#order-show').classList.add('show-block-flex');
            data.checked = true;
        }


        if (formData.getAll('customer_name')[0] === null || formData.getAll('customer_name')[0] === "") {
            let validate = document.querySelector('#customer_name');
            let info = document.querySelector('#customer_name_valid');
            validate.classList.remove('outline');
            validate.classList.add('outline-validate');
            info.classList.remove('hide-block');
            info.classList.add('show-block');
            error = 1;
        }
        else {
            let validate = document.querySelector('#customer_name');
            let info = document.querySelector('#customer_name_valid');
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

        if (formData.getAll('phone')[0] === null || formData.getAll('phone')[0] === "") {
            let validate = document.querySelector('#phone');
            let info = document.querySelector('#phone_valid');
            validate.classList.remove('outline');
            validate.classList.add('outline-validate');
            info.classList.remove('hide-block');
            info.classList.add('show-block');
            error = 1;
        }
        else {
            let validate = document.querySelector('#phone');
            let info = document.querySelector('#phone_valid');
            validate.classList.add('outline');
            validate.classList.remove('outline-validate');
            info.classList.add('hide-block');
            info.classList.remove('show-block');
        }

        if (formData.getAll('price')[0] === null || formData.getAll('price')[0] === "") {
            let validate = document.querySelector('#price');
            let info = document.querySelector('#price_valid');
            validate.classList.remove('outline');
            validate.classList.add('outline-validate');
            info.classList.remove('hide-block');
            info.classList.add('show-block');
            error = 1;
        }
        else {
            let validate = document.querySelector('#price');
            let info = document.querySelector('#price_valid');
            validate.classList.add('outline');
            validate.classList.remove('outline-validate');
            info.classList.add('hide-block');
            info.classList.remove('show-block');
        }

        if (formData.getAll('advance')[0] === null || formData.getAll('advance')[0] === "") {
            let validate = document.querySelector('#advance');
            let info = document.querySelector('#advance_valid');
            validate.classList.remove('outline');
            validate.classList.add('outline-validate');
            info.classList.remove('hide-block');
            info.classList.add('show-block');
            error = 1;
        }
        else {
            let validate = document.querySelector('#advance');
            let info = document.querySelector('#advance_valid');
            validate.classList.add('outline');
            validate.classList.remove('outline-validate');
            info.classList.add('hide-block');
            info.classList.remove('show-block');
        }
    }
    else {
        document.querySelector('#order-show').classList.remove('show-block-flex');
        document.querySelector('#order-show').classList.add('hide-block');
        data.checked = false;
    }

    formData.getAll('code[]').forEach(validArray);
    formData.getAll('name[]').forEach(validArray);
    formData.getAll('supplier[]').forEach(validArray);
    formData.getAll('quantity[]').forEach(validArray);

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


    if (error === 1 || errorArray === 1) {
        event.preventDefault();
        return false;
    }
});
