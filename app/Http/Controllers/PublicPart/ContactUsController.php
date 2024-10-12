<?php

namespace App\Http\Controllers\PublicPart;

use App\Http\Controllers\Controller;
use App\Mail\ContactUs\SendUsMessage;
use App\Traits\Http\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactUsController extends Controller{
    use ResponseTrait;
    protected string $_path = 'public-part.app.pages.contact-us.';
    protected string $_base_email = 'firmcozy@gmail.com';

    public function index(): View{
        return view($this->_path . 'contact-us', [
            'white' => true
        ]);
    }

    public function sendUsMessage(Request $request): JsonResponse{
        try{
            Mail::to($request->email)->send(new SendUsMessage('Kopija - Kontakt forma', 'No-Reply', $this->_base_email, $request->name, $request->email, $request->phone, $request->message, $request->reason));

            /*
             *  To Admins;
             *  ToDo - Replace an email
             * */
            Mail::to($this->_base_email)->send(new SendUsMessage('Kontakt forma', $request->name, $request->email, $request->name, $request->email, $request->phone, $request->message, $request->reason));


            return $this->jsonSuccess(__('Vaša poruka je uspješno poslana!'));
        }catch (\Exception $e){
            return $this->jsonError('1000', __('Vaša poruka je uspješno poslana!'));
        }
    }
}
