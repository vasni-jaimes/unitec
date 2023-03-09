export function validateRegisterForm ( e ) {
    e.preventDefault()

    const education_level = document.querySelector('select[name="education_level"]')
    const inputs = document.querySelectorAll('input')
    const selects = document.querySelectorAll('select')
    const errors = document.querySelectorAll('.error')
    let status = true;

    errors.forEach( item => item.innerHTML = '' )

    selects.forEach( item => {

        if ( item.name == 'career' && education_level.value == 1 ) {
            return
        }

        if ( item.value == undefined || item.value.trim() == '' || item.value.trim() == 0 ) {
            item.nextElementSibling.innerHTML = 'El campo es requerido'
            status = false
            return
        }

        if ( isNaN( item.value.trim() ) ) {
            item.nextElementSibling.innerHTML = 'El campo tiene un valor erroneo'
            status = false
            return
        }
    } )

    inputs.forEach( item => {
        if ( item.value == undefined || item.value.trim() == '' ) {
            item.nextElementSibling.innerHTML = 'El campo es requerido'
            status = false
            return
        }

        if ( item.name == 'name' || item.name == 'last_name' || item.name == 'mother_last_name' ) {
            if ( !validateNames( item ) ) {
                item.nextElementSibling.innerHTML = 'El campo solo acepta caracteres alfanúmericos'
                status = false
                return
            }
        }

        if ( item.name == 'email' ) {
            if ( !validateEmail( item ) ) {
                item.nextElementSibling.innerHTML = 'El email no es valido'
                status = false
                return
            }
        }

        if ( item.name == 'password' ) {
            if ( item.value.length < 8 ) {
                item.nextElementSibling.innerHTML = 'Se requiere un minimo de 8 caracteres'
                status = false
                return
            }
        }
    } )

    console.log(status);

    if ( status == false ) {
        return
    }

    if ( e.type == 'click' || e.type == 'submit' ) {
        document.querySelector('form').submit();
    }
}


export function validateLoginForm( e ) {
    e.preventDefault()

    const email = document.querySelector('input[name="email"]');
    const password = document.querySelector('input[name="password"]');

    if ( email.value == '' ) {
        email.nextElementSibling.innerHTML = 'El campo es requerido'
        return
    }

    if ( !validateEmail( email ) ) {
        email.nextElementSibling.innerHTML = 'No es un email valido'
        return
    }

    if ( password.value == '' ) {
        password.nextElementSibling.innerHTML = 'El campo es requerido'
        return
    }

    if ( password.value.length < 8 ) {
        password.nextElementSibling.innerHTML = 'El minimo de caracteres son 8'
        return
    }

    if ( e.type == 'click' || e.type == 'submit' ) {
        document.querySelector('form').submit();
    }
}


function validateEmail( email ) {
    const expRegEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
    return expRegEmail.exec( email.value.trim() )
}

function validateNames( name ) {
    const expRegString = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/
    return expRegString.exec( name.value.trim() )
}