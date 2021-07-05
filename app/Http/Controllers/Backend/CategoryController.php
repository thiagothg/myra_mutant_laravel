<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Category::orderBy('des_category', 'ASC')->get();

        $list = $model->map(function($item) {
            return [
                'cod_category' => $item->cod_category,
                'des_category' => $item->des_category,
                'flg_active' => $item->flg_active == env('FLG_ACTIVE') ? trans('labels.yes') : trans('labels.no'),
                'created_at' => Carbon::parse($item->create_at)->format('d/m/Y h:i:s'),
                'acao' => view('layouts.grid_buttons', [
                    'code' => $item->cod_category,
                    'description' => $item->des_category,
                    'route_get_item' => route('ajaxCategory.edit', [
                        'ajaxCategory' => Crypt::encryptString($item->cod_category)
                    ]),
                    'route_edit' => route('ajaxCategory.update', [
                        'ajaxCategory' => Crypt::encryptString($item->cod_category)
                    ]),
                    'route_delete' => route('ajaxCategory.destroy', [
                        'ajaxCategory' => Crypt::encryptString($item->cod_category)
                    ]),
                ])->render(),
            ];
        });

        return response([
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $model = new Category();
        $model->fill($request->all());
        $model->save();

        Session::flash('success', ('Category created.')); 
        
        return response()->json([
            'success'=> true, 
            'message' => 'Category created.',
            'url' => route('category.index')
        ]);
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
        $model = Category::findOrFail(Crypt::decryptString($id));
        
        return response()->json([
            'success'=> true, 
            'message' => 'Category found.',
            'data' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $model = Category::findOrFail(Crypt::decryptString($id));

        $model->fill($request->all());
        $model->update();

        Session::flash('success', ('Category update success.')); 
        
        return response()->json([
            'success'=> true, 
            'message' => 'Category update success.',
            'url' => route('category.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {
            $model = Category::findOrFail(Crypt::decryptString($id));
            $model->delete();

            return response([
                'success' => true,
                'message' => 'Registro excluído com sucesso',
            ]);
        }
        catch(Exception $e)
        {
            return response([
                'success' => false,
                'message' => 'Não foi possivel',
            ]); 
        }
    }


    /**
     * Get Category active.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxGetCategory(Request $request)
    {
        
        try {
            $model = Category::orderBy('des_category', 'ASC')
                ->where(function($query)  use ($request) {
                    if($request->has('search')) {
                        $query->where('des_category', 'like', '%'. $request->input('search') . '%');
                    }
                })
                ->where('flg_active', env('FLG_ACTIVE'))
                ->limit(50)
                ->get();

            $list = $model->map(function($item) {
                return [
                    'id' => $item->cod_category,
                    'text' => $item->des_category
                ];
            });

            return response()->json([
                'success' => true,
                'message' => 'Sucesso.',
                'results' => $list
            ]);
        }
        catch(Exception $e)
        {
            return response([
                'success' => false,
                'message' => $e->getMessage(),
                'results' => []
            ]); 
        }
    }
}
