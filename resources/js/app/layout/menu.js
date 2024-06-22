$(document).ready(function (){
    $(".single_link_clickable").click(function (){
        let $_this = $(this);
        $(".single_link_clickable").each(function (){
            if($_this.attr('id') !== $(this).attr('id')) $(this).removeClass('active');
        });

        $_this.toggleClass('active');

        if($_this.hasClass('active')){
            $_this.find('.fa').removeClass('fa-chevron-down').addClass('fa-chevron-up');
        }
    });

    $(".open__mobile_menu").click(function (){
        $(".mobile__header").addClass('active');
    })

    $(".close__mobile_menu").click(function (){
        $(".mobile__header").removeClass('active');
    })
});
