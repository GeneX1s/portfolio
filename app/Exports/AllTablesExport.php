<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AllTablesExport implements WithMultipleSheets
{
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function sheets(): array
    {
        return [
            new TransactionsExport($this->request),
            new UsersExport($this->request),
            new BalanceExport($this->request),
            new MemberExport($this->request),
            new TeacherExport($this->request),
            new ScheduleExport($this->request),
            new ClassExport($this->request),
            new FeatureExport($this->request),
            new ParticipantExport($this->request),
            // Add more exports here
        ];
    }
}
