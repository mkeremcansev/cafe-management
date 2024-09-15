<?php

namespace Tests\Unit\Requests;

use App\Http\Requests\MoveTableRequest;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class MoveTableRequestTest extends TestCase
{
    /**
     * @see \App\Http\Requests\MoveTableRequest::rules()
     */
    #[Test]
    public function all_attributes_must_be_validated_moving_a_table(): void
    {
        $request = new MoveTableRequest();

        $this->assertEquals([
            'table_id' => ['required', 'integer', 'exists:tables,id'],
        ], $request->rules());

        $this->assertTrue($this->getAccessiblePropertyForTesting($request, 'stopOnFirstFailure'));
    }
}
