<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;
use App\Http\Resources\UrlResource;
use App\Models\Url;
use Illuminate\Http\Request;

class webUrlController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function show($urlname)
    {
        $url = Url::where('name', $urlname)->first();
        $resource =  new UrlResource($url);
        return redirect()->away($resource['url']);
    }
    public function store(UrlRequest $request)
    {
        $foundUrl = Url::where('url', $request->url)->first();
        if ($foundUrl) {
            $res = [
                'reason' => 'this url already exists',
                'url' => $foundUrl["formated_name"]
            ];
            return redirect()->route('web.index')->with('error', 'Error creating')->with('res', $res);
        } else {
            $created = Url::create($request->validated());
            $createdUrl = $created["formated_name"];
            return redirect()->route('web.index')->with('success', 'url created successfully')->with('res', $createdUrl);
        }
    }
}
