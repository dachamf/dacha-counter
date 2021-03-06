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
    }

    public function index()
    {
        $this->view('home/index');
    }

    public function report($from = null, $to = null)
    {
        $from = ($from == 'home') ? "" : $from;
        $from = (isset($_GET['from'])) ? $_GET['from'] : null;
        $to = (isset($_GET['to'])) ? $_GET['to'] : null;

        if ($from === "" && $to === "") {
            $sales = $this->saveSale->query('save_sels')->get();
            $this->view('home/report', ['sales' => $sales]);

        } elseif ($from != null && $to == null) {
            $sales = $this->saveSale->query('save_sels')->where('created_at', '>', $from)->get();
            if (!$sales->count() > 0) {
                $this->view('home/report', ['sales' => $sales]);
            } else {
                $this->view('home/report');
            }
        } elseif ($from === null && $to === null) {
            $this->view('home/report');
        } else {
            $sales = $this->saveSale->query('save_sels')->where('created_at', '>', $from)->where('created_at', '<', $to)->get();

            if ($sales->count() > 0) {
                $this->view('home/report', ['sales' => $sales]);
            } else {
                $this->view('home/report');
            }

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

            $message = Flash::flash('message', 'Successfully saved data', 'success', 'beenhere');
            $this->view('home/index',['message' => $message]);
        } else {
            $message = Flash::flash('message', 'Eroor saving data', 'error', 'warning');
            $this->view('home/index',['message' => $message]);
        }

    }

    public function exporttoecell($saveSale)
    {

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
        $scheet->addTable($table, new \ExcelAnt\Coordinate\Coordinate(1, 1));
        $workbook->addSheet($scheet);
        $filePath = '../ExcellFiles/' . date('Y_m_d-h-i-s') . '_export.xls';
        $filename = date('Y_m_d-h-i-s') . '_export.xls';
        $writer = (new WriterFactory())->createWriter(new Excel5($filePath));
        $phpExcel = $writer->convert($workbook);
        $writer->write($phpExcel);
        $message = Flash::flash('message', 'Successfully generated file ' . $filename, 'success', 'beenhere');
        $this->view('home/report', ['message' => $message]);
        // Redirect::to('/home/report');
    }

}