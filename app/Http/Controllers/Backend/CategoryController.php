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
                    'route_edit' => route('category.edit', ['category' => Crypt::encryptString($item->cod_category)]),
                    'route_delete' => route('ajaxCategory.destroy', ['ajaxCategory' => Crypt::encryptString($item->cod_category)]),
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
