<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Livewire\Component;

class PageForm extends Component
{
  //Generic
  public $page;
  public $content;
  public $successMsg;

  //Form type
  public $type;

  //Socials
  public $socials;

  //Comment
  public $comment_approval;

  protected $listeners = ['refreshComponent' => '$refresh'];

  public function mount($pageId, $pageType)
  {
    $this->page = Page::find($pageId);
    $this->type = $pageType;
    $this->content  = unserialize($this->page->content);
    


    if ($this->type == 'Social') {
      $this->socials = $this->content;
      // dd($this->content);
    }

    if ($this->type == 'Comment') {
      $this->comment_approval = $this->content['comment_approval'];
    }
  }

  public function addSocial()
  {
    $data= array(
      'name' => '',
      'icon' => '',
      'color' => '',
      'link' => ''
    );
    array_push($this->socials ,$data);
    $this->emitSelf('refreshComponent');
  }

  public function removeSocial($index)
  {
    unset($this->socials[$index]);
    // dd($this->socials);
  }

  public function updateSocial()
  {
    $this->successMsg = null;

    $data = $this->validate([
      'socials.*.name' => 'required|string',
      'socials.*.icon' => 'required|string',
      'socials.*.color' => 'required|string',
      'socials.*.link' => 'required|url',
    ]);

    $this->content = $data['socials'];

    $this->page->update([
      'content' => serialize($this->content),
    ]);

    return $this->successMsg = 'Social successfully updated.';
  }

  public function updateComment()
  {
    $this->successMsg = null;

    $data = $this->validate([
      'comment_approval' => 'nullable'
    ]);

    $this->content = $data;

    $this->page->update([
      'content' => serialize($this->content),
    ]);

    return $this->successMsg = 'Comment successfully updated.';
  }

  public function render()
  {
    return view('livewire.admin.pages.page-form');
  }
}
