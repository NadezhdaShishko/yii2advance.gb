<?php namespace frontend\tests\acceptance;
use frontend\tests\AcceptanceTester;
use yii\helpers\Url;

class MyNewScenarioCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    // tests
    public function checkHelloIndex(AcceptanceTester $I)
    {
        $I->amOnPage(Url::to(['/hello/index']));
        $I->see('Hello, World!');
    }
}
