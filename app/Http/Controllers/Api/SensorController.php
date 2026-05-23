<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SensorData;

class SensorController extends Controller
{
    ghbgdgdggdg
    }

    // GET - ambil semua data
    public function index()
    {
        $data = SensorData::latest()->get();

        return response()->json($data);
    }
}
