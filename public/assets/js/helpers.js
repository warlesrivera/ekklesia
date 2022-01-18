
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
            pageLength: 6,
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
    formData.append('description',ckEditor.getData());
    var url = `/${type}`;

    ajaxSend(url,'POST',formData).then((data)=>{
        type = type.charAt(0).toUpperCase() + type.slice(1);
        deleteTable(`table${type}`);
        startTable();
        $("#form-blog")[0].reset();
            ckEditor.data.set('');
    })
}
function update(form,type){
    var formData = new FormData(document.getElementById("form-blog"));
    var url = "{{url('blog')}}/"+$("#id").val();
    var url = `${window.location.hostname}/${type}/`+ $(`#${form} #id`).val();

    ajaxSend(url,'POST',formData)
    .then((data)=>{
        type = type.charAt(0).toUpperCase() + type.slice(1);
        deleteTable(`table${type}`);
        startTable();
        $(`#${form}`)[0].reset();
    });

}
function crearBtn(form){
    $(`#${form} #btn-crear`).removeClass('d-none');
    $(`#${form} #btn-editar`).addClass('d-none');
}
function editarBtn(form){
    $(`#${form} #btn-crear`).addClass('d-none');
    $(`#${form} #btn-editar`).removeClass('d-none');
}
