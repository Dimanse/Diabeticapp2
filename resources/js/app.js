import './bootstrap';

document.addEventListener('DOMContentLoaded', function (){


    mostrarFechaActual();



});

function mostrarFechaActual(){
    const year = document.querySelector('#year');
    if(year){
        const fecha = new Date();
        const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        // Pasando algunas opciones y el locale como español de españa
        const fechaFormateada = fecha.toLocaleDateString('es-ES', opciones);
        // fechaFormateada vale "martes, 25 de abr de 2023"
        year.textContent = fechaFormateada;
    }
}

const inputsInyecta = document.querySelectorAll('#inyecta input[type=radio]');
        inputsInyecta.forEach(inputInyecta => {
            inputInyecta.addEventListener('click', function(){
                if(inputInyecta.value === 'Si'){
                    const insulinoDependiente = document.querySelector('#insulinoDependiente');
                    insulinoDependiente.classList.remove('hidden')
                }

                if(inputInyecta.value === 'No'){
                    const insulinoDependiente = document.querySelector('#insulinoDependiente');
                    insulinoDependiente.classList.add('hidden')
                }
            })
        })



	// los deshabilitamos todos
    const inputs=document.querySelectorAll("#insulinas input[type=text]");

    for(let i=0;i<inputs.length;i++)
    {
        // console.log(inputs[i]);
        inputs[i].disabled=true;
    }
	const inputsRadio = document.querySelectorAll("#insulinas input[type=radio]");

	// for(let i=0;i<inputs.length;i++)
	// {
        // 	inputs[i].disabled=true;
        // }
        inputsRadio.forEach(inputRadio =>{
            inputRadio.addEventListener('click', function(){

                inputs.forEach(input => {

                    const inputPrevio = document.querySelector('.hidden');
                    if(inputPrevio){
                        input.disabled = true;
                        input.classList.remove('flex');
                        input.classList.add('hidden');
                    }

                    if(inputRadio.id === input.id){
                        input.disabled = false;

                        input.classList.remove('hidden');
                        input.classList.add('flex');
                    }


                })
            })
            //     console.log(inputs.id);
            //  document.getElementsByName(e.target.id[0]).disabled=false;
            //  document.getElementsByName(e.id)[0].focus();

        })

        const inputs2=document.querySelectorAll("#insulinas2 input[type=text]");
        console.log(inputs2);
    for(let i=0;i<inputs2.length;i++)
    {
        // console.log(inputs[i]);
        inputs2[i].disabled=true;
    }
	const inputsRadio2 = document.querySelectorAll("#insulinas2 input[type=radio]");

	// for(let i=0;i<inputs.length;i++)
	// {
        // 	inputs[i].disabled=true;
        // }
        inputsRadio2.forEach(inputRadio2 =>{
            inputRadio2.addEventListener('click', function(){

                inputs2.forEach(input2 => {

                    const inputPrevio2 = document.querySelector('.insulina2 input[type="text"]');
                    console.log(inputPrevio2);
                    if(inputPrevio2){
                        input2.disabled = true;
                        input2.classList.remove('flex');
                        input2.classList.add('hidden');

                    }

                    if(inputRadio2.id === input2.id){
                        input2.disabled = false;

                        input2.classList.remove('hidden');
                        input2.classList.add('flex');

                    }


                })
            })
            //     console.log(inputs.id);
            //  document.getElementsByName(e.target.id[0]).disabled=false;
            //  document.getElementsByName(e.id)[0].focus();

        })

        const inputsMetformina = document.querySelectorAll('#metformina input[type=radio]');
        inputsMetformina.forEach(inputMetformina => {
            inputMetformina.addEventListener('click', function(){
                if(inputMetformina.value === 'Si'){
                    const dosis = document.querySelector('#dosis');
                    dosis.classList.remove('hidden')
                }

                if(inputMetformina.value === 'No'){
                    const dosis = document.querySelector('#dosis');
                    dosis.classList.add('hidden')
                }
            })
        })


        const inputsTiposInsulina = document.querySelectorAll('#tipos input[type=radio]');
        inputsTiposInsulina.forEach(inputTiposInsulina => {
            inputTiposInsulina.addEventListener('click', function(){
                if(inputTiposInsulina.value === '2'){
                    const dosis = document.querySelector('#insulinas2');
                    dosis.classList.remove('hidden')
                }

                if(inputTiposInsulina.value === '1'){
                    const dosis = document.querySelector('#insulinas2');
                    dosis.classList.add('hidden')
                }
            })
        })



	// habilitamos el seleccionado


