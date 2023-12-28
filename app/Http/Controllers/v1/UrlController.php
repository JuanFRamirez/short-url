<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UrlRequest;
use App\Http\Resources\UrlResource;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

use function PHPUnit\Framework\isEmpty;

class UrlController extends Controller
{
    public function index()
    {
        $urls = Url::all();
        $resource = UrlResource::collection($urls);
        return $resource->toArray(request());
    }

    public function show($urlname)
    {
        $url = Url::where('name', $urlname)->first();
        $resource =  new UrlResource($url);
        return $resource->with($url);
    }

    public function url_redirect($param)
    {
        $url = Url::where('name', $param)->first();
        return redirect()->away($url['url']);
    }

    public function store(UrlRequest $request)
    {
        $foundUrl = Url::where('url', $request->url)->first();
        if ($foundUrl) {
            $res = [
                'message' => 'url exist',
                'url' => $foundUrl->name
            ];
            return response()->json($res, 402);
        } else {
            $url = Url::create($request->validated());
            return new UrlResource($url);
        }
    }
}
