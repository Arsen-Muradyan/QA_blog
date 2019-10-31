<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Question;
use \App\Answer;
use \App\User;
class AnswersController extends Controller
{
   public function __construct() {
      return $this->middleware("auth");
   }
   public function store(Request $request, $id) {
      $data = $request->validate([
         "body"=>"required"
      ]);
      $answer = new Answer($data);
      $answer->username = auth()->user()->name;
      $answer->question_id = $id;
      $answer->save();
      return redirect("/questions/$id");
   }
}
