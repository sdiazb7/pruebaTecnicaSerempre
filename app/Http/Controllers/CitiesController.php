<?php

namespace App\Http\Controllers;
use App\Models\Cities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {

        $title = 'Listado de usuarios';
		$cities = Cities::orderBy('id','ASC')->paginate(5);

        return view('cities.index', compact('title', 'cities'));
    }

    public function show(Cities $cities)
    {
        return view('cities.show', compact('cities'));
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store()
    {
		
		
	 $data = request()->validate([
	 
			'cod' => 'required',
            'name' => 'required',
            
        ],[
            'cod.required' => 'El campo codigo es obligatorio',
			'name.required' => 'El campo nombre es obligatorio',
        ]);
		
        Cities::create([
             
            'cod' => $data['cod'],
			'name' => $data['name'],
			
        ]);

       return redirect()->back()->with('alert', 'Se registro la ciudad');     
	 
    }

    public function edit(Cities $cities)
    {
        return view('cities.edit', ['cities' => $cities]);
    }

    public function update(Cities $cities)
    {
		
		$data = request()->validate([
		
            'cod' => 'required',
			'name' => 'required'
          
        ]);

        $cities->update($data);

        return redirect()->back()->with('alert', 'Se actuolizo la ciudad');  
    }

    function destroy(Cities $cities)
    {
        $cities->delete();

        return redirect()->back()->with('alert', 'Se elimino la ciudad');  
    }
}