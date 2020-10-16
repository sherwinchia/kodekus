<?php

namespace App\Http\Livewire\Admin\Articles;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use App\Models\Series;
use App\Models\Tag;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Validator;
use Mtownsend\ReadTime\ReadTime;

class ArticleForm extends Component
{
  public $article;
  public $categories;
  public $series;
  public $defaultTags;

  public $title;
  public $description;
  public $body;
  public $slug;
  public $image;
  public $category_id;
  public $series_id;
  public $read_minutes;
  public $tags;
  public $publish_date;
  public $published = 0;
  public $featured = 0;
  public $trending = 0;
  public $author_id;

  public $buttonText = 'Create';
  public $edit;

  protected $rules = [
    'title' => 'required|max:80',
    'description' => 'required|max:200',
    'image' => 'nullable',
    'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:articles',
    'body' => 'required',
    'category_id' => 'required',
    'series_id' => 'nullable',
    'read_minutes' => 'nullable',
    'publish_date' => 'required',
    'author_id' => 'required',
    'published' => 'required',
    'featured' => 'required',
    'trending' => 'required',
  ];

  protected $listeners = [
    'imageUploaded','publishClicked','titleAdded'
  ];

  public function mount($articleId=null)
  { 
    $this->edit = isset($articleId) ? true : false;

    if(isset($articleId)){
      $this->article = Article::findOrFail($articleId);
      $this->title = $this->article->title;
      $this->slug = $this->article->slug;
      $this->subtitle = $this->article->subtitle;
      $this->description = $this->article->description;
      $this->image = $this->article->image;
      $this->category_id = $this->article->category_id;
      $this->series_id = $this->article->series_id;
      $this->tags = $this->article->tags->pluck('id')->toArray();
      $this->publish_date = $this->article->publish_date;
      $this->published = $this->article->published;
      $this->featured = $this->article->featured;
      $this->trending = $this->article->trending;
      $this->buttonText = 'Update';
    }

    $this->series = Series::all();
    $this->categories = Category::all();
    $this->defaultTags = Tag::all();
  }

  public function titleAdded()
  {
    $slug = $this->title;
    if(isset($slug)){
      $slug = strtolower(str_replace(' ','-',$slug));
      $slug = preg_replace('/[^A-Za-z0-9\-]/', "",$slug);
      $this->slug = $slug;
    } 
  }

  public function imageUploaded($imageData)
  {
      $this->image = $imageData;
  }

  public function storeImage()
  {
      if(!$this->image)return null;

      $img = ImageManagerStatic::make($this->image)->encode('jpg');
      $name = Str::random().'.jpg';
      Storage::disk('public')->put($name,$img);
      return $name;
      
  }

  public function publishClicked($editorJs)
  { 
    $this->body =json_encode($editorJs);
    
    $readMinutes = (new ReadTime($this->body, $omitSeconds = true, $abbreviated = false, $wordsPerMinute = 210))->toArray()['minutes'];

    if ($readMinutes > 1) {
      $readMinutes .= ' minutes';
    } else {
      $readMinutes .= ' minute';
    }

    $this->read_minutes = $readMinutes;

    $this->author_id = 1;

    if ($this->edit) {
      $data = $this->validate([
        'title' => 'required|max:80',
        'description' => 'required|max:200',
        'image' => 'nullable',
        'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:articles,slug,'.$this->article->id,
        'body' => 'required',
        'category_id' => 'required',
        'series_id' => 'nullable',
        'read_minutes' => 'nullable',
        'publish_date' => 'required',
        'author_id' => 'required',
        'published' => 'required',
        'featured' => 'required',
        'trending' => 'required',
      ]);
    } else {
      $data = $this->validate($this->rules);
    }
    // $data['publish_date'] = Carbon::parse($data['publish_date']);
    // dd(date_to_human($data['publish_date']));

    if($this->edit){
      $this->article->update($data);
      session()->flash('success', 'Article successfully updated.');
    } else {
      $this->article = Article::create($data);
      session()->flash('success', 'Article successfully created.');
      
    }
    

    $this->article->tags()->sync($this->tags);
    return redirect()->route('admin.articles.index');

    // $image = $this->storeImage();
  }

  public function render()
  {
    return view('livewire.admin.articles.article-form');
  }
}
