<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Organization
 */
class OrganizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'country_id' => $this->country_id,
            'code' => $this->code,
            'phone' => $this->phone,
            'fax' => $this->fax,
            'delivery_point' => $this->delivery_point,
            'city' => $this->city,
            'postal_code' => $this->postal_code,
            'email' => $this->email,
            'web_site' => $this->web_site,
        ];
    }
}
