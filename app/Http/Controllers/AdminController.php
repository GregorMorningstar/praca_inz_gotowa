<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $users = User::paginate(10);
        return view('admin.show', ['users' => $users]);

    }

    public function showDetails($id)
    {
        try {
            $user = User::findOrFail($id);
            // Jeśli użytkownik został znaleziony, możesz przejść do widoku szczegółów użytkownika
            return view('admin.userDetails', ['user' => $user]);
        } catch (ModelNotFoundException $e) {
            // Jeśli użytkownik o podanym ID nie istnieje, możesz obsłużyć tę sytuację, na przykład przekierowując użytkownika z odpowiednim komunikatem błędu
            return redirect()->route('index')->with('error', 'Użytkownik o podanym ID nie istnieje.');
        }
    }

    public function updateRole(Request $request, $id)
    {

        // Weryfikacja danych wejściowych
        $request->validate([
            'role' => 'required',]);

        // Pobranie użytkownika na podstawie ID
        $user = User::findOrFail($id);

        // Aktualizacja roli użytkownika
        $user->role = $request->role;
//        dd($user);
        // Zapisanie zmian w bazie danych
        $user->update();

        // Przekierowanie użytkownika tam, gdzie chcesz po wykonaniu aktualizacji
        return redirect()->route('showUsers', $user->id)->with('success', 'Rola użytkownika została zaktualizowana pomyślnie!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('showUsers')->with('success', 'Użytkownik został pomyślnie usunięty.');

    }
}
