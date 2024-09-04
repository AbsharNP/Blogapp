<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function switch($lang)
    {
        
        $availableLocales = ['en', 'fr'];
        if (in_array($lang, $availableLocales)) {
            App::setLocale($lang);
        
            Session::put('locale', $lang);
        }
        
        return redirect()->back();
    }
}
