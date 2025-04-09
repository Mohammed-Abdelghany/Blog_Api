<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\RepositoryInterface\PostInterface;
use Illuminate\Http\Request;
use App\Http\Resources\postsresource;
use Illuminate\Support\Facades\Auth;




class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   * 
   * 
   */
  protected $postInterface;
  public function __construct(PostInterface $postInterface)
  {
    $this->postInterface = $postInterface;
  }
  public function index()
  {
    //
    $posts = $this->postInterface->getAllPosts();
    return postsresource::collection($posts);
  }


  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
    $data = $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required|string',
    ]);
    if(!Auth::check()) {
      return response()->json(['message' => 'Unauthorized'], 401);
    }

    $data['user_id'] = Auth::id();
    return $this->postInterface->createPost($data);
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    $post = $this->postInterface->getPostById($id);
    if (!$post) {
      return response()->json(['message' => 'Post not found'], 404);
    }
    return new postsresource($post);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    //
    $post = Post::find($id);
    $data = $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required|string',
    ]);
    return $this->postInterface->updatePost($post->id, $data);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy($id)
  {
    //

    return $this->postInterface->deletePost($id);
  }
}
