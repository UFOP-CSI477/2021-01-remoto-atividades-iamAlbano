<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Request as R;

class RequestController extends Controller
{
    public function index(){
        $requests = DB::table('requests')->orderBy('date', 'asc')->get();
        return view('requests.index', ['requests' => $requests]);
    }

    public function store(Request $request){

        DB::table('requests')->insert(
            ['person' => $request->pessoa,
            'subject_id' => $request->subject,
            'description' => $request->descricao,
            'user_id' =>    1,
            'date' => $request->data],
        );
        return redirect('/requests')->with('success', 'Protocolo cadastrado com sucesso!');
    }

    public function edit($id){

        $request = DB::table('requests')->where('id', '=', $id)->get();
        $subjects = DB::table('subjects')->orderBy('name', 'asc')->get();
        return view('requests.edita', ['subjects' => $subjects, 'request' => $request[0]]);

    }

    public function update($id, Request $request){

        DB::table('requests')->updateOrInsert(
            ['id' => $id],
            ['person' => $request->pessoa,
            'subject_id' => $request->subject,
            'description' => $request->descricao,
            'date' => $request->data],
        );

        return redirect('/requests')->with('success', 'Protocolo alterado com sucesso!');
    }

    public function destroy($id){

        DB::table('requests')->where('id', $id)->delete();
        return redirect('/requests')->with('success', 'Protocolo excluído com sucesso!');
    }


    public function table(){

        $search = filter_input(INPUT_GET, 'word', FILTER_SANITIZE_STRING);

        if(strlen($search) < 2){
            $requests = DB::table('requests')->orderBy('date', 'asc')->get();
        } else {
            $requests = R::where([['person', 'like', '%'.$search.'%']])->get();
        }


        $html = " ";

        foreach($requests as $request){

            $subject = Subject::find($request->subject_id)->name;

            $html .= '
            <tr class="align-middle">
            <td class="text-center">'.$request->id.'</td>';
            $html .= '<td>'.
            $subject
            .'</td>';

            $html .=
            '<td>'.$request->person.'</td>
            <td>'.$request->description.'</td>
            <td>'.date('d/m/Y', strtotime($request->date)).'</td>

            <td class="text-center">
                <a class="btn" href="/requests/edit/'.$request->id.'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                </a>
            </td>

            <td class="text-center">
                <button class="btn " data-bs-toggle="modal"';

                $html .='data-bs-target="#delete-'.$request->id;
                    
                $html .= ' ">
                    <svg fill="#dc3545" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </td>  

            </tr>';

        }

        echo $html;
    }
}
