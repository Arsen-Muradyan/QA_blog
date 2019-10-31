<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Question;
use \App\Answer;
class QuestionsController extends Controller
{
    public function __construct() {
        return $this->middleware("auth", ['except'=>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy("title", 'desc')->paginate(10);
        return view('questions.index')->with([
            "questions"=>$questions,
            "question_page"=>"active"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required',
            "description"=>'required'
        ]);
        $question = new Question($data);
        $question->user_id = auth()->user()->id;
        $question->save();
        return redirect('/questions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('questions.show')->with([
            "question"=>$question,
            "answers"=>$question->answers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        if (auth()->user()->id == $question->user_id) {
            return view('questions.edit')->with([
                "question"=>$question
            ]);
        }
        return redirect("/dashboard");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            "title"=>'required',
            "description"=>'required'
        ]);
        $question = Question::find($id);
        $question->title = $data['title'];
        $question->description = $data['description'];
        $question->save();
        return redirect("/questions/$question->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        if ($question->user_id == auth()->user()->id) {
            $question->delete();
            return redirect("/dashboard");
        }
        return redirect("/dashboard");
    }
}
