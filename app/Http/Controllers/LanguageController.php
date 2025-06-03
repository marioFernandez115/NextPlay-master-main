<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function change(Request $request)
    {
        $lang = $request->get('lang', 'es');
        if (in_array($lang, ['es', 'en', 'pt'])) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }
        return Redirect::back();
    }
}
