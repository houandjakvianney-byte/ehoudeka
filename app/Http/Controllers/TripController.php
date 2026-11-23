<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Trip;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class TripController extends Controller
{
    public function index(Request $request): View|JsonResponse
    {
        $query = Trip::with('user.vehicle')
            ->where('depart_at', '>=', now())
            ->orderBy('depart_at', 'asc');

        
        if ($request->filled('ville_depart')) {
            $query->where(
                'ville_depart',
                'like',
                '%' . $request->input('ville_depart') . '%'
            );
        }

        
        if ($request->filled('ville_arrivee')) {
            $query->where(
                'ville_arrivee',
                'like',
                '%' . $request->input('ville_arrivee') . '%'
            );
        }

        
        if ($request->filled('date_depart')) {
            $query->where(
                'depart_at',
                '>=',
                $request->input('date_depart')
            );
        }

        $trips = $query->paginate(5)->withQueryString();

       
        if ($request->ajax()) {
            return response()->json([
                'html' => view('trips.partials.results', [
                    'trips' => $trips,
                ])->render(),
            ]);
        }

        
        return view('trips.index', [
            'trips' => $trips,
            'filters' => $request->only([
                'ville_depart',
                'ville_arrivee',
                'date_depart',
            ]),
        ]);
    }

    public function mine(): View
    {
        $trips = Auth::user()
            ->trips()
            ->with('user.vehicle')
            ->orderBy('depart_at', 'desc')
            ->get();

        return view('trips.mine', [
            'trips' => $trips,
        ]);
    }

    public function create(): View|RedirectResponse
    {
        if (!Auth::user()->vehicle) {
            return redirect()->route('vehicle.show')
                ->with(
                    'warning',
                    'Vous devez d\'abord enregistrer un véhicule avant de proposer un trajet.'
                );
        }

        return view('trips.create', [
            'vehicle' => Auth::user()->vehicle,
        ]);
    }
        public function show(Trip $trip): View
    {
        $trip->load('user.vehicle');

        return view('trips.show', [
            'trip' => $trip,
            'vehicle' => $trip->user->vehicle,
            'driver' => $trip->user,
        ]);
    }
    public function store(TripRequest $request): RedirectResponse
    {
        if (!Auth::user()->vehicle) {
            return redirect()->route('vehicle.show')
                ->with('warning', 'Vous devez d\'abord enregistrer un véhicule.');
        }

        Auth::user()->trips()->create($request->validated());

        return redirect()->route('trips.mine')
            ->with('success', 'Votre trajet a été publié avec succès.');
    }
   

    public function destroy(Trip $trip): RedirectResponse
    {
        Gate::authorize('delete', $trip);

        $trip->delete();

        return redirect()->route('trips.mine')
            ->with('success', 'Le trajet a été supprimé.');
    }
}
