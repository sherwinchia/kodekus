<?php

namespace App\Http\Livewire\Admin\Articles;

use Livewire\Component;
use App\Models\Article;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Validator;

class ArticleForm extends Component
{
  // public $article;
  public $title;
  public $description;
  public $body;
  public $content;
  public $slug;
  public $image;
  public $published;
  public $featured;
  public $trending;


  protected $rules = [
    'title' => 'required|max:80',
    'description' => 'required|max:200',
    'image' => 'required',
    'slug' => 'required|regex:/^[a-z0-9-]+$/',
    'body' => 'required',
    'content' => 'required|present|array',
  ];

  protected $listeners = [
    'imageUploaded','publishClicked','titleAdded'
  ];

  public function mount($articleId)
  { 
    
    $article = Article::findOrFail($articleId);
    $this->title = $article->title;
    $this->slug = $article->slug;
    $this->subtitle = $article->subtitle;
    $this->description = $article->description;
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
    $this->content = $editorJs['blocks'];
    $this->body =json_encode($editorJs);
    $this->validate($this->rules);
    // $image = $this->storeImage();
  }

  public function render()
  {
    return view('livewire.admin.articles.article-form');
  }
}
