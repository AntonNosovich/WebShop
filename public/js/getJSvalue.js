const quantity = document.querySelector('.counter-wrap b');
const sale = document.querySelector('.counter-wrap .sale');
$(document).on('click', '#button', function(){
    let txt = 'Hello';
    $.ajax({
        url: 'app/Admin/ProductsController.php',
        type: 'POST',
        data: txt,
    })
})
