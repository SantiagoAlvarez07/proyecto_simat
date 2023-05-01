class PersonJs
{
    insertPerson()
    {
        var object=new FormData(document.querySelector('#insert_person'));
        
        fetch('PersonController/insertPeopleProfile',{
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
    updateReligion()
    {
        var object=new FormData(document.querySelector('#update_religion'));
        
        fetch('ReligionController/updateReligion',{
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

    showReligion(id)
    {
        var object=new FormData();

        object.append('id',id);
        
        fetch('ReligionController/showReligion',{
            method:'POST',
            body:object
        })
        .then((resp) => resp.text())
        .then(function(response)
        {
            $('#my_modal').modal('show');

            document.querySelector('#modal_title').innerHTML="Actualizar Religi&oacute;n";

            document.querySelector('#modal_content').innerHTML=response;
        })
        .catch(function(error) {
          console.log(error);
        }); 
    }
}

var Person=new PersonJs();