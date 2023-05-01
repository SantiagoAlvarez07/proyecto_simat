class CountryJs
{
    insertCountry()
    {
        var object=new FormData(document.querySelector('#insert_country'));
        
        fetch('CountryController/insertCountry',{
            method:'POST',
            body:object
        })
        .then((resp) => resp.text())
        .then(function(response)
        { 
            try
            {
                object =JSON.parse(response);
                toastr.error(object.message);
            }
            catch (error)
            {
                document.querySelector('#content').innerHTML=response;
                toastr.success('Registro Guardado');
            }
        })
        .catch(function(error) {
          console.log(error);
        }); 
    }

    updateCountry()
    {
        var object=new FormData(document.querySelector('#update_country'));
        
        fetch('CountryController/updateCountry',{
            method:'POST',
            body:object
        })
        .then((resp) => resp.text())
        .then(function(response)
        {
            try
            {
                object =JSON.parse(response);
                toastr.error(object.message);
            }
            catch(error)
            {
                document.querySelector('#content').innerHTML=response;
                toastr.success('Registro Guardado');
            }
        })
        .catch(function(error) {
          console.log(error);
        }); 
    }

    showCountry(id)
    {
        var object=new FormData();

        object.append('id',id);
        
        fetch('CountryController/showCountry',{
            method:'POST',
            body:object
        })
        .then((resp) => resp.text())
        .then(function(response)
        {
            $('#my_modal').modal('show');

            document.querySelector('#modal_title').innerHTML="Actualizar Pa&iacute;s";

            document.querySelector('#modal_content').innerHTML=response;
        })
        .catch(function(error) {
          console.log(error);
        }); 
    }
}

var Country=new CountryJs();