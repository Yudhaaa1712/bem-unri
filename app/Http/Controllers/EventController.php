<?php
// app/Http/Controllers/EventController.php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EventController extends Controller
{
    // Get all events untuk frontend
    public function index(): JsonResponse
    {
        try {
            $events = Event::active()
                          ->orderBy('event_date', 'asc')
                          ->get();

            return response()->json([
                'success' => true,
                'data' => $events
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching events',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Get events untuk admin (termasuk yang inactive)
    public function adminIndex(): JsonResponse
    {
        try {
            $events = Event::orderBy('event_date', 'desc')->get();

            return response()->json([
                'success' => true,
                'data' => $events
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching events',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Tambah event baru
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'event_date' => 'required|date',
                'is_active' => 'boolean'
            ]);

            // Set default values untuk field yang tidak ada
            $validated['time'] = '00:00 - 23:59'; // Default waktu
            $validated['location'] = null; // Default lokasi kosong

            $event = Event::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Event berhasil ditambahkan',
                'data' => $event
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
                'message' => 'Error creating event',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Get single event
    public function show($id): JsonResponse
    {
        try {
            $event = Event::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $event
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching event',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Update event
    public function update(Request $request, $id): JsonResponse
    {
        try {
            $event = Event::findOrFail($id);

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'event_date' => 'required|date',
                'is_active' => 'boolean'
            ]);

            // Set default values untuk field yang tidak ada
            $validated['time'] = '00:00 - 23:59'; // Default waktu
            $validated['location'] = null; // Default lokasi kosong

            $event->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Event berhasil diupdate',
                'data' => $event
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
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
                'message' => 'Error updating event',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Delete event
    public function destroy($id): JsonResponse
    {
        try {
            $event = Event::findOrFail($id);
            $event->delete();

            return response()->json([
                'success' => true,
                'message' => 'Event berhasil dihapus'
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Event not found'
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting event',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}