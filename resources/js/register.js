import { changeEducationLevel, removeErrors } from './functions'
import { validateRegisterForm } from './validations'

const formRegister = document.querySelector('form[name="form-register"]')
if ( formRegister ) {
    const nivelIntereses = document.querySelector('select[name="education_level"]')
    const buttonForm = document.querySelector('form button')

    nivelIntereses.addEventListener('change', changeEducationLevel)

    buttonForm.addEventListener('click', validateRegisterForm)
    document.querySelectorAll('input, select').forEach( item => {
        item.addEventListener('input', removeErrors)
        item.addEventListener('change', removeErrors)
    })
}




