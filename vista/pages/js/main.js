
const formulario = document.getElementById('myForm');
const inputs = document.querySelectorAll('#myForm input');

const campos = {
	usuario: false,
	nombre: false,
	password: false,
	correo: false,
	telefono: false
}

const validarFormulario = (e) =>{

    switch (e.target.name){
        case "password":
			validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;

    }
}

const validarPassword2 = () => {
    
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('confirm-password');

	if(inputPassword1.value !== inputPassword2.value){
		campos['password'] = false;
	} else {
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});


formulario,addEventListener('submit', (e)=>{
    if(campos.password){
        document.getElementById("myForm").submit();
    }else{
        Swal.fire({
            position: 'center-center',
            icon: 'error',
            title: 'las contraseñas no coinciden',
            showConfirmButton: false,
            timer: 1500
        })
        e.preventDefault();
    }
    
});

  
  