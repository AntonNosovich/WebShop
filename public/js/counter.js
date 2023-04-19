const counterText = document.querySelector('.counter-wrap b');
const counterBtn = document.querySelectorAll('.counter-wrap .count');
const counterText2 = document.querySelector('.counter-wrap .sale');
const counterBtn2 = document.querySelectorAll('.counter-wrap .count_sale');
const inputsale=document.querySelector('.counter-wrap .input_sale');
const inputquantity=document.querySelector('.counter-wrap .input_quantity');
let counter = document.querySelector('.counter-label').innerHTML;
let counter2=document.querySelector('.sale').innerHTML ;

counterBtn.forEach((el, index) => {
    el.addEventListener('click', (e) => {
        e.preventDefault()
        if (index === 0 && counter > 0) {
            --counter;

        } else if (index === 1 && counter < 100) {
            ++counter;
        }
        counterText.textContent = counter;
        inputquantity.setAttribute('value', counter)

        setDisabled(counter);


    });
});
counterBtn2.forEach((el, index) => {
    el.addEventListener('click', (e) => {
        e.preventDefault()
        if (index === 0 && counter2 > 0) {
            --counter2;
        } else if (index === 1 && counter2 < 99) {
            ++counter2;
        }
        counterText2.textContent = counter2;
        inputsale.setAttribute('value', counter2)
        setDisabled2(counter2);

    });
});
function setDisabled(counter) {
    if (counter === 0) {
        counterBtn[0].disabled = true;
    } else if (counter === 100) {
        counterBtn[1].disabled = true;
    } else {
        counterBtn[0].disabled = false;
        counterBtn[1].disabled = false;
    }
}
function setDisabled2(counter) {
    if (counter === 0) {
        counterBtn2[0].disabled = true;
    } else if (counter === 99) {
        counterBtn2[1].disabled = true;
    } else {
        counterBtn2[0].disabled = false;
        counterBtn2[1].disabled = false;
    }
}

