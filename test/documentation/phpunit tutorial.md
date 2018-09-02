#PHPUnit

require phpunit/phpunit

phpunit.xml
`
<?xml version="1.0" encoding="UTF-8"?>
<phpunit colors="true">
    <testsuites>
        <testsuite name="Application Test Suite">
            <directory>./test/unittest/</directory>
        </testsuite>
    </testsuites>
</phpunit>
`

Dit vertelt phpunit de locatie van de tests: /test/unittest/


Aftrappen van de tests:
./vendor/bin/phpunit

**Standaards**:
Append Test bij elke filename:
validateUserTest.php

De classname moet gelijk zijn aan de filename:
Elke method moet public zijn
Elke method moet starten met test gevolgd door een goede omschrijvende naam

```
class validateUserTest extends \PHPUnit_Framework_TestCase{

    public function testValidatePassword(){
    
    }
}
```


**Een class testen met $this->getMockBuilder();**
$Calculator = $this->getMockBuilder('\walter\Calculator')->setConstructorArgs(array($value))->getMock();

Zo maakt je een instantie van het object Calculator incl de mogelijkheid om argumenten naar de constructor te sturen.

Als je var_dump($Calculator) doet krijg je het hele object te zien.
Je kunt ook met print_r(get_class_methods($Calculator)); alle methodes opvragen.
Het is een compleet gevuld object met stub methods
Elke method heeft de juiste `method-name` en `arguments`, maar heeft als inhoud **return null;**

Oplossen return null van de stub methodes


Een mock object is feitelijk een object dat extends de class die je mocked.
Alle methodes zijn er maar alle method zijn stub method: leeg: `return null;`

Je kunt de `return value bepalen` van een stub methode met will():
```
$Object->expects($this->once())
            ->method('yourMethodYouTest')
            ->will($this->returnValue($yourReturnValue));
```

Een mock methode doet exact gelijk wat het orgineel doet.