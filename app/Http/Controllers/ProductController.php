<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class ProductController extends Controller
{
    public function getAll()
    {
        try {
            return response()->json([
                'status' => true,
                'data' => Product::get()
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'error' => $ex->getMessage()
            ], 400);
        }
    }

    public function getId(Int $id)
    {
        try {
            $notice = Product::where('id', $id)->get();
            if (!$notice) {
                return response()->json([
                    'status' => false,
                    'data' => [
                        'error' => 'Id de producto no encontrado. Id: ' . $id
                    ]
                ], 400);
            }
            return response()->json([
                'status' => true,
                'data' => $notice
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'status' => false,
                'error' => $ex->getMessage()
            ], 400);
        }
    }
}
