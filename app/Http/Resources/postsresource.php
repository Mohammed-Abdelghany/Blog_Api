<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class postsresource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'status' => 'success',
      'id' => $this->id,
      'title' => $this->title,
      'content' => $this->content,
      'user_id' => $this->user_id,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,
    ];
  }
}
