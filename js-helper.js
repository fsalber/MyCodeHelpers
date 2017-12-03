/*
 * Florian SALBER's php Helper function
 * Help me to start project faster
 *
 * Allow you to save time on your projects ;)
 * LICENSE MIT 2017
 */

 /*
  * jQuery confirm box (https://craftpip.github.io/jquery-confirm/)
  */
$(element).confirm({
    title: 'My Title',
    content: "My Message",
    type: 'orange',
    theme: 'supervan',
    autoClose: false,
    typeAnimated: true,
    icon: 'fontawesome.io icon',
    buttons: {
        sure: {
            text: 'Sure',
            btnClass: 'btn-orange',
            action: function () {
            }
        },
        close: {
            text: 'Close',
            btnClass: 'btn-orange',
            action: function() {

            }
        }
    }
});

/*
 * Display jQuery confirm alert for each flash message
 */
$(document).on('ready', function(){
    if($('.alertmessage').length > 0){
        for (var i = 0; i < $('.alertmessage').length; i++) {
            jqueryAlert($('.alertmessage')[i]);
        }
    }

    /*
     * This function need data attr on the element. 
     * @attr data-key: Key like Success, Danger, Warning etc...
     * @attr data-message: Message to display
     */
    function jqueryAlert(element){
        var key = $(element).data('key');
        if(key === "danger") {
            $.confirm({
                title: 'Hum...',
                content: $(element).data('message'),
                type: 'red',
                theme: 'material',
                autoClose: false,
                typeAnimated: true,
                icon: 'fa fa-times',
                buttons: {
                    sure: {
                        text: "D'accord",
                        btnClass: 'btn-red',
                        action: function () {
                        }
                    }
                }
            });
        } else if(key === "success") {
            $.confirm({
                title: 'Félicitation !',
                content: $(element).data('message'),
                type: 'green',
                theme: 'material',
                autoClose: false,
                typeAnimated: true,
                icon: 'fa fa-check',
                buttons: {
                    sure: {
                        text: "Fermer l'annonce",
                        btnClass: 'btn-green',
                        action: function () {
                        }
                    }
                }
            });
        } else if(key === "warning") {
            $.confirm({
                title: 'Attention !',
                content: $(element).data('message'),
                type: 'orange',
                theme: 'material',
                autoClose: false,
                typeAnimated: true,
                icon: 'fa fa-exclamation-triangle',
                buttons: {
                    sure: {
                        text: "Fermer l'annonce",
                        btnClass: 'btn-orange',
                        action: function () {
                        }
                    }
                }
            });
        }
    }
});

/*
 * Snowfall configuration (http://loktar00.github.io/JQuery-Snowfall/)
 */
$(document).snowfall({image : "{{ asset('img/snow.png') }}", minSize: 5, maxSize:15});