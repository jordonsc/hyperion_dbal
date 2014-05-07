<?php
namespace Hyperion\Dbal\Exception;

class UnexpectedResponseException extends \RuntimeException implements Exception
{

    /**
     * @var string
     */
    protected $content;

    function __construct($msg, $code = 0, $previous = null, $content = null)
    {
        parent::__construct($msg, $code, $previous);
        $this->content = $content;
    }

    /**
     * Get the unexpected content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


}