<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->numerify('company-####'),
            'email' => $this->faker->companyEmail,
            'phone' => "0".$this->faker->randomNumber(9, true),
            'city_name' => $this->faker->randomElement(['Киев', 'Харьков', 'Винница', 'Львов', 'Запорожье']),
            'website' => $this->faker->url,
            'category' => "Аварийные / справочные / экстренные службы",
            'subcategory' => $this->faker->randomElement(['Эвакуация автомобилей', 'Авторемонт и техобслуживание (СТО)', 'Ремонт автоэлектрики', 'Кузовной ремонт', 'Развал / Схождение', "Ремонт / обслуживание климатических систем автомобиля", "Шиномонтаж", "Автомойки"]),
        ];
    }
}
