<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store; // Assuming you have a model named BigcommerceStore

class BigCommerceAuthController extends Controller
{
    public function handleOAuthCallback(Request $request)
    {
        // return  $request->query('context');
        $trimStoreId = str_replace('stores/', '', $request->query('context'));
        $storeHash = $trimStoreId;
        $accessToken = $request->query('code');
        $account_uuid = $request->query('account_uuid');

        // Store the BigCommerce store details in the database
        if(!empty($storeHash && $accessToken && $account_uuid)){
            $sts=Store::create([
                'store_hash' => $storeHash,
                'access_token' => $accessToken,
                'ac_uuid' => $account_uuid,
            ]);
            if($sts){
                // return "Data Store ";
                return redirect('/load');
            }else{
                return "Data not stor";
            }
        }    
        // return "Store details for store hash $storeHash stored successfully!";
    }


    public function handleUninstallWebhook(Request $request)
    {
        return $storeHash = $request->all();
        
        $store = Store::where('store_hash', $storeHash)->first();

        if ($store) {
            $store->update(['status' => '0']);
            return response()->json(['message' => 'App uninstalled successfully.'], 200);
        }
        // If the store is not found, return an error response
        return response()->json(['error' => 'Store not found.'], 404);
    }


}
