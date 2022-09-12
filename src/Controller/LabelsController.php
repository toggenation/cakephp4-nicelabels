<?php

declare(strict_types=1);

namespace App\Controller;

use App\Utility\LabelFactory;
use App\Utility\ViewCreator;
use Cake\Core\Configure;
use Cake\Event\EventInterface;
use Cake\Http\Client;
use Cake\Network\Socket;

/**
 * Labels Controller
 *
 */
class LabelsController extends AppController
{
        public function beforeFilter(EventInterface $event)
        {
                parent::beforeFilter($event);

                if (
                        !$this->request->is("POST") &&
                        in_array($this->request->getParam('action'), ['socket', 'http'])
                ) {
                        return $this->redirect(['action' => 'print']);
                }
        }

        public function print()
        {
                $this->set('links', ['socket', 'http']);
        }

        public function http()
        {
                $this->request->allowMethod('POST');

                $url = Configure::read("Nicelabel.HTTP_URL");

                $client = new Client();

                $client->setConfig('timeout', 2);

                $data = (new LabelFactory(
                        $this->request->getParam('action')
                ))->make(1);


                $xml = (new ViewCreator())->xml($data);

                try {
                        $client->post($url, $xml);
                        $this->Flash->success("Successfully submitted to {$url}");
                } catch (
                        \Cake\Http\Client\Exception\NetworkException
                        $e
                ) {
                        $this->Flash->error($e->getMessage());
                }

                return $this->redirect(['action' => 'print']);
        }

        public function socket()
        {
                $this->request->allowMethod('POST');

                $url = Configure::read('Nicelabel.SOCKET_URL');

                $config = parse_url($url);

                $client = new Socket($config);

                $client->setConfig('timeout', 2);

                $data = (new LabelFactory(
                        $this->request->getParam('action')
                ))->make(1);


                $csv = (new ViewCreator())->csv($data);

                try {
                        $client->connect();

                        $bytes = $client->write($csv);

                        $this->Flash->success("Successfully submitted {$bytes} bytes to {$url}");
                } catch (
                        \Cake\Network\Exception\SocketException
                        $e
                ) {
                        $this->Flash->error($e->getMessage());
                }

                return $this->redirect(['action' => 'print']);
        }
}
