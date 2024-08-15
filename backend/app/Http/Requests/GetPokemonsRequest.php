<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetPokemonsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'offset' => 'nullable|integer',
            'limit' => 'nullable|integer',
        ];
    }

    public function getOffset(): int
    {
        return $this->integer('offset', 0);
    }


    public function getLimit(): int
    {
        return $this->integer('limit', 0);
    }
}
