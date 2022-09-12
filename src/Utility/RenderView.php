<?php


namespace App\Utility;

use Cake\View\ViewBuilder;

class RenderView
{

    public function csv($data)
    {
        $vb = new ViewBuilder();

        $header = array_keys($data[0]);

        $vb->setClassName('CsvView.Csv')
            ->setOptions([
                'header' => $header,
                'serialize' => 'data'
            ]);

        $view = $vb->build();

        $view->set(compact('data'));

        return $view->render();
    }

    public function xml($data)
    {
        $vb = new ViewBuilder();

        $vb->setClassName('Xml')
            ->setOption('serialize', 'data');

        $view = $vb->build();

        $view->set(compact('data'));

        return $view->render();
    }
}
