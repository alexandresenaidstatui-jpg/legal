<?php
// app/Models/Store.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cnpj',
        'phone',
        'email',
        'address',
        'complement',
        'neighborhood',
        'city',
        'state',
        'zip_code',
        'opening_hours',
        'observations',
        'is_active',
        'is_featured',
        'has_local_delivery',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'has_local_delivery' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Validação dos campos (regras para uso em controllers/requests).
     */
    public static function rules($id = null)
    {
        $uniqueCnpj = 'unique:stores,cnpj';
        if ($id) {
            $uniqueCnpj .= ',' . $id;
        }

        return [
            'name' => 'required|string|max:150',
            'cnpj' => "required|string|size:14|{$uniqueCnpj}",
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:100',
            'address' => 'required|string|max:255',
            'complement' => 'nullable|string|max:100',
            'neighborhood' => 'nullable|string|max:100',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:2',
            'zip_code' => 'nullable|string|max:10',
            'opening_hours' => 'nullable|string|max:200',
            'observations' => 'nullable|string',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'has_local_delivery' => 'boolean',
        ];
    }

    /**
     * Escopos para consultas frequentes.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Acessor para formatar o CNPJ.
     */
    public function getFormattedCnpjAttribute()
    {
        return preg_replace(
            '/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/',
            '$1.$2.$3/$4-$5',
            $this->cnpj
        );
    }

    /**
     * Mutator para limpar o CNPJ (apenas números).
     */
    public function setCnpjAttribute($value)
    {
        $this->attributes['cnpj'] = preg_replace('/\D/', '', $value);
    }
}
