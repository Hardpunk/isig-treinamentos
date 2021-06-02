<?php

namespace App\DataTables;

use App\Models\Affiliate;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class AffiliateDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'affiliates.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Affiliate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Affiliate $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction([
                'width' => '120px',
                'title' => 'Ações',
                'className' => 'text-center',
                'printable' => false,
            ])
            ->parameters([
                'language' => [
                    'url' => '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json',
                ],
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    // ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => [
                'data' => 'id',
                'title' => '#ID',
                'width' => '60px',
                'searchable' => false,
                'orderable' => true,
                'className' => 'text-center',
            ],
            'name' => [
                'data' => 'name',
                'title' => 'Nome',
                'searchable' => true,
                'orderable' => true,
            ],
            'slug' => [
                'data' => 'slug',
                'title' => 'Código do afiliado',
                'searchable' => true,
                'orderable' => false,
                'render' => function() {
                    return 'function ( data, type, row ) {
                        return "<p class=\"m-0\">'.config('app.url').'/?f=" + data + " <a href=\"'.config('app.url').'/?f=" + data + "\" class=\"btn btn-xs btn-success ml-3 copy\">Copiar link</a></p>";
                    }';
                },
            ],
            'times_used' => [
                'data' => 'times_used',
                'title' => 'Qtdes. usadas',
                'width' => '180px',
                'searchable' => false,
                'orderable' => false,
                'className' => 'text-center',
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'affiliates_datatable_' . time();
    }
}
