<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'password' => $this->password,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'dob' => $this->dob, // Need format to yyyy-mm-dd
            'role_id' => $this->role_id,
            'last_login' => $this->last_login,
            'user_create_date' => $this->user_create_date,
            'user_update_date' => $this->user_update_date,
        ];
    }
}
