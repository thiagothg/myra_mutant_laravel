<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Product::orderBy('des_product', 'ASC')->get();

        $list = $model->map(function($item) {
    
            return [
                'cod_product' => $item->cod_product,
                'des_product' => $item->des_product,
                'qtd_storage' => $item->qtd_storage,
                'qtd_price'   => $item->qtd_price,
                'cod_category' => $item->category->des_category,
                'flg_active' => $item->flg_active == env('FLG_ACTIVE') ? trans('labels.yes') : trans('labels.no'),
                'created_at' => Carbon::parse($item->create_at)->format('d/m/Y h:i:s'),
                'acao' => view('layouts.grid_buttons', [
                    'code' => $item->cod_product,
                    'description' => $item->des_product,
                    'route_edit' => route('ajaxProduct.update', ['ajaxProduct' => Crypt::encryptString($item->cod_product)]),
                    'route_delete' => route('ajaxProduct.destroy', ['ajaxProduct' => Crypt::encryptString($item->cod_product)]),
                    'route_get_item' => route('ajaxProduct.edit', [
                        'ajaxProduct' => Crypt::encryptString($item->cod_product)
                    ]),
                ])->render(),
            ];
        });

        return response()->json([
            'success'=> true, 
            'message' => 'Search success.',
            'data' => $list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try 
        {
            $model = new Product();
            $model->fill($request->all());
            
            $model->save();
    
            Session::flash('success', ('Product created.')); 
            
            return response()->json([
                'success'=> true, 
                'message' => 'Product created.',
            ]);
        }
        catch(Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try 
        {
            $model = Product::findOrFail(Crypt::decryptString($id))
                ->with('category')
                ->get()
                ->first();

            return response()->json([
                'success'=> true, 
                'message' => 'Product found.',
                'data' => $model
            ]);
        }
        catch(Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]); 
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProductRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try 
        {
            $model = Product::findOrFail(Crypt::decryptString($id));

            $model->fill($request->all());
            $model->update();

            Session::flash('success', ('Product update success.')); 
            
            return response()->json([
                'success'=> true, 
                'message' => 'Product update success.',
            ]);
        }
        catch(Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try 
        {
            $model = Product::findOrFail(Crypt::decryptString($id));
            $model->delete();

            return response()->json([
                'success' => true,
                'message' => 'Registro excluído com sucesso',
            ]);
        }
        catch(Exception $e)
        {
            return response()->json([
                'success' => false,
                'message' => 'Não foi possivel',
            ]); 
        }
    }
}
