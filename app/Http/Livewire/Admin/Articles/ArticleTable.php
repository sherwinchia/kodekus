<?php

namespace App\Http\Livewire\Admin\Articles;

use App\Models\Article;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Link;
use Rappasoft\LaravelLivewireTables\TableComponent;

class ArticleTable extends TableComponent
{
  public $checkbox = true;


  public function query() : Builder
  {
      return Article::query();
  }

  public function columns() : array
  {
      return [
          Column::make('ID','id')
              ->searchable()
              ->sortable(),
          Column::make('Title')
              ->searchable()
              ->sortable(),
          Column::make('Published')
              ->searchable()
              ->sortable(),
              Column::make('Actions')
              ->components([
                  Link::make(false) 
                      ->icon('fas fa-pencil-alt')
                      ->class('btn btn-primary btn-sm')
                      ->href(function($model) {
                          return route('admin.articles.edit', $model->id);
                      }),
                  Link::make(false)
                      ->icon('fas fa-trash')
                      ->class('btn btn-danger btn-sm')
                      ->setAttribute('data-method', 'delete') // Javascript takes over and injects a hidden form
                      ->setAttribute('id', 'delete_article')
                      ->href(function($model) {
                          return route('admin.articles.delete', $model->id);
                      }),
              ]),
      ];
  }
}