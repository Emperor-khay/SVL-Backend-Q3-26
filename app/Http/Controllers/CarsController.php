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

    public function index(Request $request){
        // $cars = Cars::orderby('created_at', 'DESC')->get();
        $text = $request->query('search');

        // dd($text);
        $cars = Cars::where('name', 'like', "%$text%")
                ->orWhere('model', 'like', "%$text%")
        ->orWhere('price', 'like', "%$text%")
        ->orWhere('colour', 'like', "%$text%")
        ->latest()->paginate(4);
        // $cars = Cars::where('name', '=', $text)->
        // $cars = Cars::all();
        // dd($cars);
        return view('carlistings', compact('cars'));
    }

    // public function search($text){
    //     $cars = Cars::where('name', 'like', "%{$text}%")->paginate(4);
    //     return view('carlistings', ['cars'=>$cars]);
    // }

    public function validateCar(Request $request){

    dd("hi");
         $validator = Validator::make(
            $request->all(),
            [
                'name' => ['max:20', 'required'],
                'model' => ['required'],
                'year' => ['required'],
                'price' => ['required'],
                'status' => ['required'],
                'colour' => ['required'],
                'carImage' => ['required', 'image', 'max:2048']
            ],
            [
                'name.required' => "Please Input a Car Name",
                'name.max' => "Car name cannot exceed 20 characters",
                'model.required' => "Please Enter a Model for this car",
            ]);

            if ($validator->fails()) {
                Log::info('Validator failed');
                // dd("Validation failed");
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }

            return $validator;
    }

    public function uploadCarImage(Request $request){
        $fileExtension = $request->file('carImage')->getClientOriginalExtension();
        $fileName = time().'-'.$request->name.$request->model.$request->year.'.'.$fileExtension;
        // dd($fileName, $fileExtension);
        $pathToImage =  $request->file('carImage')->storeAs('car',$fileName,  'public');

        return $pathToImage;
    }

    public function create(Request $request) {
        $this->validateCar($request);

        if($request->hasFile('carImage')){
            $path = $this->uploadCarImage($request);
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
            'image' => $path ?? null
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

        $this->validateCar($request);


        if($request->hasFile('carImage')){
            $path = $this->uploadCarImage($request);
        }
        $car->update([
            'name' => $request->name,
            'model' => $request->model,
            'status' => $request->status,
            'year' => $request->year,
            'colour' => $request->colour,
            'price' => $request->price,
            'image' => $path ?? null
        ]);
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
