<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;
use App\Http\Requests\CourierRequest;
use App\Http\Resources\CourierResource;
use Illuminate\Support\Facades\Log;


class CourierController extends Controller
{
    public function store(CourierRequest $request)
    {
        $courier = Courier::create($request->validated());
        return new CourierResource($courier);
    }

    public function show($id)
    {
        $courier = Courier::findOrFail($id);
        return new CourierResource($courier);
    }

    public function update(CourierRequest $request, $id)
    {
        $courier = Courier::findOrFail($id);

        // Проверка авторизации
        $this->authorize('update', $courier);

        $courier->update($request->validated());
        return new CourierResource($courier);
    }


    public function index()
    {
        $couriers = Courier::all();
        return CourierResource::collection($couriers);
    }

    // Метод для массового создания курьеров
    public function bulkStore(Request $request)
    {
        $data = $request->input('data');

        $couriers = [];
        foreach ($data as $courierData) {
            $courierData['regions'] = json_encode($courierData['regions']);
            $courierData['working_hours'] = json_encode($courierData['working_hours']);
            $couriers[] = Courier::create($courierData);
        }

        return CourierResource::collection($couriers);
    }
}

