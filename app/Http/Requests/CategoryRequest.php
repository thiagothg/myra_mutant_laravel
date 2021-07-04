<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;


class CategoryRequest extends FormRequest {

    public function authorize() 
    {
        return true;
    }


    public function rules() 
    {
        return [
            'des_category' => 'required|unique:tb_cad_category|max:150',
            'body' => 'max:1',
        ];
    }
}