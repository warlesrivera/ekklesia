function ajaxSend(url ,method,data=null ){

    return  new Promise((resolve,reject)=>{
        $.ajax({
            url: url,
            method: method,
            processData: false,
            contentType: false,
            data: data,
            success: function(data) {
                if(method=='POST' || method=='DELETE'){
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

function deleteAjax(url,token){
    return new Promise((resolve,reject)=>{
        $.ajax({
            url: url,
            type: "DELETE",
            headers: {
             'X-CSRF-TOKEN': token
            },
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(data)   // tell jQuery not to set contentType
          {
                swal.fire({
                      type: 'success',
                      title: '¡Atención!',
                      html:'Datos actualizados',
                 });
                 resolve( {'isOk':true,'data':data});
          }
        });
    });

}


function initTable(idTabla,ajaxUrl,column,buttons){
    tabla=$("#"+idTabla).DataTable({
            dom: 'Bfrtip',
            "bLengthChange":false,
            "responsive":true,
            "ajax":ajaxUrl,
            language:{url:'../assets/stylesAdm/vendor/datatables/spanish.json'},
            columns:column,
            "order": [[ 2, "DESC" ]],
            "pageLength": 6,
                "buttons":buttons,
            "fnCreatedRow": function( nRow, aData, iDataIndex ) {
                        $(nRow).attr('id', aData.clave);
                }
        });
}


function deleteTable(idTable){
    $("#"+idTable).DataTable().destroy();
}

