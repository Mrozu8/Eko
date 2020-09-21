document.querySelector('#switch').addEventListener('change', function (e) {
    if (this.checked == false) {
        document.querySelector('#nip-show').classList.remove('show-block');
        document.querySelector('#nip-show').classList.add('hide-block');
    }
    else {
        document.querySelector('#nip-show').classList.remove('hide-block');
        document.querySelector('#nip-show').classList.add('show-block');
    }
});


document.querySelector('[data-validate]').addEventListener('submit', function () {
    let formData = new FormData(document.querySelector('[data-validate]'));
    let error = 0;
    let errorArray = 0;
    console.log('2');

    if (formData.getAll('buyer_name')[0] === null || formData.getAll('buyer_name')[0] === "") {
        let validate = document.querySelector('#buyer_name');
        let info = document.querySelector('#buyer_name_valid');
        validate.classList.remove('outline');
        validate.classList.add('outline-validate');
        info.classList.remove('hide-block');
        info.classList.add('show-block');
        error = 1;
    }
    else {
        let validate = document.querySelector('#buyer_name');
        let info = document.querySelector('#buyer_name_valid');
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

    formData.getAll('quantity[]').forEach(quantityValid);

    function quantityValid(val) {
        let info = document.querySelector('#array_valid');

        if (parseInt(val) <= 0) {
            info.classList.remove('hide-block');
            info.classList.add('show-block');
            errorArray = 1;
        }
    }

    if (error === 1 || errorArray === 1) {
        event.preventDefault();
        return false;
    }


});





