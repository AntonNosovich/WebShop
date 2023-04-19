const sideToggle = document.querySelector('.js-side-toggle');
const side = document.querySelector('.js-side');
const mainContent = document.querySelector('.js-main');
const logo = document.querySelector('.logo');
const email=document.querySelector('.email__logo-txt');
const selectElement = document.querySelector('select-image');
sideToggle.addEventListener('click' , () => {
    side.classList.toggle('minify'),
    mainContent.classList.toggle('wide');
    if (side.classList.contains('minify')) {
        logo.style.opacity = '0';
        logo.style.visibility = 'hidden'
        email.style.display = 'none';
        email.style.transition = '2s'
    } else {
        email.style.display = 'block';
        logo.style.opacity = '1';
        logo.style.visibility = 'visible'

    }
});
let multiselect_block = document.querySelectorAll(".multiselect_block");
multiselect_block.forEach(parent => {
    let label = parent.querySelector(".field_multiselect");
    let select = parent.querySelector(".field_select");
    select.addEventListener("change", function(element) {
        let selectedOptions = this.selectedOptions;
        label.innerHTML = "";
        for (let option of selectedOptions) {
            let button = document.createElement("button");
            button.type = "button";
            button.className = "btn_multiselect";
            button.textContent = option.textContent;
            button.onclick = _ => {
                option.selected = false;
                button.remove();
                if (!select.selectedOptions.length) label.innerHTML = text
            };
            label.append(button);
        }
    })
})
$(document).ready(function (){
    $('.dynamic').change(function(){
         if($(this).val() != ''){
             var value = $(this).val();
             var dependent = $(this).data('dependent');
             var childdependent = $(this).data('dependent-child');
             $.ajax({
                 url:'/admin/dynamic_adveresting',
                 method:"POST",
                 data:{ value:value,
                     dependent:dependent, childdependent:childdependent},
                 success:function (result)
                 {

                     $('#'+childdependent).html(result);
                     $('#'+dependent).html(result);
                 }
             })
         }
         });
    });





