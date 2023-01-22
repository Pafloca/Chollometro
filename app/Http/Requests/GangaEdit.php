<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class GangaEdit extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required',
            'pagina' => 'required',
            'precioActual' => 'required|numeric|min:0',
            'precioAntiguo' => 'required|numeric|min:0'
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El título es obligatorio',
            'descripcion.required' => 'La descripcion es obligatoria',
            'categoria.required' => 'La categoria es obligatoria',
            'pagina.required' => 'La pagina es obligatoria',
            'precioActual.required' => 'El precio es obligatorio',
            'precioAntiguo.required' => 'El precio es obligatorio',
            'archivo.required' => 'La imagen es obligatoria',
            'precioActual.numeric' => 'Tienes que poner un numero',
            'precioAntiguo.numeric' => 'Tienes que poner un numero',
            'precioAntiguo.min' => 'No puedes poner un numero negativo',
            'precioActual.min' => 'No puedes poner un numero negativo'
        ];
    }
}
