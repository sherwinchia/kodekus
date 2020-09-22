<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Validator;

class CategoryForm extends Component
{
  public $category;

  public $name;
  public $slug;

  public $edit;

  protected $rules = [
    'name' => 'required|max:80',
    'slug' => 'required|regex:/^[a-z0-9-]+$/',
  ];

  protected $listeners = [
    'nameAdded'
  ];

  public function mount($categoryId=null)
  { 
    $this->edit = isset($categoryId) ? true : false;

    if(isset($categoryId)){
      $this->category = Category::findOrFail($categoryId);
      $this->name = $this->category->name;
      $this->slug = $this->category->slug;
    }
  }

  public function submit()
  {
    if ($this->edit) {
      $data = $this->validate([
        'name' => 'required|max:80',
        'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:categories,slug,'.$this->category->id,
      ]);
    } else {
      $data = $this->validate($this->rules);
    }
    

    if($this->edit){
      $this->category->update($data);
      session()->flash('success', 'Category successfully updated.');
      return redirect()->route('admin.categories.index');
    }else{
      Category::create([
        'name' => $this->name,
        'slug' => $this->slug
      ]);
      session()->flash('success', 'Category successfully created.');
      return redirect()->route('admin.categories.index');
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
      return view('livewire.admin.categories.category-form');
  }
}
