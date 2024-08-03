<?php

namespace App\Http\Controllers;

use App\Models\Sheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SheetController extends Controller
{
    public function index()
    {
        $rawSheets = Sheet::orderBy('row')
            ->orderBy('column')
            ->get()
            ->toArray();

        for($i = 0; $i < count($rawSheets) / 5; $i++) {
            $sheets[] = array_slice($rawSheets, $i * 5, 5);
        }

        return view('sheets/sheets', ["sheets" => $sheets]);
    }
}
