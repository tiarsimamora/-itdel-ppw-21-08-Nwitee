<?php

namespace App\Http\Requests;

use App\Contracts\likeable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class LikeRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('like', $this->likeable());
    }

    public function rules()
    {
        return [
            // the class of the liked object
            'likeable_type' => [
                "bail",
                "required",
                "string",
                function ($attribute, $value, $fail) {
                    if (! class_exists($value, true)) {
                        $fail($value . " is not an existing class");
                    }

                    if (! in_array(Model::class, class_parents($value))) {
                        $fail($value . " is not Illuminate\Database\Eloquent\Model");
                    }

                    if (! in_array(likeable::class, class_implements($value))) {
                        $fail($value . " is not App\Contracts\Likeable");
                    }
                },
            ],

            // the id of the liked object
            'id' => [
                "required",
                function ($attribute, $value, $fail) {
                    $class = $this->input('likeable_type');

                    if (! $class::where('id', $value)->exists()) {
                        $fail($value . " does not exists in database");
                    }
                },
            ],
        ];
    }

    public function likeable(): likeable
    {
        $class = $this->input('likeable_type');

        return $class::findOrFail($this->input('id'));
    }
}