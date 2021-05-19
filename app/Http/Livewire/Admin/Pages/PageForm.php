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

  //Meta
  public $metas;

  //About
  public $about;

  protected $listeners = [
    'refreshComponent' => '$refresh',
    'updateAbout'
  ];

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

    if ($this->type == 'About') {
      $this->about = $this->content;
    }

    if ($this->type == 'Meta') {
      $this->metas = $this->content;
    }
  }

  public function addSocial()
  {
    $data = array(
      'name' => '',
      'icon' => '',
      'color' => '',
      'link' => ''
    );
    array_push($this->socials, $data);
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
      'socials.*.display' => 'boolean',
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

  public function updateAbout($data)
  {
    $this->successMsg = null;

    // $data = $this->validate([
    //   'about' => 'nullable'
    // ]);

    $this->content = $data;

    $this->page->update([
      'content' => serialize($this->content),
    ]);

    return $this->successMsg = 'About successfully updated.';
  }

  public function updateMeta()
  {
    $this->successMsg = null;

    $data = $this->validate([
      'metas.*.name' => 'required',
      'metas.*.content' => 'required'
    ]);

    $this->content = $data['metas'];

    $this->page->update([
      'content' => serialize($this->content),
    ]);

    return $this->successMsg = 'Social successfully updated.';
  }

  public function render()
  {
    return view('livewire.admin.pages.page-form');
  }
}
