<?php

namespace App\DataTables;

use App\Models\UserScan;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon;

class ScanDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('guest', function(UserScan $userScan) {
                return $userScan->user->name;
            })
            ->addColumn('time_scan', function(UserScan $userScan) {
                return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $userScan->created_at);
            })
            ->addColumn('action', function(UserScan $userScan) {
                $infoButton = '<button type="button" class="btn btn-primary"><i class="fas fa-info-circle"></i></button>';
                return $infoButton;
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Scan $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserScan $model)
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
                    ->setTableId('scan-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('print'),
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('guest'),
            Column::make('time_scan'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(180)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Scan_' . date('YmdHis');
    }
}
