<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Http\Requests\AdminClientRequest;
use CodeDelivery\Services\ClientService;

class ClientsController extends Controller
{
	private $repository;
    private $clientService;
    
	public function __construct(ClientRepository $Repository, ClientService $clientService){
		$this->repository = $Repository;
        $this->clientService = $clientService; 
	}

    public function index(){
	   	$clients = $this->repository->paginate(5);
    	return view('admin.clients.index', compact('clients'));
    }

    public function create(){
    	return view('admin.clients.create');
    }

    public function store(AdminClientRequest $request){
    	$data = $request->all();
    	$this->clientService->create($data);
    	return redirect()->route('admin.clients.index');
    }

    public function edit($id){
        $client = $this->repository->find($id);
        return view('admin.clients.edit',compact('client'));
    }

    public function update(AdminClientRequest $request, $id){
        $data = $request->all();
        $this->clientService->update($data,$id);
        return redirect()->route('admin.clients.index');
    }
}
