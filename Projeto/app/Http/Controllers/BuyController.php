<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Buy;
use App\Models\Input;

class BuyController extends Controller
{
    public function index(){

    $categoria = "Administrador";

    
    return view('tabs/compras', [
    'categoria' => $categoria,
    'tab' => "compras",
    'buys' => $this->all_info(),
    'people' => $this->all_people(),
    'products' => $this->all_products(),
    'inputs' => $this->all_inputs(),
    'buy_inputs' => $this->all_buy_inputs(),
    ]);
  
    }

    public function store(Request $request){

        $input = $request->except('_token');

        $buy = new Buy;
        $buy->person_id = $request->supplier;
        $buy->date = $request->date;
        $buy->delivery = $request->delivery;
        $buy->discount = $request->discount;
        $buy->situation = $request->situation;
        $buy->observations = $request->observations;
        $buy->price = $request->price;
        $buy->save();

        for ($i=0; $i < sizeof($input["input"]["nome"]); $i++) { 



            DB::table('inputs')
            ->updateOrInsert(
                ['name' => $input["input"]["nome"][$i]],
                ['name' => $input["input"]["nome"][$i],
                 'product_id' => 
                 $this->get_product_by_name($input["input"]["nome"][$i]) != NULL ? $this->get_product_by_name($input["input"]["nome"][$i])->id : NULL,
                 'unit' => $input["input"]["unit"][$i],
                 ]
            );

            DB::table('buy_input')
            ->insert([
                'buy_id' => $buy->id,
                'input_id' => $this->get_input_by_name($input["input"]["nome"][$i]) != NULL ? $this->get_input_by_name($input["input"]["nome"][$i])->id : NULL,
                'quantity' => $input["input"]["quantidade"][$i],
                'unit_price' => $input["input"]["valor-unidade"][$i],
                'total_price' => $input["input"]["valor-total"][$i],
                ]);
        }

        return redirect('/compras')->with('msg', 'Compra cadastrada com sucesso!');
    }


    public function update(Request $request){

        Buy::findOrFail($request->id)->update(
            ['date' => $request->date,
            'delivery' => $request->delivery,
            'situation' => $request->situation,
            'observations' => $request->observations,
            ]);

            return redirect('/compras')->with('msg', 'Compra alterada com sucesso!');
    }

    public function destroy($id){
        DB::table('buy_input')->where('buy_id', $id)->delete();
        DB::table('buys')->where('id', $id)->delete();
        return redirect('/compras')->with('msg', 'Compra excluída com sucesso!');
    }
    

    private function all_info(){

        $buys = DB::table('buys')
        ->latest('buys.updated_at')     
        ->get();

        return $buys;
    }

    private function all_people(){

        $person = DB::table('people')
        ->latest('people.updated_at')
        ->join('contacts', function ($join) {
            $join->on('people.id', '=', 'contacts.person_id'); })
        ->join('addresses', function ($join) {
            $join->on('people.id', '=', 'addresses.person_id');})
              
        ->get();

        return $person;
    }

    private function all_products(){

        $products = DB::table('products')
        ->latest('products.updated_at')     
        ->get();

        return $products;
    }

    private function all_inputs(){
        $inputs = DB::table('inputs')    
        ->get();

        return $inputs;
    }

    private function all_buy_inputs(){
        $buy_inputs = DB::table('buy_input')   
        ->get();

        return $buy_inputs;
    }

    private function get_supplier_by_Id($supplier_id){
        $result = DB::table('people')->where('id', $supplier_id)->first();
        return $result;
    }

    private function get_contact_by_Person_id($person_id){
        $result = DB::table('contacts')->where('person_id', $person_id)->first();
        return $result;
    }

    private function get_input_by_name($input){
        $result = DB::table('inputs')->where('name', $input)->first();
        return $result;
    }

    private function get_product_by_name($product){
        $result = DB::table('products')->where('name', $product)->first();
        return $result;
    }

    

















