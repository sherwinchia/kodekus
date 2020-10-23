<?php

namespace App\Http\Livewire\Browser\Partials;

use Livewire\Component;

use App\Models\Newsletter;

class SubscribeComponent extends Component
{
  public $name;
  public $email;

  public $success_message;

  protected $rules= [
    'name' => 'required|max:80',
    'email' => 'required|email|unique:newsletters'
  ];

  public function mount()
  {
    $user  = current_user();

    if ($user) {
      $this->name = $user->full_name;
      $this->email = $user->email;
    }
  }

  public function subscribe()
  {
    $this->success_message = null;
    $data = $this->validate($this->rules);

    // $full_name = $this->split_name($data['name']);
    // $data['first_name'] = $full_name[0];
    // $data['last_name'] = $full_name[1];

    $newsletter = Newsletter::create($data);
    
    if (current_user()) {
      $newsletter->update(['user_id' => current_user()->id]);
    }
    
    $this->name = null;
    $this->email = null;
    $this->success_message = 'Selamat anda telah terdaftar dalam list.';
  }

  public function split_name($name) 
  {
    $name = trim($name);
    $last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
    $first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
    return array($first_name, $last_name);
  }

  public function render()
  {
      return view('livewire.browser.partials.subscribe-component');
  }
}
