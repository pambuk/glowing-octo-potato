/// <reference path="./steps.d.ts" />
    
Feature('Login as admin');

Scenario('I login as an admin', (I) => {
    I.amOnPage('/login');
    I.fillField('email', 'wojtek.zymonik@gmail.com');
    I.fillField('password', '123123');
    I.click('Login', '.form-horizontal');
    I.see('You are logged in!');
    I.see('Admin');
});