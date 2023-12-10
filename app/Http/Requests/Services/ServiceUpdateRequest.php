<?php

namespace App\Http\Requests\Services;

use App\Helpers\ResponseHelper;
use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateRequest extends FormRequest
{
    use ResponseHelper;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (isset($this->name)) {
            return [
                'name' => 'required|min:3|max:150|unique:services,name,' . $this->id,
            ];
        }
        return [
            'description' => 'nullable|min:3|max:300',
        ];

    }

}
