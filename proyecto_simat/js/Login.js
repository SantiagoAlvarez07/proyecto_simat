
const form = document.querySelector('#formLogin');
form.addEventListener('submit', function(event) 
{
  event.preventDefault(); // prevenir el envío del formulario
  
  const doc = document.querySelector('#docUser').value;
  const password = document.querySelector('#password').value;
  //const rol = document.querySelector('#rol').value;

  if (doc == '' || password == '') 
  {
    Swal.fire({
      icon: 'warning',
      title: '¡DATOS VACIOS!',
      text: "Por favor ingrese todos los datos.",
      width: 500,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'OK'
    }).then((result) => 
    {
      if (result.isConfirmed) 
      {
        form.submit();
      }
    });
  }else
  {
    if (doc.length < 8) 
    {
      Swal.fire({
        icon: 'warning',
        text: "El DOCUMENTO debe tener al menos 8 caracteres.",
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
      }).then((result) => 
      {
        if (result.isConfirmed) 
        {
          form.submit();
        }
      });
    }
    if(password.length < 8) 
    {
          Swal.fire({
            icon: 'warning',
            text: "La CONTRASEÑA debe tener al menos 8 caracteres.",
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
          }).then((result) => 
          {
            if (result.isConfirmed) 
            {
              form.submit();
            }
          });
    }

    if (doc == '1004897868' && password == 'santi123') 
    {
    // formulario válido, puedes enviar los datos
    Swal.fire(
    {
      position: 'top-end',
      icon: 'success',
      title: '¡CORRECTO!',
      showConfirmButton: false,
      timer: 500,
    });form.submit();
    
    }/*
    else
  {
    Swal.fire({
      icon: "error",
      title: "DATOS INCORRECTOS",
      text: "Diligencie de nuevo...",
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'OK'
    }).then((result) => 
    {
      if (result.isConfirmed) 
      {
        form.submit();
      }
    });
  }*/
 
  }
});