<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Mail\CarMail;
use App\Mail\ContactMail;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{


    public function index(ContactStoreRequest $request)
    {
        $request_data = $request->validated();
        Mail::to('allan.bernier1@gmail.com')
            ->queue(
                new ContactMail(
                    $request_data['name'],
                    $request_data['email'],
                    $request_data['message'])
            );
        return 'email sent';
    }

    public function cars(ContactStoreRequest $request)
    {
        $request_data = $request->validated();
        Mail::to($request_data['email'])
            ->queue(
                new CarMail(
                    $request_data['name'],
                    Brand::all()
                )
            );
        return 'email sent';
    }
}
