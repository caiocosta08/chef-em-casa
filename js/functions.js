export function sendContactChef(){
    $('#contact-chef').submit(function(){
        var dados = $( this ).serialize();
        
        $.ajax({
            type: "POST",
            url: "",
            data: dados,
            success: function()
            {
                alert('CONTRATADO COM SUCESSO');
            }
        });
        
        return false;
    });
}

export function toggleLinks(param) {
    $(".post-aula").toggle();
    $(".post-calendar").toggle();
    if(param == 'chef'){
        $("li#id1").addClass('active');
        $("li#id0").removeClass('active');
    }else{
        $("li#id0").addClass('active');
        $("li#id1").removeClass('active');
    }
}