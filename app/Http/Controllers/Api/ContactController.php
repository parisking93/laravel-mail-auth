<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request) {

        $data = $request->all();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        // controllo se tutto fila liscio o no 
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        } else {
                    // creo una nuova istanza e la riempo con i dati che ha passato il cliente 
            $new_lead = new Lead();
            $new_lead->fill($data);
            $new_lead->save();

            // serve per inviare la mail
            Mail::to('info.admin@boolpress.com')->send(new SendNewMail($new_lead));

            return response()->json([
                'success' => true 
            ]); 
        }

    
    }

}
