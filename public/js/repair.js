
// document.querySelector('[data-validate]').addEventListener('submit', function () {
//     let formData = new FormData(document.querySelector('[data-validate]'));
//     let error = 0;
//
//     if (formData.getAll('repair_number')[0] === null || formData.getAll('repair_number')[0] === "") {
//         let validate = document.querySelector('#repair_number');
//         let info = document.querySelector('#repair_number_valid');
//         validate.classList.remove('outline');
//         validate.classList.add('outline-validate');
//         info.classList.remove('hide-block');
//         info.classList.add('show-block');
//         error = 1;
//     }
//     else {
//         let validate = document.querySelector('#repair_number');
//         let info = document.querySelector('#repair_number_valid');
//         validate.classList.add('outline');
//         validate.classList.remove('outline-validate');
//         info.classList.add('hide-block');
//         info.classList.remove('show-block');
//     }
//
//     if (formData.getAll('customer')[0] === null || formData.getAll('customer')[0] === "") {
//         let validate = document.querySelector('#customer');
//         let info = document.querySelector('#customer_valid');
//         validate.classList.remove('outline');
//         validate.classList.add('outline-validate');
//         info.classList.remove('hide-block');
//         info.classList.add('show-block');
//         error = 1;
//     }
//     else {
//         let validate = document.querySelector('#customer');
//         let info = document.querySelector('#customer_valid');
//         validate.classList.add('outline');
//         validate.classList.remove('outline-validate');
//         info.classList.add('hide-block');
//         info.classList.remove('show-block');
//     }
//
//     if (formData.getAll('address')[0] === null || formData.getAll('address')[0] === "") {
//         let validate = document.querySelector('#address');
//         let info = document.querySelector('#address_valid');
//         validate.classList.remove('outline');
//         validate.classList.add('outline-validate');
//         info.classList.remove('hide-block');
//         info.classList.add('show-block');
//         error = 1;
//     }
//     else {
//         let validate = document.querySelector('#address');
//         let info = document.querySelector('#address_valid');
//         validate.classList.add('outline');
//         validate.classList.remove('outline-validate');
//         info.classList.add('hide-block');
//         info.classList.remove('show-block');
//     }
//
//     if (formData.getAll('phone_one')[0] === null || formData.getAll('phone_one')[0] === "") {
//         let validate = document.querySelector('#phone_one');
//         let info = document.querySelector('#phone_one_valid');
//         validate.classList.remove('outline');
//         validate.classList.add('outline-validate');
//         info.classList.remove('hide-block');
//         info.classList.add('show-block');
//         error = 1;
//     }
//     else {
//         let validate = document.querySelector('#phone_one');
//         let info = document.querySelector('#phone_one_valid');
//         validate.classList.add('outline');
//         validate.classList.remove('outline-validate');
//         info.classList.add('hide-block');
//         info.classList.remove('show-block');
//     }
//
//
//     if (formData.getAll('damage_note')[0] === null || formData.getAll('damage_note')[0] === "") {
//         let validate = document.querySelector('#damage_note');
//         let info = document.querySelector('#damage_note_valid');
//         validate.classList.remove('outline');
//         validate.classList.add('outline-validate');
//         info.classList.remove('hide-block');
//         info.classList.add('show-block');
//         error = 1;
//     }
//     else {
//         let validate = document.querySelector('#damage_note');
//         let info = document.querySelector('#damage_note_valid');
//         validate.classList.add('outline');
//         validate.classList.remove('outline-validate');
//         info.classList.add('hide-block');
//         info.classList.remove('show-block');
//     }
//
//     if (formData.getAll('repair_date')[0] === null || formData.getAll('repair_date')[0] === "") {
//         let validate = document.querySelector('#repair_date');
//         let info = document.querySelector('#repair_date_valid');
//         validate.classList.remove('outline');
//         validate.classList.add('outline-validate');
//         info.classList.remove('hide-block');
//         info.classList.add('show-block');
//         error = 1;
//     }
//     else {
//         let validate = document.querySelector('#repair_date');
//         let info = document.querySelector('#repair_date_valid');
//         validate.classList.add('outline');
//         validate.classList.remove('outline-validate');
//         info.classList.add('hide-block');
//         info.classList.remove('show-block');
//     }
//
//
//     if (error === 1) {
//         event.preventDefault();
//         return false;
//     }
// });
