<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use app\Models\Order;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        try {
            $order = $request->all();
            if (!$order) {
                return response()->json([
                    'status' => false,
                    'data' => [
                        'error' => 'No hay productos para cargar.'
                    ]
                ], 400);
            }

            $order = Order::create($order);

            return response()->json([
                'status' => true,
                'data' => $order
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $order = Order::where('id', $id)->get();
            if (!$order) {
                return response()->json([
                    'status' => false,
                    'data' => [
                        'error' => 'Id de orden no encontrado. Id: ' . $id
                    ]
                ], 400);
            }

            $order = Order::where('id', $id)->update($request->all());

            return response()->json([
                'status' => true,
                'data' => $order
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'error' => $ex->getMessage()
            ], 400);
        }
    }
}
