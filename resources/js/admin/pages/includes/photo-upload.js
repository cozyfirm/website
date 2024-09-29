$(document).ready(function (){

    // -------------------------------------------------------------------------------------------------------------- //
    /**
     *  Other way is to upload images over HTTP and set id of uploaded file inside hidden input
     */
    $('.photo-return-id').change(function () {
        let data = new FormData();
        let ins = document.getElementById($(this).attr('id')).files.length;

        data.append('photo-input', document.getElementById($(this).attr('id')).files[0]);  // Append an image
        data.append('path', $(this).attr('path'));                                           // Append source of image - place where to save !
        data.append('category', $(this).attr('category'));

        let photoID    = $(this).attr('photo-name');
        let src        = $(this).attr('path');
        let input_id   = $(this).attr('photo-name') + '-input';
        // document.getElementById("loading_wrapper").style.display = 'block'; /** show loading part **/

        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                response = JSON.parse(this.responseText);

                if(response['code'] === '0000'){
                    // Set source of an image returned from ajax request
                    let image = document.getElementById(photoID);
                    image.setAttribute('src', '/' + src + response['photo']);

                    // Set input as image ID for additional processing
                    $('#'+photoID+'-input').val(response['image_id']);
                }
            }
        };
        xml.open('POST', $(this).attr('url'));

        // ** Postavi tokene ** //
        let metas = document.getElementsByTagName('meta');
        for (let i=0; i<metas.length; i++) {
            if (metas[i].getAttribute("name") == "csrf-token") {
                xml.setRequestHeader("X-CSRF-Token", metas[i].getAttribute("content"));
            }
        }
        xml.send(data); // napravi http
    });
});
