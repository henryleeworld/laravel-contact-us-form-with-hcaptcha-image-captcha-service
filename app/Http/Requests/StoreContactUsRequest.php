<?php

namespace App\Http\Requests;

use App\Rules\ValidHCaptcha;
use Illuminate\Foundation\Http\FormRequest;

class StoreContactUsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'                 => 'required',
            'email'                => 'required|email',
            'phone'                => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'              =>'required',
            'note'                 => 'required',
            'h-captcha-response'   => ['required', new ValidHCaptcha()]
        ];
    }
}
