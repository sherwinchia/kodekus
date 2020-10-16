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

  public $buttonText = 'Create';
  public $edit;

  protected $rules = [
    'name' => 'required|max:80',
  ];

  public function mount($seriesId=null)
  { 
    $this->edit = isset($seriesId) ? true : false;

    if(isset($seriesId)){
      $this->series = Series::findOrFail($seriesId);
      $this->name = $this->series->name;
      $this->buttonText = 'Update';
    }
  }

  public function submit()
  {
    if ($this->edit) {
      $data = $this->validate([
        'name' => 'required|max:80',
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
