<?php

namespace App\Http\Livewire\Admin\Articles;

use Livewire\Component;
use Livewire\WithFileUploads;

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
  use WithFileUploads;

  public $article;
  public $categories;
  public $series;
  public $defaultTags;

  public $title;
  public $description;
  public $body;
  public $slug;
  public $image;
  public $temp_image;
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
    'temp_image' => 'image|max:2048|nullable',
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
    'imageUploaded','publishClicked'
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

  public function publishClicked($editorJs, $readData)
  { 
    $this->body = $editorJs;
    $readMinutes = (new ReadTime($readData, $omitSeconds = true, $abbreviated = false, $wordsPerMinute = 190))->toArray()['minutes'];

    if ($readMinutes > 1) {
      $readMinutes .= ' minutes';
    } else {
      $readMinutes .= ' minute';
    }

    $this->read_minutes = $readMinutes;

    $this->author_id = current_admin()->id;
    
    if ($this->edit) {
      $data = $this->validate([
        'title' => 'required|max:80',
        'description' => 'required|max:200',
        'temp_image' => 'image|max:2048|nullable',
        'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:articles,slug,'.$this->article->id,
        'body' => 'required',
        'category_id' => 'required',
        'series_id' => 'nullable',
        'read_minutes' => 'nullable',
        'publish_date' => 'required',
        'published' => 'required',
        'featured' => 'required',
        'trending' => 'required',
      ]);
    } else {
      $data = $this->validate($this->rules);
    }

    if (is_object($data['temp_image'])) {
      if ($this->image) {
        //delete old Image
        Storage::delete('public/' . $this->image);
      }

      $imagePath = $this->temp_image->store('public/image/articles');
      $data['image'] = str_replace('public/', '', $imagePath);
    }

    if($this->edit){
      $this->article->update($data);
      session()->flash('success', 'Article successfully updated.');
    } else {
      $this->article = Article::create($data);
      session()->flash('success', 'Article successfully created.');
    }
    
    $this->article->tags()->sync($this->tags);

    return redirect()->route('admin.articles.edit', $this->article->id);
    // return redirect()->route('admin.articles.index');
  }

  public function render()
  {
    return view('livewire.admin.articles.article-form');
  }
}
