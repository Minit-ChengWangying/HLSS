<?php
namespace Boot\Controller;

use Boot\Controller\Controller;
use Boot\View\PoliticsView;

class PoliticsController extends Controller {
    protected $Action,$limitName;
    public function index() {
        self::run('politics');
    }
    public function ticket() {
        self::run('politics');
        PoliticsView::getWeekTicket();
    }
    public function tickets() {
        self::run('politics');
        PoliticsView::getTicekts();
    }
    public function weekMajorTickets() {
        self::run('politics');
        PoliticsView::getWeekMajorTicekts();
    }
    public function majorTickets() {
        self::run('politics');
        PoliticsView::getMajorTicekts();
    }
    public function number() {
        self::run('politics');
        PoliticsView::numberOfTicket();
    }
    public function fuzzy() {
        self::run('politics');
        $queryCriteria = $_GET['criteria'];
        $queryInfo = $_GET['info'];
        PoliticsView::getFuzzyQuery($queryCriteria,$queryInfo);
    }
    public function sportReason() {
        self::run('politics');
        $Class = $_GET['class'];
        PoliticsView::getUnionSportReason($Class);
    }
    public function hygieneReason() {
        self::run('politics');
        $Class = $_GET['class'];
        PoliticsView::getUnionhygieneReason($Class);
    }
    public function goodsleep() {
        self::run('politics');
        PoliticsView::getSleepGood();
    }
    public function badsleep() {
        self::run('politics');
        PoliticsView::getSleepBad();
    }
    public function goodclasssleep() {
        self::run('politics');
        $Class = $_GET['class'];
        PoliticsView::getSleepClassGood($Class);
    }
    public function badclasssleep() {
        self::run('politics');
        $Class = $_GET['class'];
        PoliticsView::getSleepClassBad($Class);
    }
}

?>