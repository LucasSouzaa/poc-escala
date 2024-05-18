<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function show($url)
    {
        $shortlink = Shortlink::where('name', $url)->firstOrFail();

        return redirect($shortlink->url);
    }
    public function store(Request $request): string
    {
        $request->validate([
            'url' => 'required|url',
            'name'=> 'required|string|alpha|max:30|unique:shortlinks',
        ]);

        Shortlink::create($request->all());

        return config('app.url') . "/" . $request->name;
    }
}
