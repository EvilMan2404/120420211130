<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\HelperController;
use App\Models\Address;
use App\Models\Areas;
use App\Models\Cities;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $cities = Cities::all();
        $areas = Areas::all();
        $addresses = (new \App\Models\Address)->getMyAddresses($request);
        return view('welcome', [
            'cities' => $cities,
            'areas' => $areas,
            'addresses' => $addresses,
        ]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'city' => ['required', 'exists:cities,id'],
            'area' => ['required', 'exists:areas,id'],
            'street' => ['nullable', 'max:255'],
            'house' => ['nullable', 'max:255'],
            'additional_info' => ['nullable'],
        ]);
        $address = new Address();
        $address->name = $request->post('name');
        $address->city_id = $request->post('city');
        $address->area_id = $request->post('area');
        $address->street = $request->post('street');
        $address->additional_info = $request->post('additional_info');
        $address->house = $request->post('house');
        $address->identifier = (new Helpers\HelperController)->getIp() ?? $request->ip(); //использую getIp потому что не всегда ip() отдает верный ip
        $address->save();
        return redirect(route('address_form'));
    }

    /**
     * @throws \Exception
     */
    public function delete($id, Request $request)
    {
        $address = Address::where('id', $id)->where('identifier', (new Helpers\HelperController)->getIp() ?? $request->ip())->first();
        if (!$address) {
            abort(403); //Ну или сделать редирект с ошибкой
        }
        $address->delete();
        return redirect(route('address_form'));
    }
}
