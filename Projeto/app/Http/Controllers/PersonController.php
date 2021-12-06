<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Person;
use App\Models\Address;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use App\Models\Buy;

class PersonController extends Controller
{
    public function index(){

    $categoria = "Administrador";

    
    return view('tabs/pessoas', [
    'categoria' => $categoria,
    'tab' => "pessoas",
    'people' => $this->all_info(),
    ]);

    }


    public function table(){

        $search = filter_input(INPUT_GET, 'word', FILTER_SANITIZE_STRING);
        $category = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);
        $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
        $blacklist = filter_input(INPUT_GET, 'blacklist', FILTER_SANITIZE_STRING);

        if($search == "filter_off"){
            $person = DB::table('people')->latest('people.updated_at')
                        ->join('contacts', function ($join) {
                        $join->on('people.id', '=', 'contacts.person_id'); })
                        ->get();
        } else {
            $person = Person::where([['name', 'like', '%'.$search.'%']])
                            ->orWhere([['fantasy_name', 'like', '%'.$search.'%']])
                            ->join('contacts', function ($join) {
                                $join->on('people.id', '=', 'contacts.person_id'); })
                            ->latest('people.updated_at')
                            ->get();
        }

        $html = " ";

        foreach($person as $pessoa){

        if($search != "filter_off"){

            if($category != 'Categoria' && $pessoa->category != $category)
                continue;
            if($type != 'Tipo' && $pessoa->type != $type)
                continue;
            if($blacklist != 'false' && $pessoa->blacklist != true)
                continue;
        }

        
           

        $html .= "
        <tr>
        <td data-bs-toggle='modal' data-bs-target='#pessoa-id-$pessoa->id'>$pessoa->id</td>
        <td data-bs-toggle='modal' data-bs-target='#pessoa-id-$pessoa->id'>$pessoa->name</td>
        <td data-bs-toggle='modal' data-bs-target='#pessoa-id-$pessoa->id'>$pessoa->smartphone</td>
        <td data-bs-toggle='modal' data-bs-target='#pessoa-id-$pessoa->id'>$pessoa->category</td>
        <td data-bs-toggle='modal' data-bs-target='#pessoa-id-$pessoa->id'>$pessoa->type</td>
        <td data-bs-toggle='modal' class='text-center' data-bs-target='#situations'>";

        if($pessoa->blacklist == 1){

            $html .= "
            <svg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='currentColor' class='bi bi-file-earmark-person-fill' viewBox='0 0 16 16'>
            <path d='M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0zm2 5.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12s5 1.755 5 1.755z'/>
            </svg>";
        } else if($pessoa->observations != NULL){
            
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
        <td data-bs-toggle='modal'";
        
        if($this->count_buys_by_Supplier($pessoa->id) > 0){
            $html .= "data-bs-target='#cant-delete'";
        } else {
            $html .= "data-bs-target='#deletar-id-$pessoa->id'";
        }
        
        $html .="class='text-center'>
        <svg  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
        <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
        </svg></td>
        </tr>";
        }

        echo $html;
        
        
    }



    public function store(Request $request){

        if($this->count_email($request->email) > 0){
            return redirect('/pessoas')->with('danger', 'E-mail já cadastrado!');
        } 

        if($this->count_cpf_cnpj($request->cpf_cnpj) > 0){
            return redirect('/pessoas')->with('danger', 'CPF inválido! Usuário já cadastrado!');
        }

        if($request->rg != NULL){
        if($this->count_rg($request->rg) > 0){
            return redirect('/pessoas')->with('danger', 'RG inválido! Usuário já cadastrado!');
        }}
        
        
        $this->store_person($request);
        $id = $this->get_last_id();
        $this->store_contact($request, $id);
        $this->store_address($request, $id);

        if($request->category == "Administrador" || $request->category == "Vendedor"){
            $this->store_user($request, $id);
            return redirect('/pessoas')->with('msg', 'Usuário cadastrado com sucesso! Verifique o email');
        } else {
            return redirect('/pessoas')->with('msg', 'Pessoa cadastrada com sucesso!');
        }

    }

    private function count_email($email){
        $result = Contact::where([['email', 'like', $email]])->count();
        return $result;
    }

    private function count_cpf_cnpj($cpf_cnpj){
        $result = Person::where([['cpf_cnpj', 'like', $cpf_cnpj]])->count();
        return $result;
    }

