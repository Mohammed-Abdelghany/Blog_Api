<?php

namespace App\RepositoryInterface;

use App\Models\Post;
use Illuminate\Http\Request;

interface PostInterface
{
  public function getAllPosts();
  public function getPostById($id);
  public function createPost(array $data);
  public function updatePost($id, array $data);
  public function deletePost(Request $id);
}
