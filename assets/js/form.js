let inputs = document.querySelectorAll('form input:not([type="submit"]), form textarea');
let submitBtn = document.querySelector('form input[type="submit"]');


inputs.forEach(input => {
    input.addEventListener('change', function(){
        validate_value(input.name);
    })
    // console.log(input);
});



/******
 * submit
 */
// submitBtn.addEventListener('click', function(e) {
//     e.preventDefault();
//     if (
//         validate_value('name')
//     ) {
//         document.querySelector('form').submit;
//     }
// })



/******
 * validation  
 * 
 * @param string name
 */
function validate_value( name )
{
    let formEl = document.querySelector(`form *[name=\"${name}\"]`);
    if (formEl.value !== "" && (formEl.value).length > 0 ) {
        formEl.classList.remove('is-required');
        return formEl.value;
    } else {
        formEl.classList.add('is-required');
        return false;
    }
}