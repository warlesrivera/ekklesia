
function ajaxSend(url ,method,data=null ){

    return  new Promise((resolve,reject)=>{
        $.ajax({
            url: url,
            method: method,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            processData: false,
            contentType: false,
            data: data,
            success: function(data) {

                if(data.message!=undefined){
                    swal.fire({
                        type: 'success',
                        title: 'Datos guardados',
                        html: data.message
                    });
                }
                resolve( {'isOk':true,'data':data});
            },
            error: function() {
                swal({
                    type:'error',
                    title:'Ups ocurrio un error',
                    html:'Nose ha podido procesar tu solicitud. Vuelve a intentarlo.'
                });

            }
        });

    });
}
function initTable(idTabla,ajaxUrl,column,buttons){
    tabla=$("#"+idTabla).DataTable({
            dom: 'Bfrtip',
            bLengthChange:false,
            responsive:true,
            ajax:ajaxUrl,
            language:{url:'../assets/stylesAdm/vendor/datatables/spanish.json'},
            columns:column,
            order: [[ 2, "DESC" ]],
            pageLength: 4,
                buttons:buttons,
            fnCreatedRow: function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData.clave);
                }
        });
}
function deleteTable(idTable){
    $("#"+idTable).DataTable().destroy();
}
function builCKeditor(id){
    return  new Promise((resolve,reject)=>{
        ClassicEditor
        .create( document.querySelector('#'+id), {
            toolbar: {
                items: [
                  "heading",'|',
                  'alignment', '|',
                  "bold","italic",'strikethrough', 'underline', 'subscript', 'superscript', '|',
                  "link",'|',
                  'bulletedList', 'numberedList', 'todoList',
                  'uploadImage', 'blockQuote', '|',
                  '-', // break point
                  'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                  'code', 'codeBlock', '|',
                  'insertTable', '|',
                  'outdent', 'indent', '|',
                  "numberedList", "|",
                  "mediaEmbed",
                  "undo",
                  "redo",
                ],
              },
              image: {
                toolbar: [
                    "imageStyle:wrapText",'|',
                    "imageStyle:alignLeft",'|',
                    "imageStyle:alignRight",'|',
                    "imageStyle:breakText",'|',
                    "imageStyle:side",'|',
                    "imageStyle:block",'|',
                    "imageStyle:inline",'|',
                    "imageStyle:alignBlockLeft",'|',
                    "imageStyle:block",'|',
                    "imageStyle:alignBlockRight",'|',
                    "toggleImageCaption",
                    'imageTextAlternative','|','linkImage'
                ],
              },
            shouldNotGroupWhenFull: true,
            extraPlugins: [ SimpleCustomUploadAdapterPlugin ],
        } )
        .then( editor => {
            resolve(editor);
        } )
        .catch( err => {
            console.log(err.stack)

        } );
    });

}
function deleteElement(type,url){
    swal.fire({
          type: 'warning',
          title: '¡Atención!',
          html:`¿Desea eliminar este ${type} ?`,
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si',
          cancelButtonText:'No',
        }).then(function (result) {
            if (result.value) {
                var formData = new FormData(document.getElementById("form-delete"));
                ajaxSend(url,'DELETE',formData)
                .then(()=>{
                    deleteTable(`table${type}`);
                    startTable();
                });
            }
        });
}
function save(form,type){
    var formData = new FormData(document.getElementById(form));
    if(type=="blog" || type=="team")
       formData.append('description',ckEditor.getData());

    var url = `/${type}`;

    sendOK(url,'POST',formData,type,form);

}
function sendOK(url,method,formData,type,form){

    ajaxSend(url,method,formData).then((data)=>{
        type = type.charAt(0).toUpperCase() + type.slice(1);
        deleteTable(`table${type}`);
        startTable();
        $(`#${form}`)[0].reset();
            ckEditor.data.set('');
    })
}

function update(form,type){
    var formData = new FormData(document.getElementById(form));
    if(type=="blog" || type=="team")
       formData.append('description',ckEditor.getData());


    formData.append('_method','PUT');
    var url = `/${type}/`+ $(`#${form} #id`).val();
    sendOK(url,"POST",formData,type,form)

}
function crearBtn(){
    $(`#btn-guardar`).removeClass('d-none');
    $(`#btn-editar`).addClass('d-none');
}
function editarBtn(){
    $(`#btn-guardar`).addClass('d-none');
    $(`#btn-editar`).removeClass('d-none');
}

function rmIMG(element) {
    element.remove();
    var imgs = [];
    for (var i = $('.galery-item').length - 1; i >= 0; i--) {
        imgs.push($($('.galery-item')[i]).data('img'));
    }
    $('[name="MoreimgGaleryPre"]').val(JSON.stringify(imgs));
}
