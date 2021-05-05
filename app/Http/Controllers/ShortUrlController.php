<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShortRequest;
use App\ShortUrl;
use App\User;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function index(){
        return view('sortLink.sort');
    }
    public function short(ShortRequest $request)
    {
        if ($request->original_url) {
            if (auth()->user()) {
                $new_url = auth()->user()->linked()->create([
                    'original_url' => $request->original_url
                ]);
            } else {
                $new_url = ShortUrl::create([
                'original_url' => $request->original_url
            ]);
            }
            if ($new_url) {
                $short_url = str_random($new_url->id, 10, 36,);
                $new_url->update([
                    'short_url' => $short_url
                ]);

                return redirect()->back()->with('success_message', 'Ini link Anda : <a target="_blank"class="text-green-500" href="'. url($short_url) .'">'. url($short_url) .'</a>');
            }
        }
        return back();
    }

    public function show($code)
    {
        $short_url = ShortUrl::where('short_url', $code)->first();
        //dd($short_url);

        if ($short_url) {
            $short_url->increment('visits');
            return redirect()->to(url($short_url->original_url));
        }
        // return redirect()->to(url('/'));
    }
}
