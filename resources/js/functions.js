import careers from './api/careersApi'

export async function changeEducationLevel( e ) {
    const interes = e.target.value
    const selectCareer = document.querySelector('select[name="career"]');
    if ( interes == 1 || interes == undefined || isNaN(interes) || interes == 0 ) {
        selectCareer.innerHTML = '<option>No hay carreras</option>'
        return
    }

    await getCareersApi( interes, selectCareer )
}

export async function getCareersApi ( interes, selectCareer ) {

    await careers.get(`/${ interes }`)
            .then( ( { data } ) => {
                let html = '';
                if (data.message == 'ok') {
                    data.results.forEach( ( { name, id } ) => {
                        html += `<option value="${ id }"> ${ name } </option>`
                    });
                    selectCareer.innerHTML = html;
                }
                else {
                    selectCareer
                        .nextElementSibling.innerHTML = 'Ocurrio un error, intentelo de nuevo';
                }
            })
            .catch( error => {
                selectCareer
                    .nextElementSibling.innerHTML = 'Ocurrio un error, intentelo de nuevo';
            });
}


export function removeErrors() {
    const errors = document.querySelectorAll('.error')
    errors.forEach( item => item.innerHTML = '' )
}