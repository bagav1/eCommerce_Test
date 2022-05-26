<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use app\Models\Cart;

class CartController extends Controller
{
    public function create(Request $request)
    {
        try {
            $cart = $request->all();
            if (!$cart) {
                return response()->json([
                    'status' => false,
                    'data' => [
                        'error' => 'No hay productos para cargar.'
                    ]
                ], 400);
            }

            $cart = Cart::create($cart);

            return response()->json([
                'status' => true,
                'data' => $cart
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    public function updateById(Request $request, $id)
    {
        try {
            $cart = Cart::where('id', $id)->get();
            if (!$cart) {
                return response()->json([
                    'status' => false,
                    'data' => [
                        'error' => 'Id de carrito no encontrado. Id: ' . $id
                    ]
                ], 400);
            }

            $cart = Cart::where('id', $id)->update($request->all());

            return response()->json([
                'status' => true,
                'data' => $cart
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    public function updateByUser(Request $request, $id)
    {
        try {
            $cart = Cart::where('user_id', $id)->and('status', '=', 1)->get();
            if (!$cart) {
                return response()->json([
                    'status' => false,
                    'data' => [
                        'error' => 'No se encontro informacion por actualziar'
                    ]
                ], 400);
            }

            $cart = Cart::where('user_id', $id)->and('status', '=', 1)->update($request->all());

            return response()->json([
                'status' => true,
                'data' => $cart
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    public function passToOrder(Request $request, $id)
    {
        try {
            $cart = Cart::where('user_id', $id)->get();
            if (!$cart) {
                return response()->json([
                    'status' => false,
                    'data' => [
                        'error' => 'Id de carrito no encontrado. Id: ' . $id
                    ]
                ], 400);
            }

            $cart = Cart::where('id', $id)->update(['status' => 2]);

            return response()->json([
                'status' => true,
                'data' => $cart
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'error' => $ex->getMessage()
            ], 400);
        }
    }
}
