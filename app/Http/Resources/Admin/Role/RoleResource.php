<?php

namespace App\Http\Resources\Admin\Role;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $argc = '';
        if (!empty($this->roleAction)) {
            $date = [];
            foreach ($this->roleAction as $value) {
                $date[] = $value['action_id'];
            }
            $argc = implode(',', $date);
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'action_id' => $argc,
            'created_at' => !empty($this->created_at) ? $this->created_at->format('Y-m-d H:i:s') : '',
        ];
    }
}
