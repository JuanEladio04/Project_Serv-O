<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ServiceRequest;
use Illuminate\Database\QueryException;

class ServiceController extends Controller
{
    /**
     * Returns a view of the service index page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $services = Service::orderByDesc('created_at')->paginate(12);

        return view('service.index')->with('services', $services);
    }

    public function show(Service $service){
        return view('service.show')->with('service', $service);
    }

    /**
     * Returns a view of the service create page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Creates a new service.
     *
     */
    public function store(ServiceRequest $request)
    {
        try {
            DB::beginTransaction();

            $validatedData = $request->validated();
            $newService = new Service;
            $newService->name = $validatedData['name'];
            $newService->service_name = $validatedData['service_name'];

            $newService->save();

            DB::commit();
            return redirect()->route('service.index')->with('status', 'Servicio registrado correctamente.');

        } catch (QueryException $e) {
            DB::rollBack();
            return redirect()->route('service.index')->with('status', 'No ha sido posible registrar servicio.');
        }
    }
}
