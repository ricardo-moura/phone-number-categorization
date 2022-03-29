<?php

namespace Tests\Unit;

use App\Services\PhoneListService;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    /**
     * UnitOfWork_StateUnderTest_ExpectedBehavior
     * ActionVerb_WhoOrWhatToDo_ExpectedBehavior
     * check_if_user_column_is_correct
     *
     * @return void
     */

    /** @test */
    public function should_get_phone_list()
    {
        $phoneList = new PhoneListService();
        $this->assertTrue(true);
    }
}
