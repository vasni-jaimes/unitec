import { removeErrors } from './functions'
import { validateLoginForm } from './validations'

const formLogin = document.querySelector('form[name="form-login"]')
if ( formLogin ) {
    const buttonForm = document.querySelector('form button')
    buttonForm.addEventListener('click', validateLoginForm)
    document.querySelectorAll('input').forEach( item => {
        item.addEventListener('input', removeErrors)
    })
}