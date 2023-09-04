<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function index()
    {
        $models = Test::all();
        return response()->json($models);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            // Add other validation rules as needed
        ]);


        $user = new User;
        $user->name = 'test';
        $user->email = 'test@gmail.com';
        $user->password = Hash::make('test');
        $user->save();

        $model = new Test;
        // Set the attributes of the model based on the request data
        $model->name = $validatedData['name'];
        $model->description = $validatedData['description'];
        $model->price = $validatedData['price'];
        $model->quantity = $validatedData['quantity'];
        // Set other attributes as needed
        $product = Test::create($request->all());
        return response()->json($model, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            // Add other validation rules as needed
        ]);

        $model = Test::find($id);
        if (!$model) {
            return response()->json(['message' => 'Model not found'], 404);
        }
        // Update the attributes of the model based on the request data
        $model->name = $validatedData['name'];
        $model->description = $validatedData['description'];
        $model->price = $validatedData['price'];
        $model->quatity = $validatedData['quantity'];
        // Update other attributes as needed
        $model->save();

        return response()->json($model);
    }

    public function destroy($id)
    {
        $model = Test::find($id);
        if (!$model) {
            return response()->json(['message' => 'Model not found'], 404);
        }
        $model->delete();

        return response()->json(['message' => 'Model deleted']);
    }
}
