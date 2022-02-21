<?php

namespace App\Http\likerequests;

use Illuminate\Foundation\Http\FormRequest;

class unlikerequest extends likerequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('unlike', $this->likeable());
    }

}
