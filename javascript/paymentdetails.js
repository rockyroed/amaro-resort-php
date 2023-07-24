const buttons = document.getElementsByClassName('payment');
const forms = document.getElementsByClassName('payment-details');

console.log(buttons, forms);

const paymentType = document.getElementById('paymentType'); //hidden paymentType div

for(let i = 0; i < buttons.length; i++) {
    buttons[i].addEventListener('click', () => {
        const index = i;
        for(let i = 0; i < buttons.length; i++) {
            if(i === index) {
                buttons[i].classList.add('selected');
                var bname = buttons[i].getAttribute('name');
                paymentType.value = bname;
                console.log(paymentType.value);
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