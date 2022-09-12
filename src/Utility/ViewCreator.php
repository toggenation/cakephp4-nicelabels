<?php

namespace App\Utility;

use Cake\View\ViewBuilder;

class ViewCreator
{
    public function xml($data)
    {
        $vb = new ViewBuilder();

        $vb->setClassName('Xml')
            ->setOption('serialize', 'data');

        $view = $vb->build();

        $view->set(compact('data'));

        return $view->render();
    }

    public function csv($data)
    {
        $vb = new ViewBuilder();

        $vb->setClassName('CsvView.Csv')
            ->setOptions([
                'serialize' => 'data',
                'header' => array_keys($data[0])
            ]);

        $view = $vb->build();

        $view->set(compact('data'));

        return $view->render();
    }
}
