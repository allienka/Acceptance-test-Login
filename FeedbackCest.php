<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class FeedbackCest
{ 
    public function testForSuccess(AcceptanceTester $I)
    {
        $I->amOnPage('/feedback.php');
        $I->fillField('#name', 'student'); // this is the id of field
        $I->fillField('#email', 'student@email.com'); // this is the id of field
        $I->click('formButton');
        $I->see('Hello!
		Thank you for your feedback! We will contact you at student@email.com as soon as possible. Here is your feedback for reference.
		Name E-mail Your feedback');
        $I->dontSee('Please fill all the fields.');
    }

    public function testForEmptyUser(AcceptanceTester $I)
    {
        $I->amOnPage('/feedback.php');
        $I->fillField('#name', ''); // using the text in label element works too
        $I->fillField('#email', 'student@email.com'); // using the text in label element works too
        $I->click('formButton');
        $I->see('Please fill all the fields.');
        $I->dontSee('Hello!
		Thank you for your feedback! We will contact you at student@email.com as soon as possible. Here is your feedback for reference.
		Name E-mail Your feedback');
    }

    public function testForEmptyEmail(AcceptanceTester $I)
    {
        $I->amOnPage('/feedback.php');
        $I->fillField('#name', 'student'); // using the text in label element works too
        $I->fillField('#email', ''); // using the text in label element works too
        $I->click('formButton');
        $I->see('Please fill all the fields.');
        $I->dontSee('Hello!
		Thank you for your feedback! We will contact you at student@email.com as soon as possible. Here is your feedback for reference.
		Name E-mail Your feedback');
    }
		
    public function testForWrongEmail(AcceptanceTester $I)
    {
        $I->amOnPage('/feedback.php');
        $I->fillField('#name', 'student'); // using the text in label element works too
        $I->fillField('#email', 'student2email.com'); // using the text in label element works too
        $I->click('formButton');
        $I->see('Please check your e-mail address');
        $I->dontSee('Hello!
		Thank you for your feedback! We will contact you at student@email.com as soon as possible. Here is your feedback for reference.
		Name E-mail Your feedback');
    }

}
?>