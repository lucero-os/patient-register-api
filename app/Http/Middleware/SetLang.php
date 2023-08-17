<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use App\Models\Language;

class SetLang
{
    public function handle($request, Closure $next)
    {
        $language = $request->header('Accept-Language');
        
        if ($language) {
            $language = strtolower($language);
            //Get app available languages
            $languageCodes = Language::all()->lists('language_code'); // ['es', 'pt', 'en']
            // Set the application's locale, if valid
            if(in_array($language, $languageCodes)) App::setLocale($language);
        }

        return $next($request);
    }
}
