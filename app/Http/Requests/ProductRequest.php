<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest {

    public function authorize() 
    {
        return true;
    }


    public function rules(Request $request) 
    {
        // $data = $request->all();
        return [
            'des_product'   => [
                'required',
                'max:150',
                Rule::unique('tb_cad_product'),
            ],
            'qtd_storage'   => 'required|max:20',
            'qtd_price'     => 'required|max:20',
            'cod_category'  => 'required',
        ];
    }
}