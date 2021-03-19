<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('companies.index', ['companies' => Company::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create',
            [
                'categories' => ['Аварийные / справочные / экстренные службы'],
                'subcategories' => ['Эвакуация автомобилей', 'Авторемонт и техобслуживание (СТО)', 'Ремонт автоэлектрики', 'Кузовной ремонт', 'Развал / Схождение', "Ремонт / обслуживание климатических систем автомобиля", "Шиномонтаж", "Автомойки"]
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:companies|max:255',
            'city_name' => 'required|max:255',
            'phone' => 'required|digits:10',
            'email' => 'required|email|max:255',
            'website' => 'required|url|max:255',
            'category' => 'required|max:255',
            'subcategory' => 'required|max:255',
        ]);

        $company = new Company();

        $company->name = $validated["name"];
        $company->city_name = $validated["city_name"];
        $company->phone = $validated["phone"];
        $company->email = $validated["email"];
        $company->website = $validated["website"];
        $company->category = $validated["category"];
        $company->subcategory = $validated["subcategory"];

        $company->save();

        return redirect('admin/companies')->with("success", __("messages.success_create_company"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('companies.edit',
            [
                'company' => Company::find($id),
                'categories' => ['Аварийные / справочные / экстренные службы'],
                'subcategories' => ['Эвакуация автомобилей', 'Авторемонт и техобслуживание (СТО)', 'Ремонт автоэлектрики', 'Кузовной ремонт', 'Развал / Схождение', "Ремонт / обслуживание климатических систем автомобиля", "Шиномонтаж", "Автомойки"]
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'city_name' => 'required|max:255',
            'phone' => 'required|digits:10',
            'email' => 'required|email|max:255',
            'website' => 'required|url|max:255',
            'category' => 'required|max:255',
            'subcategory' => 'required|max:255',
        ]);

        $company = Company::find($id);

        $company->name = $validated["name"];
        $company->city_name = $validated["city_name"];
        $company->phone = $validated["phone"];
        $company->email = $validated["email"];
        $company->website = $validated["website"];
        $company->category = $validated["category"];
        $company->subcategory = $validated["subcategory"];

        $company->save();

        return redirect('admin/companies')->with("success", __("messages.success_edit_company"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if ($company) {
            $company->delete();
        }
        return redirect()->back()->with("success", __("messages.success_delete_company"));
    }
}
