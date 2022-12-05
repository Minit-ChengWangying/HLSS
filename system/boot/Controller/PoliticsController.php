<?php
namespace Boot\Controller;

// session_start();

use Boot\Controller\Controller;
use Boot\View\PoliticsView;

class PoliticsController extends Controller {
    protected $Action,$limitName;
    public function index() {
        self::run('politics');
    }
    public function ticket() {
        self::run('politics');
        sleep(1);   # 生产环境删去
        PoliticsView::getWeekTicket();
    }
    public function tickets() {
        self::run('politics');
        sleep(1);   # 生产环境删去
        PoliticsView::getTicekts();
    }
    public function weekMajorTickets() {
        self::run('politics');
        sleep(1);   # 生产环境删去
        PoliticsView::getWeekMajorTicekts();
    }
    public function majorTickets() {
        self::run('politics');
        sleep(1);   # 生产环境删去
        PoliticsView::getMajorTicekts();
    }
    public function number() {
        self::run('politics');
        sleep(1);   # 生产环境删去
        PoliticsView::numberOfTicket();
    }
}

?>