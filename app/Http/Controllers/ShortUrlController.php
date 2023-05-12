<?php

namespace App\Http\Controllers;

use App\Traits\SuccessOrFail;
use AshAllenDesign\ShortURL\Facades\ShortURL;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use \AshAllenDesign\ShortURL\Classes\Builder;
use Exception;
use Illuminate\Support\Facades\Auth;


class ShortUrlController extends Controller
{
    use SuccessOrFail;

    public function index(Request $request)
    {

        $validator = Validator::make($request->all(), ['url' => ['required', 'url']]);
        if ($validator->fails()) {
            return $this->kFailed($validator->errors()->first());
        }

        $url = $request->input('url');

        $builder = new Builder();
        $shortURLObject = $builder->destinationUrl($url)->make();
        $shortURL = $shortURLObject->default_short_url;

        return $this->kSuccess("Short URL generated successfully", $shortURL);
    }
}
