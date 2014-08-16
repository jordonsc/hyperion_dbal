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
            ['23=stuff', 1, true],
            ['45=stuff 45=feature/blah', 1, true],
            ['342=stuff 435=stuff', 2, true],
            ['342=feature/feature-name', 1, true],
            ['32=stuff 1=', 0, false],
            ['32=stuff  2=blah', 2, true],
            ['32=stuff 3=blahh heck', 0, false],
            ['1=x', 0, false],
            ['1=!crap!', 0, false],
            [' 1=feature/world', 1, true],
            [' 1=feature/world ', 1, true],
            [' 1=feature/world ', 1, true],
            ['1=y', 0, false],
            ['  ', 0, true],
        ];
    }


}
 