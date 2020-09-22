<?php

namespace App\Http\Livewire\Admin\Articles;

use Livewire\Component;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Validator;

class ArticleForm extends Component
{
  public $article;
  public $categories;
  public $tags;

  public $title;
  public $description;
  public $body;
  public $content;
  public $slug;
  public $image;
  public $category;
  public $tag;
  public $publish_date;
  public $published = 0;
  public $featured = 0;
  public $trending = 0;
  public $author_id;


  public $edit;

  protected $rules = [
    'title' => 'required|max:80',
    'description' => 'required|max:200',
    'image' => 'nullable',
    'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:articles',
    'body' => 'required',
    'content' => 'required|present|array', 
    'category' => 'required',
    'tag' => 'required',
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
    // dd(isset($articleId));
    $this->edit = isset($articleId) ? true : false;

    if(isset($articleId)){
      $this->article = Article::findOrFail($articleId);
      $this->title = $this->article->title;
      $this->slug = $this->article->slug;
      $this->subtitle = $this->article->subtitle;
      $this->description = $this->article->description;
      $this->image = $this->article->image;
      $this->category = $this->article->category;
      $this->tag = $this->article->tag;
      $this->publish_date = $this->article->publish_date;
      $this->published = $this->article->published;
      $this->featured = $this->article->featured;
      $this->trending = $this->article->trending;
    }

    $this->categories = Category::all();
    $this->tags = Tag::all();
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
    $this->author_id = 1;

    if ($this->edit) {
      $data = $this->validate([
        'title' => 'required|max:80',
        'description' => 'required|max:200',
        'image' => 'nullable',
        'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:articles,slug,'.$this->article->id,
        'body' => 'required',
        'content' => 'required|present|array', 
        'category' => 'required',
        'tag' => 'required',
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

    if($this->edit){
      $this->article->update($data);
      session()->flash('success', 'Article successfully updated.');
      return redirect()->route('admin.articles.index');
    } else {
      $article = Article::create($data);
      session()->flash('success', 'Article successfully created.');
      return redirect()->route('admin.articles.index');
    }


    // $image = $this->storeImage();
  }

  public function render()
  {
    return view('livewire.admin.articles.article-form');
  }
}
