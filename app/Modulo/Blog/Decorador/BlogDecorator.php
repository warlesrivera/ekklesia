<?php

namespace App\Modulos\Blog\Decorador;

use App\Models\Blog;
use App\Modulos\Blog\Interfaces\BlogInterface;
use Illuminate\Http\Request;

class BlogDecorator implements BlogInterface
{
    public function index(){}
    public function store(Request $request){}
    public function show(Blog $blog){}
    public function update(Request $request, Blog $blog){}
    public function destroy(Blog $blog){}
}
