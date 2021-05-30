<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\CampaignPhoto;
use Illuminate\Http\Request;

class CampaignImageController extends Controller
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

    public function setPrimary($campaignId, $photoId) {
        CampaignPhoto::where([
            ['campaign_id', '=', $campaignId],
            ['is_primary', '=', true]
        ])->update(['is_primary' => false]);

        CampaignPhoto::where('id', $photoId)->update(['is_primary' => true]);

        return CampaignPhoto::where('campaign_id', $campaignId)->get();
    }

    public function delete($campaignId, $photoId) {
        $campaignPhoto = CampaignPhoto::find($photoId);
        if ($campaignPhoto->is_primary) {
            $randomPhoto = CampaignPhoto::where('id', '!=', $photoId)->first();
            $randomPhoto->is_primary = true;
            $randomPhoto->save();
        }
        
        $campaignPhoto->delete();

        return CampaignPhoto::where('campaign_id', $campaignId)->get();
    }
}
