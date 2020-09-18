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
  public $name;
  public $slug;

  public $edit;

  protected $rules = [
    'name' => 'required|max:80',
    'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:tags',
  ];

  protected $listeners = [
    'nameAdded'
  ];

  public function mount($categoryId=null)
  { 
    $this->edit = isset($categoryId) ? true : false;

    if(isset($categoryId)){
      $category = Category::findOrFail($categoryId);
      $this->name = $category->name;
      $this->slug = $category->slug;
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
