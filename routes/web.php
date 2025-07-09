<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\DB;

Route::get('/test-connection-eka', function () {
    try {
        $result = DB::connection('pgsql_eka')->select('SELECT 1');
        return response()->json([
            'status' => 'success',
            'message' => 'Connection to pgsql_eka is working.',
            'result' => $result
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Connection to pgsql_eka failed.',
            'error' => $e->getMessage()
        ], 500);
    }
});