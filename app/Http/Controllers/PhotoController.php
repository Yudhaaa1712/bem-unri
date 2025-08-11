<?php
// app/Http/Controllers/PhotoController.php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PhotoController extends Controller
{
    // Get all photos untuk frontend
    public function index(): JsonResponse
    {
        try {
            $photos = Photo::active()
                          ->orderBy('created_at', 'desc')
                          ->limit(6) // Limit 6 foto terbaru
                          ->get();

            return response()->json([
                'success' => true,
                'data' => $photos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching photos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Get photos untuk admin
    public function adminIndex(): JsonResponse
    {
        try {
            $photos = Photo::orderBy('created_at', 'desc')->get();

            return response()->json([
                'success' => true,
                'data' => $photos
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching photos',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Tambah photo baru
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
                'is_active' => 'boolean'
            ]);

            // Handle file upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('photos', $imageName, 'public');
                $validated['image_url'] = '/storage/' . $imagePath;
            }

            // Remove image from validated data since we use image_url
            unset($validated['image']);

            $photo = Photo::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Photo berhasil ditambahkan',
                'data' => $photo
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error creating photo',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Update photo
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $photo = Photo::findOrFail($id);

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional for update
                'is_active' => 'boolean'
            ]);

            // Handle file upload if new image provided
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($photo->image_url && file_exists(public_path($photo->image_url))) {
                    unlink(public_path($photo->image_url));
                }

                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('photos', $imageName, 'public');
                $validated['image_url'] = '/storage/' . $imagePath;
            }

            // Remove image from validated data since we use image_url
            unset($validated['image']);

            $photo->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Photo berhasil diupdate',
                'data' => $photo
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Photo not found'
            ], 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating photo',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Delete photo
    public function destroy($id): JsonResponse
    {
        try {
            $photo = Photo::findOrFail($id);
            
            // Delete image file if exists
            if ($photo->image_url && file_exists(public_path($photo->image_url))) {
                unlink(public_path($photo->image_url));
            }
            
            $photo->delete();

            return response()->json([
                'success' => true,
                'message' => 'Photo berhasil dihapus'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Photo not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting photo',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}