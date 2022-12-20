<?php
namespace Boot\Controller;

use Boot\View\ClassView;
use Boot\Controller\Controller;

class ClassController extends Controller {
    public function index() {
        self::run('class');
        ClassView::index();
    }
    public function number() {
        self::run('class');
        ClassView::classNumber();
    }
    public function weektickets() {
        self::run('class');
        ClassView::getWeekTickets();
    }
    public function weekmajortickets() {
        self::run('class');
        ClassView::getWeekMajorTickets();
    }
    public function tickets() {
        self::run('class');
        ClassView::getTickets();
    }
    public function majortickets() {
        self::run('class');
        ClassView::getMajorTickets();
    }
    public function query() {
        self::run('class');
        $QueryInfo = $_GET['n'];
        ClassView::fuzzyQuery($QueryInfo);
    }
    public function read() {
        self::run('class');
        ClassView::ticketRead();
    }
    public function union() {
        self::run('class');
        ClassView::getUnionScore();
    }
    public function sportreason() {
        self::run('class');
        ClassView::getSportReason();
    }
    public function hygienereason() {
        self::run('class');
        ClassView::getHygieneReason();
    }
    public function goodsleep() {
        self::run('class');
        ClassView::getGoodSleep();
    }
    public function badsleep() {
        self::run('class');
        ClassView::getBadSleep();
    }
}