<?php

namespace App\Http\Controllers\API;

use App\Models\ClientRelation;
use App\Models\Company;

class ClientsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getByCompany($company_id)
    {
        /*Пытаемся найти заданную компанию*/
        $company = Company::find($company_id);
        if(is_null($company)) return $this->sendResponse(null, 'Company not found.');

        $clients = ClientRelation::leftJoin('clients', 'clients.id', '=', 'clients_relations.client_id')
            ->select("clients.id", "fullname", "phone", "email")
            ->where("company_id", $company->id)
            ->simplePaginate(10);

        return $this->sendResponse($clients->toArray(), 'Clients retrieved successfully.');
    }
}
