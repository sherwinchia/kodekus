<?php

namespace App\Http\Livewire\Admin\Tags;

use Livewire\Component;
use App\Models\Tag;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Validator;

class TagForm extends Component
{
  public $tag;

  public $name;
  public $slug;

  public $buttonText = 'Create';
  public $edit;

  protected $rules = [
    'name' => 'required|max:80',
    'slug' => 'required|regex:/^[a-z0-9-]+$/',
  ];

  protected $listeners = [
    'nameAdded'
  ];

  public function mount($tagId=null)
  { 
    $this->edit = isset($tagId) ? true : false;

    if(isset($tagId)){
      $this->tag = Tag::findOrFail($tagId);
      $this->name = $this->tag->name;
      $this->slug = $this->tag->slug;
      $this->buttonText = 'Update';
    }
  }

  public function submit()
  {
    if ($this->edit) {
      $data = $this->validate([
        'name' => 'required|max:80',
        'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:tags,slug,'.$this->tag->id,
      ]);
    } else {
      $data = $this->validate($this->rules);
    }

    if($this->edit){
      $this->tag->update($data);
      session()->flash('success', 'Tag successfully updated.');
      return redirect()->route('admin.tags.index');
    }else{
      Tag::create([
        'name' => $this->name,
        'slug' => $this->slug
      ]);
      session()->flash('success', 'Tag successfully created.');
      return redirect()->route('admin.tags.index');
    }
  }

  public function nameAdded()
  {
    $slug = $this->name;
    if(isset($slug)){
      $slug = strtolower(str_replace(' ','-',$slug));
      $slug = preg_replace('/[^A-Za-z0-9\-]/', "",$slug);
      $this->slug = $slug;
    } 
  }

  public function render()
  {
      return view('livewire.admin.tags.tag-form');
  }
}
