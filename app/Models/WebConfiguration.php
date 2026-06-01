<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebConfiguration extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'logo',
        'address',
        'theme_color',
        'map',
        'facebook',
        'instagram',
        'youtube',
        'headmaster_name',
        'headmaster_image',
        'headmaster_message',
        'vision',
        'mission',
        'organization_structure',
        'graduation_datetime',
    ];

    protected $casts = [
        'id' => 'string',
        'graduation_datetime' => 'datetime',
    ];

    public $incrementing = false;

    public function setLogoAttribute($value)
    {
        if ($value) {
            $this->attributes['logo'] = $value->store('assets/web-configurations', 'public');
        }
    }

    public function getLogoAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function setHeadmasterImageAttribute($value)
    {
        if ($value) {
            $this->attributes['headmaster_image'] = $value->store('assets/web-configurations', 'public');
        }
    }

    public function getHeadmasterImageAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function setOrganizationStructureAttribute($value)
    {
        if ($value) {
            $this->attributes['organization_structure'] = $value->store('assets/web-configurations', 'public');
        }
    }

    public function getOrganizationStructureAttribute($value)
    {
        return asset('storage/' . $value);
    }
}
