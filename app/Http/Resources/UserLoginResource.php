<?php

// app/Http/Resources/UserLoginResource.php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserLoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Define the structure of the transformed resource
        return [
            'id' => $this->id, // Retrieve the user's ID
            'userName' => $this->name, // Retrieve the user's name and alias it as 'username'
            'rol' => isset($this->roles->first()->name) ? $this->roles->first()->name : "No Rol Assigned", // Retrieve the user's role, if available, otherwise default to "No Rol Assigned"
        ];
    }
}
