class MenuJs {

    closeSession() 
    { 
        fetch('AccessController/closeSession')
        .then((resp) => resp.json())
        .then(function(data) { 
           toastr.success(data.message);

            setTimeout(function() {
               location.href="index.php";
            }, 2500);
        })
        .catch(function(error) {
          console.log(error);
        });
    }

    menu(route) {
        fetch(route)
        .then((resp) => resp.text())
        .then(function(response)
        {
            $('#content').html(response);
        })
        .catch(function(error) {
          console.log(error);
        });  
    }
}

var Menu=new MenuJs();