<?php

namespace App\Http\Controllers;

use App\RepositoryInterface\AuthInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  //
  protected $authRepository;
  public function __construct(AuthInterface $authRepository)
  {
    $this->authRepository = $authRepository;
  }
  public function login(Request $request)
  {
    return $this->authRepository->login($request);
  }
  public function logout(Request $request)
  {
    return $this->authRepository->logout($request);
  }
}
