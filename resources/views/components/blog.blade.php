<div class="col-md-10 col-12 p-0 mx-auto mt-2  pb-5 border-top-black row justify-content-center">
    <div class="col-12 p-0 m-0 row">
        <div class="col-md-6 col-12 row mx-auto mx-md-0 px-0 px-md-auto row justify-content-start">
            <div class="col-md-10 col-12 p-0">
                <p class="titulo text-dark size-141">Blog</p>
            </div>
        </div>
        <div class="col-md-6 p-md-0 px-2 row m-auto my-md-auto mx-md-0 justify-content-end col-12">
            <p class=" col-md-8 p-0 col-12 text-md-left text-justify">
                Historias perfectamente imperfectas. Conoce los escritos, historias y reflexiones de miembros de nuestra comunidad. Un espacio que te acerca al corazón de Ekklesia Manizales.

            </p>
        </div>
    </div>
    @include('blog.element_show',['blog'=>App\Models\Blog::inRandomOrder()->first(),'landing'=>true]),
</div>
