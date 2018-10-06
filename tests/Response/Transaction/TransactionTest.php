<?php

namespace Nascom\ItsmeApiClient\Tests\Response\Transaction;

use Nascom\ItsmeApiClient\Response\Transaction\Transaction;
use Nascom\ItsmeApiClient\Tests\Data\SampleResponses;
use PHPUnit\Framework\TestCase;

class TransactionTest extends TestCase
{
    /**
     * @dataProvider keyAndGetterProvider
     */
    public function testItExtractsTransactionData($dataKey, $getter)
    {
        $data = $this->sampleTransactionData();

        $transaction = Transaction::fromArray($data);

        $this->assertEquals($data[$dataKey], $transaction->$getter());
    }

    public function keyAndGetterProvider()
    {
        return [
            'parses transaction token' => ['transactionToken', 'getToken'],
            'parses authentication URL' => ['authenticationUrl', 'getAuthenticationUrl']
        ];
    }

    private function sampleTransactionData()
    {
        return SampleResponses::transaction();
    }
}
