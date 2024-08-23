<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::paginate(15);
        // Zwróć widok z danymi wszystkich zamówień
        return view('user.index', ['orders' => $orders]);
    }
  public function add()
    {
        return view('user.add');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'miejsce_zaladunku' => 'required|string|max:255',
            'data_zaladunku' => 'required|date',
            'miejsce_docelowe' => 'required|string|max:255',
            'data_rozladunku' => 'required|date',
            'dystans' => 'required',
            'cena' => 'required',
        ]);

        // Utwórz nowe zamówienie dla aktualnie zalogowanego użytkownika
        $request->user()->orders()->create($validated);

        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $orders)
    {

        $user = Auth::user();


// Jeśli użytkownik istnieje, pobierz jego zamówienia z paginacją
        if ($user) {
            $orders = $user->orders()->paginate(5);
        } else {
            // Obsługa przypadku, gdy użytkownik nie istnieje
            $orders = collect(); // Zwraca pustą kolekcję, lub zaimplementuj inny sposób obsługi tego przypadku
        }        return view('user.show', ['orders' => $orders]);    }


}
