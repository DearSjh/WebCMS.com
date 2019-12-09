<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/api/article/detail/2721')
            ->seeJsonStructure([
                'code', "message", 'data' => ["content"]
            ]);
    }

    function sign(array $param, $secretKey)
    {
        ksort($param);

        $valueString = '';
        foreach ($param as $value) {
            $valueString .= $value;
        }

        return md5(md5($valueString) . $secretKey);
    }

}
