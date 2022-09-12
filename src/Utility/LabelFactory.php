<?php

namespace App\Utility;

use Cake\Chronos\Chronos;
use Faker\Factory;

class LabelFactory
{

    public function __construct(protected string $type = 'socket')
    {
    }

    public function make($count = 1)
    {
        $data = [];

        for ($i = 1; $i <= $count; $i++) {
            $data[] = (new LabelFactory($this->type))->get($i);
        }

        return $data;
    }

    public function get($serial = 1)
    {
        $faker = Factory::create();
        /**
         * @var \Faker\Provider\FakeBarcode
         */
        $faker->addProvider(new \Faker\Provider\FakeBarcode($faker));
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));

        $bestBefore = Chronos::now()->addMinutes($faker->randomNumber(6));

        return [
            'company_name' => $faker->company,
            'product_name' => $faker->productName,
            'qty' => $faker->randomElement([128, 120, 125, 100, 96, 84, 80, 60, 64, 52, 48]),
            'sscc' => $faker->sscc(null),
            'gtin' => $faker->gtin14(null),
            'batch' => $faker->numerify('######'),
            'best_before_human_readable' => $bestBefore->format('d.m.y'),
            'best_before_barcode' => $bestBefore->format('ymd'),
            'label_copies' => 2,
            'output_filename' => $this->type . '-' .
                Chronos::now()->format('Ymdhhss') . '-' . $serial . '.pdf'
        ];
    }
}
