<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Person;
use App\Models\Address;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $id = $this->create_person($input);

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }

    private function create_person($input){

        $person = new Person;
        $person->name = $input['name'];
        $person->category = "Administrador";
        $person->type = "Física";
        
        $person->save();

        $id_person = $this->get_last_id();

        $contact = new Contact;
        $contact->person_id = $id_person;
        $person->email = $input['email'];
        $contact->save();

        $address = new Address;
        $address->person_id = $id_person;
        $address->save();

        return $id_person;

    }

    private function get_last_id(){
        $user = DB::getPdo('people')
                       ->lastInsertId();

       return $user;
   } 
}
