<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::get();
        return response()->json(compact('contacts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $contact = Contact::find($id);
        return response()->json(compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|string|min:5',
            'email' => 'required|email|unique:contacts|string|min:6|max:100',
            'phone' => 'required|string|min:8',
            'post'  => 'required|string|min:1|max:255',
        ]);

        if($validator->fails()){
            $error = $validator->errors();
            return response()->json(compact('error'), 400);
        }

        $data = $request->all();

        $contact = Contact::create($data);

        return response()->json(
            compact('contact')
        );
    }

    
}
