<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ShortLinkController extends Controller
{

    public function static()
    {
        return response("ok", 200);
    }
    public function show($url)
    {
        $shortlink = Cache::remember('orders', 60, function() use ($url) {
            return  Shortlink::where('name', $url)->firstOrFail();
        });

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
