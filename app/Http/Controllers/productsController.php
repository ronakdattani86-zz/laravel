<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\productRequest;
class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = storage_path('database.json');        
        $datas = "[" .  rtrim(file_get_contents($db), ',') . "]";
        $datas=  json_decode($datas);

       return  \View::make('products.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productRequest $request)
    {
                $product =  [
			'name' => $request->input('name'),
			'quantity' => $request->input('qty'),
			'price' => $request->input('price'),
			'total_value' => $request->input('qty') * $request->input('price'),
			'created_at' => (string)Carbon::now()
		];
                //dd($product);
		
		$db = storage_path('database.json');
		file_put_contents($db, json_encode($product) . ',', FILE_APPEND);
		$content = "[" .  rtrim(file_get_contents($db), ',') . "]";
		//return response()->json( $content);
                return redirect()->route('products.index');
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
