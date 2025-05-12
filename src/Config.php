<?php

namespace Core\Siteconfig;

use Core\Siteconfig\Models\Config as MODEL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class Config
{
    /**
     * Display a listing of the resource.
     */
    public static function list()
    {
        $list = MODEL::all()->makeHidden(['id', 'is_env','created_at', 'updated_at']);
        return $list->toArray();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public static function save($key, $value)
    {
        $request = new Request();
        $request->replace([
            'key' => $key,
            'value' => $value,
        ]);
    
        $request->validate([
            'key' => 'required|string|max:255|unique:configs,key',
            'value' => 'required|string',
        ]);

        MODEL::create([
            'key' => $request->key,
            'value' => $request->value,
            'is_env' => false,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public static function show(string $key)
    {
        $config = MODEL::where('key', $key)->first();
        return $config['value'] ?? null;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public static function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public static function update($key, $value)
    {

        $config = MODEL::where('key', $key)->first();

        if($config){
            $config->value = $value;
            $config->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public static function delete(string $key)
    {
        $data = MODEL::where('key', $key)->first();
        if ($data) {
            $data->delete();
        }
    }
}
