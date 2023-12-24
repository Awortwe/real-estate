<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyTypeRequest;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function AllType()
    {
        $types = PropertyType::latest()->get();
        return view('backend.types.all_types',compact('types'));
    }

    public function AddType()
    {
        return view('backend.types.add_type');
    }

    public function StoreType(PropertyTypeRequest $request)
    {
        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon
        ]);

        $notification = array(
            'message' => 'Property type created successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.type')->with($notification);
    }
}
