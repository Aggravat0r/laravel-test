<?php

namespace App\Http\Controllers\API;

use App\Models\Company;

class CompaniesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $companies = Company::select("id", "name", "city_name", "phone", "email", "website", "category", "subcategory")->simplePaginate(10);
        return $this->sendResponse($companies->toArray(), 'Companies retrieved successfully.');
    }
}
