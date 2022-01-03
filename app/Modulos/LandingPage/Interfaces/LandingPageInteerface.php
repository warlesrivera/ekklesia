<?php

namespace App\Modulos\LandingPage\Interfaces;

use App\Models\Blog;
use Illuminate\Http\Request;

interface LandingPageInterface
{
    public function list();
    public function store(Request $request);
    public function show(Blog $blog);
    public function update(Request $request, Blog $blog);
    public function destroy(Blog $blog);

}
