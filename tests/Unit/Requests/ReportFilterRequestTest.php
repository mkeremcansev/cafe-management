<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ReportFilterRequest;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ReportFilterRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\ReportFilterRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_while_a_filtering_report(): void
    {
        $request = new ReportFilterRequest();

        $this->assertEquals([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'filter_type' => 'nullable|string',
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
