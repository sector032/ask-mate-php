<?php
session_start();

use app\controllers\Controller;
use app\controllers\Delete;
use app\controllers\Login;
use app\controllers\Registration;
use app\controllers\Vote;
use app\models\Model;
use Jenssegers\Blade\Blade;
use app\controllers\Route;

require_once __DIR__ . '/vendor/autoload.php';

Route::add('/', function () {
    Controller::renderQuestions();
});

Route::add('/login', function () {
    Login::renderLogin();
}, 'get');

Route::add('/login', function () {
    Login::loginUser();
}, 'post');

Route::add('/registration', function () {
    Registration::renderRegistration();
}, 'get');

Route::add('/registration', function () {
    Registration::registerUser();
}, 'post');

// Post route example
Route::add('/delete', function () {
    Delete::deleteAQuestion();
}, 'post');

Route::add('/increase', function () {
    Vote::increaseVote();
}, 'post');

Route::add('/decrease', function () {
    Vote::decreaseVote();
}, 'post');

Route::add('/logout', function () {
    Login::logoutUser();
});

Route::add('/edit_question_form', function () {
    $q_id = $_GET["q_id"];
    Controller::renderEditQuestionForm($q_id);
});

Route::add('/edit_qustion_handler', function () {
    $q_id = $_GET["q_id"];
    Controller::editQuestionHandler($q_id);
});

Route::run('/');

