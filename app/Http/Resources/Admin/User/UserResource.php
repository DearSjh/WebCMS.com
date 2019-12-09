<?php

namespace App\Http\Resources\Admin\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $roleName = '';
        if (!empty($this->userRole)) {
            $userRole = $this->userRole->toArray();
            $roleName = $userRole['0']['name'] ?? '';
        }
        return [
            'id' => $this->id,
            'user_name' => $this->user_name,
            'role_name' => $roleName,
            'status' => ($this->status == 1) ? '正常' : '禁用',
            'created_at' => !empty($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '',
        ];
    }
}
