<?php
namespace Boot\Controller;

use Boot\Controller\Controller;
use Boot\View\AdminView;

class AdminController extends Controller {
    public function index() {
        self::run('admin');
        AdminView::index();
    }
    public function tickets() {
        self::run('admin');
        AdminView::getTickets();
    }
    public function query() {
        self::run('admin');
        $queryData = $_GET['data'];
        AdminView::Query($queryData);
    }
    public function sport() {
        self::run('admin');
        AdminView::unionSport();
    }
    public function hygiene() {
        self::run('admin');
        AdminView::unionHygiene();
    }
    public function good() {
        self::run('admin');
        AdminView::goodSleep();
    }
    public function bad() {
        self::run('admin');
        AdminView::badSleep();
    }
    public function commonuser() {
        self::run('admin');
        AdminView::commonUser();
    }
    public function classmaster() {
        self::run('admin');
        AdminView::classMasterUser();
    }
    public function class() {
        self::run('admin');
        AdminView::getClass();
    }
    public function register() {
        self::run('admin');
        $class = $_GET['class'];
        AdminView::registerClass($class);
    }
    public function change() {
        self::run('admin');
        $class = $_GET['class'];
        $class_master = $_GET['master'];
        AdminView::changeClass($class,$class_master);
    }
    public function bonus() {
        self::run('admin');
        $class = $_GET['class'];
        $points = $_GET['points'];
        AdminView::bonusClass($points,$class);
    }
    public function delete() {
        self::run('admin');
        $sheet = $_GET['sheet'];
        $row = $_GET['row'];
        $value = $_GET['value'];
        AdminView::delete($sheet,$row,$value);
    }
    public function survey() {
        self::run('admin');
        AdminView::systemSurvey();
    }
}
?>