    private function count_buys_by_Supplier($id){
        $result = Buy::where([['person_id', 'like', $id]])->count();
        return $result;
    }

    private function count_rg($rg){
        $result = Person::where([['rg', 'like', $rg]])->count();
        return $result;
    }




    private function all_info(){

        $person = DB::table('people')
        ->latest('people.updated_at')
        ->join('contacts', function ($join) {
            $join->on('people.id', '=', 'contacts.person_id'); })
        ->join('addresses', function ($join) {
            $join->on('people.id', '=', 'addresses.person_id');})
              
        ->get();

        return $person;
    }

    private function get_last_id(){
         $user = DB::getPdo('people')
                        ->lastInsertId();

        return $user;
    }  

    private function store_user(Request $request, $id_person){
        $user = new User;
        $user->person_id = $id_person;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make("artcopias123");
        $user->save();
    }


    private function store_person(Request $request){

        $person = new Person;
        $person->name = $request->name;
        $person->fantasy_name = $request->fantasy_name;
        $person->category = $request->category;
        $person->type = $request->type;
        $person->blacklist = $request->blacklist;
        $person->cpf_cnpj = $request->cpf_cnpj;
        $person->rg = $request->rg;
        $person->observations = $request->observations;
        $person->save();
    }

    private function store_contact(Request $request, $id_person){

        $contact = new Contact;
        $contact->person_id = $id_person;
        $contact->email = $request->email;
        $contact->telephone = $request->telephone;
        $contact->smartphone = $request->smartphone;
        $contact->save();
    }

    private function store_address(Request $request, $id_person){

        $address = new Address;
        $address->person_id = $id_person;
        $address->cep = $request->cep;
        $address->number = $request->number;
        $address->street = $request->street;
        $address->neighborhood = $request->neighborhood;
        $address->city = $request->city;
        $address->uf = $request->uf;
        $address->complement = $request->complement;
        $address->save();
    }


    public function destroy($id){

        DB::table('contacts')->where('person_id', $id)->delete();
        DB::table('addresses')->where('person_id', $id)->delete();
        DB::table('users')->where('person_id', $id)->delete();
        Person::findOrFail($id)->delete();
        return redirect('/pessoas')->with('msg', 'Usuário excluído com sucesso!');
    }

    public function update(Request $request){

        $person = Person::where('id', $request->id)->first();
        
        $contact = Contact::where('person_id', $request->id)->first();

        if($contact->email != $request->email && $this->count_email($request->email) > 0){
            return redirect('/pessoas')->with('danger', 'E-mail já cadastrado!');
        } 

        if($person->cpf_cnpj != $request->cpf_cnpj && $this->count_cpf_cnpj($request->cpf_cnpj) > 0){
            if($person->type == 'Física'){
                return redirect('/pessoas')->with('danger', 'CPF já cadastrado!');
            } else {
                return redirect('/pessoas')->with('danger', 'CNPJ já cadastrado!');
            }
        }

        if($request->rg != NULL){
        if($person->rg != $request->rg && $this->count_rg($request->rg) > 0){
            return redirect('/pessoas')->with('danger', 'RG já cadastrado!');
        }}

        Person::findOrFail($request->id)->update(
            ['name' => $request->name,
            'fantasy_name' => $request->fantasy_name,
            'type' => $request->type_update,
            'blacklist' => $request->blacklist,
            'cpf_cnpj' => $request->cpf_cnpj,
            'rg' => $request->rg,
            'observations' => $request->observations,
            ]);

            if($request->category == "Administrador" || $request->category == "Vendedor"){
                DB::table('users')
                ->where('users.person_id', $request->id)
                ->update(
                ['users.name' => $request->name,
                 'users.email' => $request->email,
                ]);
            }

            DB::table('contacts')
            ->where('contacts.person_id', $request->id)
            ->update(
            ['contacts.email' => $request->email,
             'contacts.telephone' => $request->telephone,
             'contacts.smartphone' => $request->smartphone,
            ]);

            DB::table('addresses')
            ->where('addresses.person_id', $request->id)
            ->update(
            ['addresses.cep' => $request->cep,
            'addresses.number' => $request->number,
            'addresses.street' => $request->street,
            'addresses.neighborhood' => $request->neighborhood,
            'addresses.city' => $request->city,
            'addresses.uf' => $request->uf,
            'addresses.complement' => $request->complement,
            ]);



        return redirect('/pessoas')->with('msg', 'Dados alterados com sucesso!');
        
    }


}
