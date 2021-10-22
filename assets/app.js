/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// any CSS you import will output into a single css file (app.css in this case)
import 'bootstrap';
import bsCustomFileInput from 'bs-custom-file-input';

// start the Stimulus application
import './bootstrap';

bsCustomFileInput.init();

$(document).ready(function () {
    console.log("assets/app.js running");

    $('#pastParticiple_1').click(function() {
      console.log( "Handler for .blur() called." );
    });

});

import './js/scripts.js';
