<?php

/**
 * Created by PhpStorm.
 * User: dalibor
 * Date: 12/27/16
 * Time: 21:12
 */
class Home extends Controller
{

    protected $saveSale;
    protected $flash;

    public function __construct()
    {
        $this->saveSale = $this->model('SaveSel');
        $this->flash = new Flash();
    }

    public function index()
    {
        $this->view('home/index');
    }

    public function report()
    {
        $this->view('home/report');
    }


    public function create($name = '', $email = '', $orderId = '', $saveSale = '', $reason = '')
    {
        if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['order']) && isset($_GET['save']) && isset($_GET['reason']) &&
        !empty($_GET['name']) && !empty($_GET['email']) && !empty($_GET['order']) && !empty($_GET['save']) && !empty($_GET['reason'])) {
            $name = $_GET['name'];
            $email = $_GET['email'];
            $orderId = $_GET['order'];
            $saveSale = $_GET['save'];
            $reason = $_GET['reason'];

            SaveSel::create([
                'name' => $name,
                'email' => $email,
                'orderId' => $orderId,
                'saveSale' => $saveSale,
                'reason' => $reason
            ]);

            $this->flash->flash('message', 'Data is saved!', 'success');
            $this->view('home/index');
        } else {

            $this->flash->flash('message', 'There is no data to save!', 'alert');
            $this->view('home/index');
        }

    }

}