<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class UnregisteredUserDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'users.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()
            ->with('profile')
            ->whereDoesntHave('payments', function($q) {
                $q->where('status', 'paid');
            });
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
            ->parameters([
                'language' => [
                    'url' => '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json',
                ],
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner'],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner'],
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
            'email' => [
                'data' => 'email',
                'title' => 'E-mail',
                'searchable' => true,
                'orderable' => true,
            ],
            'profile.document_number' => [
                'data' => 'profile.document_number',
                'title' => 'CPF',
                'searchable' => true,
                'orderable' => false,
            ],
            'profile.phone' => [
                'data' => 'profile.phone',
                'title' => 'Telefone',
                'searchable' => false,
                'orderable' => false
            ],
            'created_at' => [
                'data' => 'created_at',
                'title' => 'Data criação',
                'width' => '150px',
                'searchable' => false,
                'orderable' => true,
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
        return 'alunos_nao_matriculados_' . time();
    }
}
