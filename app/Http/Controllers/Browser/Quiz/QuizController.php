<?php

namespace App\Http\Controllers\Browser\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Quiz;
use Illuminate\Http\Request;
use SEOTools;

class QuizController extends Controller
{
    public const PATH = 'browser.quizzes.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metas = Page::where('name', 'Meta')->first();
        $metas = unserialize($metas->content);

        SEOTools::setTitle('Quiz &middot; ' . config('app.name'));
        SEOTools::setDescription($metas[1]['content']);
        SEOTools::setCanonical(route('browser.quizzes.index'));

        SEOTools::opengraph()->setUrl(route('browser.quizzes.index'));
        SEOTools::opengraph()->addProperty('type', 'articles');

        SEOTools::twitter()->setSite('@sherwinchia');
        SEOTools::twitter()->setUrl(route('browser.quizzes.index'));

        SEOTools::jsonLd()->setType('Article');

        $quizzes = Quiz::all();

        return view(self::PATH . 'index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function do($id)
    {
        # code...
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        $metas = Page::where('name', 'Meta')->first();
        $metas = unserialize($metas->content);

        SEOTools::setTitle('Quiz &middot; ' . config('app.name'));
        SEOTools::setDescription($metas[1]['content']);
        SEOTools::setCanonical(route('browser.quizzes.show', $quiz->id));

        SEOTools::opengraph()->setUrl(route('browser.quizzes.show', $quiz->id));
        SEOTools::opengraph()->addProperty('type', 'articles');

        SEOTools::twitter()->setSite('@sherwinchia');
        SEOTools::twitter()->setUrl(route('browser.quizzes.show', $quiz->id));

        SEOTools::jsonLd()->setType('Article');

        return view(self::PATH . 'show', compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
