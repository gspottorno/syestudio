

/* Método para comprobar el contenido del textbox */

    comprobarValores = function(campo,valor_real) {

      var recipiente = document.getElementById(campo);
      var divrespuesta = document.getElementById(campo + '_response');

      var contenido = recipiente.value;

      //console.log( contenido +' = '+valor_real);

      if(valor_real == contenido) {
        divrespuesta.innerHTML = '<img src="/build/images/smile-32-01.png" alt="Aprende jugando" height="32">';
      } else {
          divrespuesta.innerHTML = '<img src="/build/images/bomba-32-01.png" alt="Aprende jugando" height="32">';
      }



    } //
