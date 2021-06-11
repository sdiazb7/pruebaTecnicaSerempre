<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ClientController extends Controller
{
	
	    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index(Request $request)
    {
        
		
	$data = request()->all();	
 
    if(empty($data['text'])){
  
	 $client = Client::select('client.id AS id', 'client.cod AS cod' ,'client.name AS name','cities.name AS city','client.image AS image')->join('cities','client.city', '=', 'cities.id')->orderBy('client.id','DESC')->paginate(10);

        $title = 'Listado de usuarios';

        return view('client.index', compact('title', 'client'));
    }else{
		
		 
		$text=trim($data['text']);
		$client = Client::select('client.id AS id', 'client.cod AS cod' ,'client.name AS name','cities.name AS city')->join('cities','client.city', '=', 'cities.id')->where('cities.name','like','%'.$text.'%')->paginate(10);
      
       $title = 'Listado de usuarios';

       return view('client.index', compact('title', 'client'));
		
	}	
	
	}

    public function show(Client $client)
    {
		
	    $id_city=$client->city;
		$city=Cities::where("id",'=',$id_city)->get();
		
		return view('client.show', ['client' => $client,'city' => $city]);	
		
    }

    public function create()
    {
		
		$cities = Cities::select('cities.id AS id', 'cities.name AS name')->get();
        
	    
        return view('client.create',compact('cities'));
    }

    public function store(Request $request)
    {
		
	        $file = $request->file('imagen');
            $name_file = $file->getClientOriginalName();
            \Storage::disk('local')->put('public/'.$name_file ,  \File::get($file));	
	        $data = request()->validate([
            'cod' => 'required',
			'name' => 'required',
            'city' => 'required',
        ], [
            'cod.required' => 'El campo nombre es obligatorio',
			'name.required' => 'El campo nombre es obligatorio',
			'city.required' => 'El campo nombre es obligatorio'
        ]);
		
        Client::create([
            'cod' => $data['cod'],
            'name' => $data['name'],
            'city' => $data['city'],
			'image' => $name_file,
        ]);

         return redirect()->back()->with('alert', 'Se registro el cliente');   
    }

    public function edit(Client $client)
    {
		$id_city=$client->city;
		$city=Cities::where("id",'=',$id_city)->get();
		$cities=Cities::all();	
        return view('client.edit', ['client' => $client,'city' => $city,'cities' => $cities]);
    }

    public function update(Client $client)
    {
		
		$data = request()->validate([
		
            'cod' => 'required',
			'name' => 'required',
            'city' => 'required',
          
        ]);

        $client->update($data);

        return redirect()->back()->with('alert', 'Se actualizo el cliente');  
    }

    function destroy(Client $client)
    {
        $client->delete();

        return redirect()->back()->with('alert', 'Se elimino el cliente');  
    }
}
