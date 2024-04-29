<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoxCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'entities' => 'required|array',
            'entities.*.id' => 'required|uuid',
            'entities.*.type' => 'required|string',

            'recipients' => 'required|array',
            'recipients.*.id' => 'required|uuid',
        ];
    }
}
