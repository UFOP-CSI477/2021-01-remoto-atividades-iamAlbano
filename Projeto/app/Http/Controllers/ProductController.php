<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){

    $categoria = "Administrador";

    
    return view('tabs/produtos', [
    'categoria' => $categoria,
    'tab' => "produtos",
    'products' => $this->all_info(),
    'categories' => $this->all_categories()
    ]);

    
    
    }

    



    public function store(Request $request){

        if($this->count_products($request->name) > 0){
            return redirect('/produtos')->with('danger', 'Produto já cadastrado!');
        }

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->unit = $request->unit;
        $product->discount_value = $request->discount_value;
        $product->discount_unit = $request->discount_unit;
        $product->stock = $request->stock;
        $product->observations = $request->observations;

        if($request->category != 'NULL'){
            $product->category_id = $request->category;
        } else {
            $product->category_id = NULL;
        }
        
        $product->save();
        return redirect('/produtos')->with('msg', 'Produto cadastrado!');
             
    }

    private function get_category($category){
        $result = DB::table('categories')->where('name', $category)->first();
        return $result;
    }

    private function get_category_by_Id($category_id){
        $result = DB::table('categories')->where('id', $category_id)->first();
        return $result;
    }

    private function count_products($product_name){
        $result = Product::where([['name', 'like', $product_name]])->count();
        return $result;
    }

    

    private function all_info(){

        $products = DB::table('products')
        ->latest('products.updated_at')     
        ->get();

        return $products;
    }


    private function all_categories(){

        $categories = DB::table('categories')    
                    ->get();

        return $categories;
    }






    private function get_last_id(){
         $product = DB::getPdo('products')
                        ->lastInsertId();

        return $product;
    }  



    public function destroy($id){
        Product::findOrFail($id)->delete();
        return redirect('/produtos')->with('msg', 'Produto excluído com sucesso!');  
    }

    public function destroy_category($id){


        $products = DB::table('products')->where('category_id', $id)->get();

        foreach($products as $product){
            DB::table('products')
            ->where('products.id', $product->id)
            ->update(
            ['products.category_id' => NULL,
            ]);
        }

        Category::findOrFail($id)->delete();
        return redirect('/produtos')->with('msg', 'Categoria excluída com sucesso!');
       
    }

    public function update(Request $request){

        $product = Product::where('id', $request->id)->first();

        if($product->name != $request->name && $this->count_products($request->name) > 0){
            return redirect('/produtos')->with('danger', 'Produto já cadastrado!');
        }

        Product::findOrFail($request->id)->update(
            ['name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
            'discount_value' => $request->discount_value,
            'discount_unit' => $request->discount_unit,
            'stock' => $request->stock,
            'observations' => $request->observations,
            ]);

            if($request->category != 'NULL'){
                Product::findOrFail($request->id)->update(
                    ['category_id' => $request->category]);
            } else {
                Product::findOrFail($request->id)->update(
                    ['category_id' => NULL]);
            }

        return redirect('/produtos')->with('msg', 'Produto alterado com sucesso!');
        
    }

    public function update_categories(Request $request){

        $data = $request->except('_token');
    

        foreach($data as $category){

            DB::table('categories')
            ->updateOrInsert(
                ['name' => $category],
                ['name' => $category]
            );
        }

        return redirect('/produtos')->with('msg', 'Dados alterados com sucesso!');

        
    }


    public function table(){

        $search = filter_input(INPUT_GET, 'word', FILTER_SANITIZE_STRING);
        $categoria = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);
        $situation = filter_input(INPUT_GET, 'situation', FILTER_SANITIZE_STRING);

        if($search == "filter_off"){
            $products = DB::table('products')
                            ->latest('products.updated_at')
                            ->get();
        } else {
            $products = Product::where([['name', 'like', '%'.$search.'%']])
                                    ->latest('products.updated_at')
                                    ->get();
        }

        $html = " ";

        foreach($products as $product){

        if($product->category_id != NULL){
            $category = $this->get_category_by_Id($product->category_id)->name;
        } else {
            $category = 'Nenhuma';
        }

        
        if($search != "filter_off"){
            if($categoria != 'Categoria' && strcmp($category, $categoria))
                continue;
            if($situation == 'Esgotado' && $product->stock > 0)
                continue;
            if($situation == 'Baixo estoque' && $product->stock >= 10)
                continue;
        }
        


        $html .= "
        <tr>
        <td data-bs-toggle='modal' data-bs-target='#product-id-$product->id'>$product->id</td>
        <td data-bs-toggle='modal' data-bs-target='#product-id-$product->id'>$product->name</td>
        <td data-bs-toggle='modal' data-bs-target='#product-id-$product->id'>$category</td>
        <td data-bs-toggle='modal' data-bs-target='#product-id-$product->id'>R$$product->price</td>
        <td data-bs-toggle='modal' class='text-center' data-bs-target='#product-id-$product->id'>$product->stock</td>
        <td data-bs-toggle='modal' class='text-center' data-bs-target='#situations'>";

        if($product->stock == 0){

            $html .= "
            <svg style='fill: #dc3545' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-octagon-fill' viewBox='0 0 16 16'>
            <path d='M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z'/>
            </svg>";
        } else if($product->stock < 10){

            $html .= "
            <svg style='fill: #e09b04' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-exclamation-octagon-fill' viewBox='0 0 16 16'>
            <path d='M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
            </svg>";

        } else if($product->observations != NULL){
            
            $html .= "
            <svg style='fill: #0d6efd;' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-info-circle-fill' viewBox='0 0 16 16'>
            <path d='M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z'/>
            </svg>";


        }  else {
            $html .="
            <svg style='fill: #198754;' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'>
            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
            </svg>";
        }
        
        

        $html .= "</td>
        <td data-bs-toggle='modal' data-bs-target='#deletar-id-$product->id' class='text-center'>
        <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
        </svg></td>
        </tr>";
        }

        echo $html;
            
    }

    public function table_categories(){

        $search = filter_input(INPUT_GET, 'word', FILTER_SANITIZE_STRING);
       

        if($search == "filter_off"){
            $categories = DB::table('categories')
                        ->orderBy('name', 'asc')
                        ->get();
        } else {
            $categories = DB::table('categories')  
                                ->where([['name', 'like', '%'.$search.'%']])
                                ->orderBy('name', 'asc')
                                ->get();
        }

        $html = "";

        foreach($categories as $category){


        $html .= "
        <tr>
        <td>
        <div class='input-group mb-1'>
            <span class='input-group-text' id='basic-addon1'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-tag' viewBox='0 0 16 16'>
            <path d='M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z'/>
            <path d='M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z'/>
            </svg>
            </span>
            <input class='form-control' id='$category->name' name='$category->name' type='text' value='$category->name' placeholder='$category->name' readonly>
        </div>
        </td>";

        $html .= "</td>
        <td class='text-center'>
        <div class='form-checkbox'>

            <div>
                <button data-bs-toggle='modal' data-bs-target='#delete-category-$category->id'
                type='button' class='btn btn-outline-danger' id='delete-$category->id' name='delete-$category->id'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                </svg>
                </button>
            </div>       
        </div>
        </td>
        </tr>";
        }

        echo $html;
            
    }


}
