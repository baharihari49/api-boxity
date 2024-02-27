<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AssetRequest;
use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $assets = Asset::with(['location', 'condition', 'depreciations'])->get();
        return response()->json([
            'status' => 200,
            'data' => $assets,
            'message' => 'Assets retrieved successfully.',
        ]);
    }

    public function store(AssetRequest $request)
    {
        $asset = Asset::create($request->validated());
        return response()->json([
            'status' => 201,
            'data' => $asset,
            'message' => 'Asset created successfully.',
        ], 201);
    }

    public function show($id)
    {
        $asset = Asset::with(['location', 'condition', 'depreciations'])->findOrFail($id);
        return response()->json([
            'status' => 200,
            'data' => $asset,
            'message' => 'Asset retrieved successfully.',
        ]);
    }

    public function update(AssetRequest $request, $id)
    {
        $asset = Asset::findOrFail($id);
        $asset->update($request->validated());
        return response()->json([
            'status' => 201,
            'data' => $asset,
            'message' => 'Asset updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        Asset::destroy($id);
        return response()->json([
            'status' => 200,
            'message' => 'Asset deleted successfully.',
        ]);
    }
}
