import '../bootstrap';

import './layout/menu.js';
import './layout/filters.js'
import './layout/submit.js'
import './layout/photo-upload.js'


/* Global linking */
$("body").on('click', '.go-to', function (){
    let link = $(this).attr('link');
    let hasClass = $(this).hasClass('new-window');

    setTimeout(function (){
        if(hasClass) window.open(link, '_blank');
        else window.location = link;
    }, 100);
});
