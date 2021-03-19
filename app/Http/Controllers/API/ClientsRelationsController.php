<?php

namespace App\Http\Controllers\API;

use App\Models\Client;
use App\Models\ClientRelation;

class ClientsRelationsController extends BaseController
{
    /**
     * Display a list of companies of client.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompanyByClient($client_id)
    {
        /*Пытаемся найти заданную компанию*/
        $client = Client::find($client_id);
        if(is_null($client)) return $this->sendResponse(null, 'Client not found.');

        $companies = ClientRelation::leftJoin('companies', 'companies.id', '=', 'clients_relations.company_id')
            ->select("companies.id", "name", "city_name", "phone", "email", "website", "category", "subcategory")
            ->where("client_id", $client->id)
            ->simplePaginate(10);

        return $this->sendResponse($companies->toArray(), 'Companies retrieved successfully.');
    }
}
