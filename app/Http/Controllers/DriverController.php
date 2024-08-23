<?php

namespace App\Http\Controllers;

use App\enum\OrderStatus;
use App\Models\order_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $orderData = order_user::where('user_id', $userId)
            ->whereNull('odjazd_dostawa') // wyswietla sie gdy nie jest zaznaczona data odjazdu z zaladunku
            ->with('order', 'user')
            ->paginate(5);

        return view('driver.index', ['user_id' => $userId, 'order_data' => $orderData]);
    }

    public function history()
    {
        $userId = Auth::id();

        $orderData = order_user::where('user_id', $userId)
            ->whereNotNull('odjazd_dostawa') // wyswietla sie gdy nie jest zaznaczona data odjazdu z zaladunku
            ->with('order', 'user')
            ->paginate(5);

        return view('driver.history', ['user_id' => $userId, 'order_data' => $orderData]);
    }


    public function calendar() {
        $userId = Auth::id();
        // Fetch all orders for the authenticated user
        $orderData = order_user::where('user_id', $userId)
            ->with('order', 'user')
            ->get();
        return view('driver.calendar', ['id' => $userId, 'orders' => $orderData]);
    }
    public function details($id)
    {
        // Tutaj możesz dodać logikę dotyczącą szczegółów danego zlecenia na podstawie jego ID
        return view('driver.details', ['order_id' => $id]);
    }

    public function details_one(Request $request)
    {
        $orderId = $request->route('id');
        $orderData = order_user::where('order_id', $orderId)
            ->with('order', 'user')
            ->firstOrFail();
        return view('driver.details_one', ['orderData' => $orderData]);
    }
    public function chanegeStatus(Request $request)
    {
//przyjazd na magazyn
        $loading_status = $request->input('loading_Status');
        //odjazd
        $loading_status_finish = $request->input('loading_Status_finish');

//przyjazd na rozladunek
        $unloading_status = $request->input('unloading_Status');
        //odjazd
        $unloading_status_finish = $request->input('unloading_Status_finish');
        $order_id = $request->input('order_id');
//zaznaczanie przybycia na magazyn
        if ($loading_status) {
            $currentOrder = order_user::where('order_id', $order_id)
                ->with('order', 'user')
                ->firstOrFail();
            if (!$currentOrder->przyjazd_zaladunek) {
                $currentOrder->przyjazd_zaladunek = now()->format('Y-m-d H:i');
                $currentOrder->update();
                return redirect()->back()->with('success', 'Zaznaczono przyjazd na magazyn w zamowieniu o id ' . $currentOrder->id);
            } else {
                return redirect()->back()->with('error', 'Przyjazd zostal juz zaznaczony o:  ' . $currentOrder->przyjazd_zaladunek);
            }
        }
//zakonczyl zaladunek
        if ($loading_status_finish) {
//zaznaczanie rozladunku
            $currentOrderFinish = order_user::where('order_id', $order_id)
                ->with('order', 'user')
                ->firstOrFail();
            if (!$currentOrderFinish->odjazd_zaladunek) {
                $currentOrderFinish->odjazd_zaladunek = now()->format('Y-m-d H:i');
                $currentOrderFinish->update();
                return redirect()->back()->with('success', 'Zaznaczono odjazd na magazyn w zamowieniu o id ' . $currentOrderFinish->id);
            } else {
                return redirect()->back()->with('error', 'Odjazd zostal juz zaznaczony o:  ' . $currentOrderFinish->odjazd_zaladunek);
            }
        }
        //rozladunek start
        if ($unloading_status) {
//zaznaczanie rozladunku


            $currentOrderFinish = order_user::where('order_id', $order_id)
                ->with('order', 'user')
                ->firstOrFail();

            if (!$currentOrderFinish->przyjazd_dostawa) {

                $currentOrderFinish->przyjazd_dostawa = now()->format('Y-m-d H:i');
                $currentOrderFinish->update();


                return redirect()->back()->with('success', 'Zaznaczono przyjazd na miejsce dostawy w  ' . $currentOrderFinish->order->miejsce_docelowe);

            } else {
                return redirect()->back()->with('error', 'Przyjechałeś na miejsce dostawy o:  ' . $currentOrderFinish->przyjazd_dostawa);

            }
        }
        //rozladunek finish
       if ($unloading_status_finish) {
//zaznaczanie rozladunku
            $currentOrderFinish = order_user::where('order_id', $order_id)
                ->with('order', 'user')
                ->firstOrFail();
            if (!$currentOrderFinish->odjazd_dostawa) {
                $currentOrderFinish->odjazd_dostawa = now()->format('Y-m-d H:i');
                $currentOrderFinish->order->role = OrderStatus::DONE;
                $currentOrderFinish->update();
                return redirect()->route('driver.history')->with('success', 'Zaznaczono odjazd  na miejsce dostawy w  zamowieniu o id ' . $currentOrderFinish->id);
            } else {
                return redirect()->back()->with('error', 'Odjazd z miejsca dostawy zostal juz zaznaczony o:  ' . $currentOrderFinish->odjazd_dostawa);
            }
        }
    }
}