    public function table(){

        $search = filter_input(INPUT_GET, 'word', FILTER_SANITIZE_STRING);
        $situation = filter_input(INPUT_GET, 'situation', FILTER_SANITIZE_STRING);

        if($search == "filter_off"){
            $buys = DB::table('buys')
                            ->latest('buys.updated_at')
                            ->get();
        } else {
            $buys = Buy::where([['id', 'like', '%'.$search.'%']])
                                    ->latest('buys.updated_at')
                                    ->get();
        }

        $html = " ";

        foreach($buys as $buy){

            if($search != "filter_off"){

                if($situation != 'Situação' && $buy->situation != $situation)
                    continue;
                
            }

        
        $supplier = $this->get_supplier_by_Id($buy->person_id);
        $contact = $this->get_contact_by_Person_id($supplier->id);


        $html .= "
        <tr>
        <td data-bs-toggle='modal' data-bs-target='#buy-id-$buy->id'>$buy->id</td>
        <td data-bs-toggle='modal' data-bs-target='#buy-id-$buy->id'>$supplier->name</td>
        <td data-bs-toggle='modal' data-bs-target='#buy-id-$buy->id'>$contact->smartphone</td>
        <td data-bs-toggle='modal' data-bs-target='#buy-id-$buy->id'>";
        $html .= date('d/m/Y', strtotime($buy->date));

        $html .= "<td data-bs-toggle='modal' data-bs-target='#buy-id-$buy->id'>";
        $html .= date('d/m/Y', strtotime($buy->delivery));


        $html .= "</td>
        <td data-bs-toggle='modal' data-bs-target='#buy-id-$buy->id'>R$ $buy->price</td>
        <td data-bs-toggle='modal' class='text-center' data-bs-target='#buy-situations'>";

        
        if($buy->situation == "Aguardando entrega"){

            if( strtotime(date('Y-m-d')) > strtotime($buy->delivery) ){
                $color = "#ffc107"; //Amarelo
            } else {       
                $color = "#0d6efd"; //Azul
            }
            $html .= "
            <svg aria-hidden='true' width='19' height='19' focusable='false' data-prefix='fas' data-icon='truck' 
            class='svg-inline--fa fa-truck' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'>
            <path fill='".$color."' 
            d='M368 0C394.5 0 416 21.49 416 48V96H466.7C483.7 96 499.1 102.7 512 114.7L589.3 192C601.3 204 608 220.3 608 237.3V352C625.7 352 640 366.3 640 384C640 401.7 625.7 416 608 416H576C576 469 533 512 480 512C426.1 512 384 469 384 416H256C256 469 213 512 160 512C106.1 512 64 469 64 416H48C21.49 416 0 394.5 0 368V48C0 21.49 21.49 0 48 0H368zM416 160V256H544V237.3L466.7 160H416zM160 368C133.5 368 112 389.5 112 416C112 442.5 133.5 464 160 464C186.5 464 208 442.5 208 416C208 389.5 186.5 368 160 368zM480 464C506.5 464 528 442.5 528 416C528 389.5 506.5 368 480 368C453.5 368 432 389.5 432 416C432 442.5 453.5 464 480 464z'>
            </path></svg>";

        } else if($buy->situation == "Emitida"){
            $html .= "
            <svg xmlns='http://www.w3.org/2000/svg' width='19' height='19' fill='currentColor' class='bi bi-clipboard-check' viewBox='0 0 16 16'>
            <path fill-rule='evenodd' d='M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z'/>
            <path d='M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z'/>
            <path d='M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z'/>
            </svg>";
        } else if($buy->situation == "Cancelada"){

            $html .= "
            <svg style='fill: #dc3545;' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-circle-fill' viewBox='0 0 16 16'>
            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z'/>
            </svg>";

        } else {
            $html .= "
            <svg style='fill: #198754;' xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-circle-fill' viewBox='0 0 16 16'>
            <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>
            </svg>";
        }


        $html .= "</td>
        <td data-bs-toggle='modal' data-bs-target='#deletar-id-$buy->id' class='text-center'>
        <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
        </svg></td>
        </tr>";

        
    }
    
    echo $html;
   

}

public function table_inputs(){

    $search = filter_input(INPUT_GET, 'word', FILTER_SANITIZE_STRING);

    if($search == "filter_off"){
        $inputs = DB::table('inputs')
                    ->get();
    } else {
        $inputs = Input::where([['name', 'like', '%'.$search.'%']])      
                    ->get();
    }

    $html = " ";

    foreach($inputs as $input){


    $html .= "
    <tr>
    <td data-bs-toggle='modal' data-bs-target='#input-id-$input->id'>$input->id</td>
    <td data-bs-toggle='modal' data-bs-target='#input-id-$input->id'>$input->name</td>
    <td data-bs-toggle='modal' data-bs-target='#input-id-$input->id'>$input->unit</td>";

    $html .= "</td>
    <td data-bs-toggle='modal' data-bs-target='#deletar-id-$input->id' class='text-center'>
    <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
    <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
    </svg></td>
    </tr>";

    
}

echo $html;


}


}
