<?php

namespace App\Modulos\Blog\Interfaces;

use App\Models\Blog;
use Illuminate\Http\Request;

interface BlogInterface
{
    public function index();
    public function store(Request $request);
    public function show(Blog $blog);
    public function update(Request $request, Blog $blog);
    public function destroy(Blog $blog);

}
