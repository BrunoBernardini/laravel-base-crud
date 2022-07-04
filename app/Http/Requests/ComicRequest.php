<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "title" => "required|max:100|min:3",
            "image" => "required|max:255",
            "type" => "required|max:100|min:3",
            "description" => "min:10"
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Il campo Titolo è obbligatorio!",
            "title.max" => "Il titolo non può superare i :max caratteri!",
            "title.min" => "Il titolo non può essere più corto di :min caratteri!",
            "image.required" => "Il campo URL Immagine è obbligatorio!",
            "image.max" => "L'URL Immagine non può superare i :max caratteri!",
            "type.required" => "Il campo Tipo è obbligatorio!",
            "type.max" => "Il tipo non può superare i :max caratteri!",
            "type.min" => "Il tipo non può essere più corto di :min caratteri!",
            "description.min" => "La descrizione deve avere almeno :min caratteri!"
        ];
    }
}
