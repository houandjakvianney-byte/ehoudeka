<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class VehicleController extends Controller
{
    /**
     * Affiche le véhicule du membre connecté ou le formulaire s'il n'en a pas.
     */
    public function show(): View
    {
        $vehicle = Auth::user()->vehicle;

        return view('vehicles.show', [
            'vehicle' => $vehicle,
        ]);
    }

    /**
     * Affiche le formulaire d'enregistrement du véhicule 
     */
    public function create(): View|RedirectResponse
    {
        
        if (Auth::user()->vehicle) {
            return redirect()->route('vehicle.show')
                ->with('info', 'Vous avez déjà enregistré un véhicule.');
        }

        return view('vehicles.create');
    }

    /**
     * Enregistre le véhicule avec upload sécurisé de la photo.
     */
    public function store(VehicleRequest $request): RedirectResponse
    {
         
        
        if (Auth::user()->vehicle) {
            return redirect()->route('vehicle.show')
                ->with('error', 'Vous possédez déjà un véhicule.');
        }

        $photoPath = $request->file('photo')->store('vehicles', 'public');

        Auth::user()->vehicle()->create([
            'plaque' => $request->validated('plaque'),
            'description' => $request->validated('description'),
            'photo_path' => $photoPath,
        ]);

        return redirect()->route('vehicle.show')
            ->with('success', 'Votre véhicule a été enregistré avec succès.');
    }
    public function edit(): View|RedirectResponse
    {
        $vehicle = Auth::user()->vehicle;

        if (! $vehicle) {
            return redirect()->route('vehicle.create')
                ->with('info', 'Vous devez d’abord enregistrer un véhicule.');
        }

        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Met à jour le véhicule du membre connecté.
     */
    public function update(Request $request): RedirectResponse
    {
        $vehicle = Auth::user()->vehicle;

        if (! $vehicle) {
            return redirect()->route('vehicle.create')
                ->with('error', 'Aucun véhicule à modifier.');
        }

        $validated = $request->validate([
            'plaque' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string', 'max:1000'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:40960'],
        ]);

        $oldPhotoPath = $vehicle->photo_path;

        // Remplacer la photo uniquement si une nouvelle est envoyée.
        if ($request->hasFile('photo')) {
            $newPhotoPath = $request->file('photo')
                ->store('vehicles', 'public');

            $validated['photo_path'] = $newPhotoPath;
        }

        $vehicle->update([
            'plaque' => $validated['plaque'],
            'description' => $validated['description'],
            'photo_path' => $validated['photo_path'] ?? $oldPhotoPath,
        ]);

        // Supprimer l'ancienne photo après la mise à jour.
        if (
            isset($newPhotoPath) &&
            $oldPhotoPath &&
            $oldPhotoPath !== $newPhotoPath
        ) {
            Storage::disk('public')->delete($oldPhotoPath);
        }

        return redirect()->route('vehicle.show')
            ->with('success', 'Les informations de votre véhicule ont été mises à jour.');
    }
}