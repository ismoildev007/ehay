<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function setLocale($lang)
    {
        if (in_array($lang, ['uz', 'ru', 'en'])) {
            Session::put('locale', $lang);
        }
        return redirect()->back(); // foydalanuvchini o‘sha sahifaga qaytaradi
    }
}
