<div class="form-group">
    <label for="titulo">Nombre de E_TEAM</label>
    <input type="text" class="form-control" id="name_{{$type}}" name="name" id="name" aria-describedby="nameHelp"  placeholder="Nombre ...">
    <small id="nameHelp" class="form-text text-muted">Nmobre del E-TEAM </small>
</div>
<div class="form-group">
    <label for="description">descripción corta</label>
    <textarea name="description_short_{{$type}}" id="description_short_{{$type}}" onchange="limitDescription('{{$type}}')" class="form-control" cols="10" rows="3"></textarea>
</div>

<div class="form-group">
    <label for="description">descripción</label>
    <textarea name="description_{{$type}}" id="description_{{$type}}" class="ckeditor" cols="30" rows="10"></textarea>
</div>

<div class="py-3">
    <input type="file" name="images[]" id="images_{{$type}}"  class="file" data-show-upload="false"
    data-show-cancel="false" data-upload-url="" data-show-preview="true  " data-browse-label="Buscar imágenes  " data-browse-class="btn btn-info text-white"
    data-max-file-size="1500" data-browse-icon="<i class=fa fa-images></i>" data-remove-label="Quitar" data-el-error-container="#errors" data-remove-class="btn"
    data-language="es" accept="image/*" data-max-file-count="5" multiple>
</div>
