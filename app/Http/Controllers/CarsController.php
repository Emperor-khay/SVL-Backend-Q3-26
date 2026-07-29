<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{

    public function addForm()
    {
        return view('cars');
    }

    public function index(){
        $cars = Cars::orderby('created_at', 'DESC')->get();
        // $cars = Cars::all();
        // dd($cars);       
        return view('carlistings', compact('cars'));
    }

    public function create(Request $request) {
       
        // dd(
        //     $request->all(),
        //     $request->model,
        //     $request->input('model')
        // );

         $validator = Validator::make(
            $request->all(), [
                'name' => ['max:20', 'min:10', 'required'],
                'model' => ['required'],
                'year' => ['required'],
                'price' => ['required'],
                'status' => ['required'],
                'colour' => ['required'],
            ]);

            if ($validator->fails()) {
                Log::info('Validator failed');
                // dd("Validation failed");
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
        // $request->validated();
        // dd($request);
       
        // $cars = new Cars;
        // $cars->name = ;
        // $cars->model = $request->modelName;
        // $cars->status = ;
        // $cars->year = ;
        // $cars->colour = ;
        // $cars->price = ;
        // $cars->save();

        

        $cars = Cars::create([
            'name' => $request->name,
            'model' => $request->model,
            'status' => $request->status,
            'year' => $request->year,
            'colour' => $request->colour,
            'price' => $request->price,
        ]);



        return redirect('/cars');
        // dd($cars);

    }
 
    public function show(int $id){
        $car = Cars::findorfail($id);

        return view('editCar', compact('car'));
    }

    public function update(Request $request, $id){
        $car = Cars::findorfail($id);
        // unset($request['_token']);
        // dd($request->all());

        $car->update($request->all());
        // $car->name = "Mazda";
        // $car->save();

        return redirect('/car/'.$id);
    }

    public function destroy($id){
        $car = Cars::findorfail($id);
        $car->delete();

        return redirect('/cars');
    }

    public function restoreCar($id){
        $car = Cars::findorfail($id);
        // dd($car);
        // $car->restore();

        $car->deleted_at = null;
        $car->save();

        return redirect('/cars');
    }


}
