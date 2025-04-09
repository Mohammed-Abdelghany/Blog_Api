<?php

namespace App\RepositoryInterface;

use Illuminate\Http\Request;

interface AuthInterface
{
  public function login(Request $request);
  public function logout(Request $request);
}
