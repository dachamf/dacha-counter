<?php

/**
 * Created by PhpStorm.
 * User: dalibor
 * Date: 12/27/16
 * Time: 21:12
 */
use ExcelAnt\Adapter\PhpExcel\Workbook\Workbook;
use ExcelAnt\Adapter\PhpExcel\Writer\WriterFactory;
use ExcelAnt\Adapter\PhpExcel\Writer\PhpExcelWriter\Excel5;

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

    public function report($from = null, $to = null)
    {
        $from = (isset($_GET['from']))? $_GET['from'] : null;
        $to = (isset($_GET['to'])) ? $_GET['to'] : null;

        if ($from == null && $to == null) {
            $sales = $this->saveSale->query('save_sels')->get();
            $this->view('home/report', ['sales' => $sales]);

        } elseif ($from != null && $to == null) {
            $this->view('home/report');
        } else {
            $this->view('home/report');
        }

    }


    public function create($name = '', $email = '', $orderId = '', $saveSale = '', $reason = '')
    {
        if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['order']) && isset($_GET['save']) && isset($_GET['reason']) &&
            !empty($_GET['name']) && !empty($_GET['email']) && !empty($_GET['order']) && !empty($_GET['save']) && !empty($_GET['reason'])
        ) {
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

    public function exporttoecell($saveSale){

        $saveSale = $_POST;
        $workbook = new Workbook();
        $scheet = new \ExcelAnt\Adapter\PhpExcel\Sheet\Sheet($workbook);
        $table = new \ExcelAnt\Table\Table();

        foreach ($saveSale as $item) {
            $item = json_decode($item);

            $table->setRow([
                $item->name,
                $item->email,
                $item->orderId,
                $item->saveSale,
                $item->reason,
            ]);
        }
        $scheet->addTable($table, new \ExcelAnt\Coordinate\Coordinate(1,1));
        $workbook->addSheet($scheet);
        $writer = (new WriterFactory())->createWriter(new Excel5('../ExcellFiles/' . date('Y_m_d-h-i-s') . '_export.xls'));
        $phpExcel = $writer->convert($workbook);
        $writer->write($phpExcel);
        $this->flash->flash('message', 'File is exported on ', 'success');
        Redirect::to('/home/report');
    }

}