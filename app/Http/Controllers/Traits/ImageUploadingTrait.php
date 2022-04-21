<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait ImageUploadingTrait
{
    public function storeImage(Request $request)
    {
        $path = storage_path('tmp/uploads');

    
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}