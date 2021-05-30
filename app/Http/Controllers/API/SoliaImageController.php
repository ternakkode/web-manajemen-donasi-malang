<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\SoliaPhoto;
use Illuminate\Http\Request;

class SoliaImageController extends Controller
{
    public function upload(Request $request) {
        $image = $request->file('file');
        
        $fileName = uniqid() . '_' . trim($image->getClientOriginalName());
        
        $image->storeAs(config('url.tmp-image'), $fileName);

        return response()->json([
            'name' => $fileName,
            'original_name' => $image->getClientOriginalName()
        ]);
    }

    public function setPrimary($soliaId, $photoId) {
        SoliaPhoto::where([
            ['solia_id', '=', $soliaId],
            ['is_primary', '=', true]
        ])->update(['is_primary' => false]);

        SoliaPhoto::where('id', $photoId)->update(['is_primary' => true]);

        return SoliaPhoto::where('solia_id', $soliaId)->get();
    }

    public function delete($soliaId, $photoId) {
        $soliaPhoto = SoliaPhoto::find($photoId);
        if ($soliaPhoto->is_primary) {
            $randomPhoto = SoliaPhoto::where('id', '!=', $photoId)->first();
            $randomPhoto->is_primary = true;
            $randomPhoto->save();
        }
        
        $soliaPhoto->delete();

        return SoliaPhoto::where('solia_id', $soliaId)->get();
    }
}
