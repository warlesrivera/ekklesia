const stepOptions = {
    headerTag: "span",
    bodyTag: "fieldset",
    transitionEffect: "slideLeft",
    autoFocus: true,
    // labels: {cancel: "Cancelar",current: "Actual:",pagination: "Paginación",finish: "Publicar",next: "Continuar",previous: "Anterior",loading: "Cargando ..."},
    actionContainerTag: 'nav',
    stepsContainerTag: 'i',
    onStepChanging: function (event, currentIndex, newIndex)
    {
        if (isMobile) {
            $('html,body').animate({
            scrollTop: form.offset().top},
            'fast');
        }
        $('.message-error').hide();
        form.validate().settings.ignore = ":disabled,:hidden";
        if (currentIndex > newIndex)
        {
            return true;
        }
        if (currentIndex < newIndex)
        {
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        if (currentIndex==1 && $('#fr-pub-home [name="opportunity_type_id"]').length==1) {
            if($('#fr-pub-home [name="opportunity_type_id"]').val()=='1'){
                $('.cnt-employ-on').show();
            }else{
                $('.cnt-employ-on').hide();
            }
        }
        if(currentIndex>1 && $('#fr-pub-home [name="opportunity_type_id"]').length==1){

            if (window._tmpStep == undefined) {
                window._tmpStep = {object:$('#fr-pub-home').steps('getStep',4),removed:$('#fr-pub-home').steps('remove',4)};
            }
            if ($('#fr-pub-home input[type="hidden"][name="verified_status"]').length==0){
                $('#fr-pub-home').append('<input type="hidden" name="verified_status" value="0">');
            }
            if(validTypes.includes(parseInt($('#fr-pub-home [name="opportunity_type_id"]').val())) && typeof window._tmpStep != 'undefined' && window._tmpStep.removed){
                $('#fr-pub-home input[name="verified_status"]').remove();
                $('#fr-pub-home').steps('insert',4,window._tmpStep.object);
                window._tmpStep.removed = false;
            }
            if(validTypes.includes(parseInt($('#fr-pub-home [name="opportunity_type_id"]').val())) && typeof window._tmpStep != 'undefined' && !window._tmpStep.removed){
                $('#fr-pub-home input[type="hidden"][name="verified_status"]').remove();
            }
            if(!validTypes.includes(parseInt($('#fr-pub-home [name="opportunity_type_id"]').val())) && typeof window._tmpStep != 'undefined' && window._tmpStep.removed==false){
                window._tmpStep.removed = $('#fr-pub-home').steps('remove',4);
            }
        }

        return form.valid();
    },
    onStepChanged: function (event, currentIndex, priorIndex) {
        if(!$('#fr-pub-home-p-'+currentIndex).hasClass('current')){
            $('#fr-pub-home-p-'+currentIndex).addClass('current')
        }
    },
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {
        if ($('form[name="fr-pub-home"] [name="image"]').length>0 && $('form[name="fr-pub-home"] [name="image"]').val()=='') {
            swal({
                type: 'info',
                title: '¿Continuar sin imágen principal?',
                text: 'Si seleccionas una imagen principal tú publicación sera mas visible en la red.',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, continuar!',
                cancelButtonText: 'No, espera!',
                confirmButtonClass: 'btn btn-warning',
                cancelButtonClass: 'btn btn-default',
                buttonsStyling: false
            }).then(function () {
                sendForm($('[name="type"]:checked').val());
                delete window._tmpStep;
            }, function (dismiss) {
                return;
            });
        }else{
            sendForm($('[name="type"]:checked').val());
            delete window._tmpStep;
        }
    },
    onCanceled: function (event) { delete window._tmpStep; }
};

$('#fr-pub').steps(stepOptions);
