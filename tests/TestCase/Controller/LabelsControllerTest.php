<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\LabelsController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\LabelsController Test Case
 *
 * @uses \App\Controller\LabelsController
 */
class LabelsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Labels',
    ];
}
