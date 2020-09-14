<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactController extends Controller
{

		public function index() {
			$contact = Contact::all();

			$data = DB::table('contacts')->paginate(5);

			return view("homepage", ["contacts" => $data]);
			}
			
		
			public function show($id) {
			$contact = Contact::find($id);

			return view('showcontactspage', [
				"findContact" => $contact
			]);
		}

		public function edit($id) {
			$contact = Contact::find($id);
			return view('editpage', ['contact' => $contact]);
		}

		public function signup(){
			return view('signuppage');
		}

    public function create(Request $request) {

			$contact = new Contact();
			
			
			try {


					$images = $request->file('image')->store('images', 'public');
					$contact->image = $images;
					$contact->name = $request->name;
					$contact->surname = $request->surname;
					$contact->phone = $request->phone;
					$contact->email = $request->email;
					$contact->cep = $request->cep;
					$contact->state = $request->state;
					$contact->city = $request->city;
					$contact->street = $request->street;
					$contact->neighborhood = $request->neighborhood;
					$contact->number = $request->number;
					
					$contact->save();
						
					return redirect('/contacts');
        } catch (\Exception $error) {
						return ['return' => $error];
        }
    }

		public function update(Request $request, $id) {
			$contact = Contact::find($id);
			
			$images = $request->file('image')->store('images', 'public');
			
			$contact->image = $images;
			$contact->name = $request->name;
			$contact->surname = $request->surname;
			$contact->phone = $request->phone;
			$contact->email = $request->email;
			$contact->cep = $request->cep;
			$contact->state = $request->state;
			$contact->city = $request->city;
			$contact->street = $request->street;
			$contact->neighborhood = $request->neighborhood;
			$contact->number = $request->number;
		
			$contact->save();

			return redirect('/contacts');
		}

		public function delete($id) {
			$contact = Contact::find($id);

			$contact -> delete();
			
			return redirect('/contacts');
		}

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
