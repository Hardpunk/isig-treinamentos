<?php

namespace App\DataTables;

use App\Plan;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class PlanDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'plans.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Plan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Plan $model)
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
                    //['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    //['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    //['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
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
                'title' => '#ID',
                'searchable' => false,
                'width' => '60px',
                'className' => 'text-center'
            ],
            'title' => [
                'title' => 'Título',
                'searchable' => false,
            ],
            'months' => [
                'data' => 'months',
                'title' => 'Meses',
                'width' => '100px',
                'searchable' => false,
                'orderable' => true,
                'className' => 'text-center',
            ],
            'amount' => [
                'data' => 'amount',
                'title' => 'Valor',
                'width' => '120px',
                'searchable' => false,
                'orderable' => true,
                'className' => 'text-center',
                'render' => function() {
                    return 'function ( data, type, row ) {
                        return parseFloat(data).toLocaleString("pt-br",{style: "currency", currency: "BRL"});
                    }';
                },
            ],
            'installment_amount' => [
                'data' => 'installment_amount',
                'title' => 'Valor Parcelado',
                'width' => '150px',
                'searchable' => false,
                'orderable' => true,
                'className' => 'text-center',
                'render' => function() {
                    return 'function ( data, type, row ) {
                        return parseFloat(data).toLocaleString("pt-br",{style: "currency", currency: "BRL"});
                    }';
                },
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
        return 'plans_datatable_' . time();
    }
}
