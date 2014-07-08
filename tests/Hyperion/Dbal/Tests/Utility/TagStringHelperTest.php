<?php
namespace Hyperion\Dbal\Tests\Utility;

use Hyperion\Dbal\Exception\ParseException;
use Hyperion\Dbal\Utility\TagStringHelper;

class TagStringHelperTest extends \PHPUnit_Framework_TestCase {

    /**
     * @small
     * @dataProvider stringDataProvider
     */
    public function testParse($string, $count, $success)
    {
        $helper = new TagStringHelper();

        try {
            $out = $helper->parseTagString($string);

            if (!$success) {
                $this->fail();
            }

            $this->assertCount($count, $out);
        } catch (\Exception $e) {
            if ($success) {
                $this->fail();
            }

            if ($e instanceof ParseException) {
                $this->assertNotEmpty($e->getMessage());
            } else {
                throw $e;
            }
        }


    }


    public function stringDataProvider() {
        return [
            ['stuff=stuff', 1, true],
            ['stuff=stuff stuff=feature/blah', 1, true],
            ['stuff=stuff more=stuff', 2, true],
            ['repo=feature/feature-name', 1, true],
            ['stuff=stuff repo=', 0, false],
            ['stuff=stuff  repo=blah', 2, true],
            ['stuff=stuff repo=blahh heck', 0, false],
            ['stuff=x', 0, false],
            ['stuff=!crap!', 0, false],
            [' hello=feature/world', 1, true],
            [' hello=feature/world ', 1, true],
            [' hello=feature/world ', 1, true],
            ['x=y', 0, false],
            ['  ', 0, true],
        ];
    }


}
 