<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientRelation extends Model
{
    use HasFactory;

    protected $table = 'clients_relations';

    /**
     * Get the relation associated with the company.
     */
    public function companies()
    {
        return $this->belongsTo(Company::class, "company_id", "id");
    }

    public function clients(){
        return $this->belongsTo(Client::class, "client_id", "id");
    }
}
