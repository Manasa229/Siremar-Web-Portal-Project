<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'schools','residents','inspectors','getAllChats','updateResident','chats','updateInspector','schoolsReportInspectors','clinicssReportInspectors','businessesReportInspectors','flightsReportInspectors','ferryReportInspectors',
        'eventsReportInspectors','moveouts','updateMoveout','schoolsReport','updateSchool','clinics','updateClinic','businesses','updateBusiness','flights','updateFlight','ferry','updateFerry','events','updateEvent','users','login','counties','updateCounty','userBenefits'
    ];
}
