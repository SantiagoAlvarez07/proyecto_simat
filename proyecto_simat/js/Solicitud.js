class SolicitudJs {
    //Metodo para insertar usuarios
    insertSolicitud() 
    {
      swal({
        icon: "warning",
        title: "Confirmar Solicitud",
        text: "¿Esta segur@ de enviar solicitud?",
        buttons: {
          cancel: true,
          confirm: true,
        },
      }).then((confirm) => {
        if (confirm) {
          //Enviar solicitud si es que se confirmo el envio
          var object = new FormData(document.querySelector("#insert_solicitud"));
  
          fetch("SolicitudController/insertSolicitud", {
            method: "POST",
            body: object,
          })
            .then((resp) => resp.text())
            .then(function (data) {
              try {
                object = JSON.parse(data);
  
                toastr.error(object.message);
              } catch (error) {
                document.querySelector("#content").innerHTML = data;
                toastr.success("La solicitud fue enviada");
              }
            })
            .catch(function (error) {
              console.log(error);
            });
        }
      });
    }

    cancelarSolicitud() 
    {
      swal({
        icon: "warning",
        title: "Confirmar Cancelación",
        text: "¿Esta segur@ de cancelar solicitud?",
        buttons: {
          cancel: true,
          confirm: true,
        },
      })/*.then((confirm) => {
        if (confirm) {
          //Enviar solicitud si es que se confirmo el envio
          var object = new FormData(document.querySelector("#insert_solicitud"));
  
          fetch("SolicitudController/insertSolicitud", {
            method: "POST",
            body: object,
          })
            .then((resp) => resp.text())
            .then(function (data) {
              try {
                object = JSON.parse(data);
  
                toastr.error(object.message);
              } catch (error) {
                document.querySelector("#content").innerHTML = data;
                toastr.success("Ha cancelado la solicitud");
              }
            })
            .catch(function (error) {
              console.log(error);
            });
        }
      });*/
    }
  
    //Metodo para mostrar el formulario para agregar un nuevo usuario
    showFormSolicitud() 
    {
      var object = new FormData();
      
      $("#my_modal").modal("show"); //Saber en donde vamos a mostrar el contenido
      document.querySelector("#modal_title").innerHTML =
        "Solicitar cupo";
      fetch("SolicitudController/showFormSolicitud2", 
      {
        method: "POST",
        body: object, 
      })
        
        .then((resp) => resp.text())
        .then(function (data) {
          document.querySelector("#modal_content").innerHTML = data;
        })
        .catch(function (error) {
          console.log(error);
        });
    }
    
  }
  
  var Solicitud = new SolicitudJs(); //Crear un nuevo objeto
  