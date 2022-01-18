{{ csrf_field() }}
<input type="hidden" name="id" id="id">
<div class="form-group">
    <label for="titulo">Titulo</label>
    <input type="text" class="form-control" id="title" name="title" id="title" aria-describedby="titleHelp"  placeholder="Titulo ...">
    <small id="titleHelp" class="form-text text-muted">titulo del blog </small>
</div>
<div class="form-group">
    <label for="description">descripción</label>
    <textarea name="description" id="description" class="ckeditor" cols="30" rows="10"></textarea>
</div>

{{-- <div class="py-3">
    <input type="file" name="images[]" id="images"  class="file" data-show-upload="false"
    data-show-cancel="false" data-upload-url="" data-show-preview="true  " data-browse-label="Buscar imágenes  " data-browse-class="btn btn-info text-white"
    data-max-file-size="1500" data-browse-icon="<i class=fa fa-images></i>" data-remove-label="Quitar" data-el-error-container="#errors" data-remove-class="btn"
    data-language="es" accept="image/*" data-max-file-count="5" multiple>

</div> --}}
<div id="sectionImages"></div>

@if(filled(auth()->user()->roles()->first()) && auth()->user()->roles()->first()->id == 1)
<div class="form-check">
    <input class="form-check-input" type="checkbox" value="1" id="state" name="state">
    <label class="form-check-label" for="state" >
    Actividar Blog (esta listo para el publico)
    </label>
</div>
@endif
