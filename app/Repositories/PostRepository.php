<?php

namespace App\Repositories;

use App\RepositoryInterface\PostInterface;
use \Repository\RepositoryInterface;
use App\Models\Post;
use Illuminate\Http\Request;

class PostRepository implements PostInterface
{
  public function getAllPosts()
  {
    return Post::all();
  }

  public function getPostById($id)
  {
    return Post::find($id);
  }

  public function createPost(array $data)
  {
    if (Post::create($data)) {
      return response()->json([
        'status' => true,
        'message' => 'Post created successfully.',
        'post' => $data
      ], 201);
    }
  }

  public function updatePost($id, array $data)
  {
    $post = Post::find($id);

    if (!$post) {
      return response()->json([
        'status' => false,
        'message' => 'Post not found.'
      ], 404);
    }

    $post->update($data);

    return response()->json([
      'status' => true,
      'message' => 'Post updated successfully.',
      'post' => $post
    ], 200);
  }


  public function deletePost($id)
  {
    $post = Post::find($id);
    if ($post) {
      $post->delete();
      return response()->json(['message' => 'Post deleted successfully'], 200);
    }
    return response()->json(['message' => 'Post not found'], 404);
  }
}
