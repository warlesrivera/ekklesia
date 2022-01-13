<div class="container">
    <div class="row">
        <div class="col-sm-5 col-md-6 col-12 pb-4">
            <h1>Commentarios</h1>
            <div id="body-message" class="col-12 p-0 m-0 overflow-auto" style=" height:300px;">
                @include('components.body_comment',['comments'=>$blog->comment()->orderBy('date','DESC')->limit(10)->get()])
            </div>

        </div>
        <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
            <form id="comment-form" class="form-comment">
                @csrf
                <div class="form-group">
                    <h4 class="text-white">deja tu comentario</h4> <label for="message">Mensaje</label>
                    <textarea name="comment" id="" msg cols="30" rows="5" class="form-control" style="background-color: black;"></textarea>
                </div>
                @guest
                <div class="form-group"> <label for="name">Nombre</label> <input type="text" name="name" id="fullname" class="form-control"> </div>
                <div class="form-group"> <label for="email">Correo</label> <input type="text" name="email" id="email" class="form-control"> </div>
                <div class="form-group">
                    <p class="text-secondary">Si tienes un perfil <a href="#" class="alert-link">Perfil</a>este correo se utilizará para mostrar tu foto de perfil</p>
                </div>
                @endguest
                <div class="form-inline"> <input type="checkbox" name="check" id="checkbx" class="mr-1"> <label for="subscribe">Suscribirme a los blogs</label> </div>
                <div class="form-group  col-9"> <button type="button" onclick="send()" id="post" class="btn">Publicar Comentario</button> </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
    function send(){
        var formData = new FormData(document.getElementById("comment-form"));
        var url = "{{route('blog.comment',$id)}}"
        ajaxSend(url,'POST',formData).then((data)=>{
            $("#comment-form")[0].reset();
            $("#body-message").html(data.data.data)
        })
    }
    </script>

@endpush
