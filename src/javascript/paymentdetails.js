const buttons = document.getElementsByClassName('payment');
const forms = document.getElementsByClassName('payment-details');

console.log(buttons, forms);

const paymentPPType = document.getElementById('paymentPPType'); //hidden paymentType div
const paymentGType = document.getElementById('paymentGType'); //hidden paymentType div
const paymentCCType = document.getElementById('paymentCCType'); //hidden paymentType div

for(let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', () => {
        const index = i;
        for(let i = 0; i < buttons.length; i++) {
            if(i === index) {
                buttons[i].classList.add('selected');
                var bname = buttons[i].getAttribute('name');
                paymentPPType.value = bname;
                paymentGType.value = bname;
                paymentCCType.value = bname;
                console.log(paymentPPType.value);
                console.log(paymentGType.value);
                console.log(paymentCCType.value);
            } else {
                buttons[i].classList.remove('selected');
            }
        }

        for(let i = 0; i < forms.length; i++) {
            if(i === index) {
                forms[i].classList.add('shown');
                forms[i].classList.remove('hidden');
                // resType.value = outText;
                // console.log(resType.value);
            } else {
                forms[i].classList.add('hidden');
                forms[i].classList.remove('shown');
            }
        }
    })
}