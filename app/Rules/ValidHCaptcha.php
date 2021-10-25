<?php

namespace App\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class ValidHCaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://hcaptcha.com',
        ]);
        $response = $client->request('POST', '/siteverify', [
            'form_params' => [
                'secret'   => config('services.hcaptcha.secret'),
                'response' => $value
            ]
        ]);
        $responseBody = $response->getBody();
        $body = json_decode($responseBody);
        if($body->success) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.hcaptcha');
    }
}
