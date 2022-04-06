<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;
use App\Http\Controllers\API\V1\BaseController as BaseController;
use Validator;

class LanguageController extends BaseController
{
    //translated string response method.
    //inputs: translate lang,translate string  
    //return type : json
    public function getTranslatedWord(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "lang" => "required",
            "string" => "required"            
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(),422);       
        }     

        $tr = new GoogleTranslate($request->lang);
        $success['translated_string'] = $tr->translate($request->string);

        return $this->sendResponse($success, 'Translated Data.',200);

    }
}
