<?php

namespace App\Http\Livewire\Admin\Series;

use Livewire\Component;
use App\Models\Series;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Facades\Validator;

class SeriesForm extends Component
{
  public $series;

  public $name;
  public $slug;

  public $buttonText = 'Create';
  public $edit;

  protected $rules = [
    'name' => 'required|max:80',
    'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:series',
  ];

  public function mount($seriesId=null)
  { 
    $this->edit = isset($seriesId) ? true : false;

    if(isset($seriesId)){
      $this->series = Series::findOrFail($seriesId);
      $this->name = $this->series->name;
      $this->slug = $this->series->slug;
      $this->buttonText = 'Update';
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

  public function submit()
  {
    if ($this->edit) {
      $data = $this->validate([
        'name' => 'required|max:80',
        'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:series,slug,'.$this->series->id,
      ]);
    } else {
      $data = $this->validate($this->rules);
    }
    

    if($this->edit){
      $this->series->update($data);
      session()->flash('success', 'Series successfully updated.');
      return redirect()->route('admin.series.index');
    }else{
      Series::create([
        'name' => $this->name,
      ]);
      session()->flash('success', 'Series successfully created.');
      return redirect()->route('admin.series.index');
    }
  }

  public function render()
  {
      return view('livewire.admin.series.series-form');
  }
}
