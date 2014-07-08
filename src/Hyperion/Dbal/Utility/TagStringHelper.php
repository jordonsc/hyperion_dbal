<?php
namespace Hyperion\Dbal\Utility;

use Hyperion\Dbal\Exception\ParseException;

class TagStringHelper
{
    const REPO_FILTER = '/^[\w-\.,\\/\+\|]{2,50}$/';
    const TAG_FILTER  = '/^[\w-\.,\\/\+\|]{2,200}$/';


    /**
     * Build a clean tag string from user input
     *
     * @param string $source
     * @return string
     * @throws ParseException
     */
    public function cleanTagString($source)
    {
        return $this->buildTagString($this->parseTagString($source), false);
    }

    /**
     * Parse a tag string and return an associative array of repo/tag values
     *
     * @param string $source
     * @param bool   $clean
     * @return array
     * @throws ParseException
     */
    public function parseTagString($source, $clean = true)
    {
        $parsed = [];
        $sets   = explode(" ", $source);

        foreach ($sets as $set) {
            if (!trim($set)) {
                continue;
            }

            $parts = explode("=", $set, 2);
            if (count($parts) != 2) {
                throw new ParseException("Error parsing tag string at '".$set."'");
            }

            $repo = $parts[0];
            $tag  = $parts[1];

            if ($clean) {
                if (!$this->isValidRepo($repo)) {
                    throw new ParseException("Repository name '".$repo."' is invalid");
                }

                if (!$this->isValidTag($tag)) {
                    throw new ParseException("Tag name '".$tag."' is invalid");
                }
            }

            $parsed[$repo] = $tag;
        }

        return $parsed;
    }

    /**
     * Build a tag string from a repo/tag value array
     *
     * @param array $source
     * @param bool  $clean
     * @throws ParseException
     * @return string
     */
    public function buildTagString(array $source, $clean = true)
    {
        $tag_string = '';
        foreach ($source as $repo => $tag) {
            if ($clean) {
                if (!$this->isValidRepo($repo)) {
                    throw new ParseException("Repository name '".$repo."' is invalid");
                }

                if (!$this->isValidTag($tag)) {
                    throw new ParseException("Tag name '".$tag."' is invalid");
                }
            }

            $tag_string .= ' '.$repo.'='.$tag;
        }

        return trim($tag_string);
    }

    /**
     * Create an appropriate build name from the tag string
     *
     * @param string|array $tags
     * @return string
     */
    public function createBuildNameFromTags($tags)
    {
        if (!is_array($tags)) {
            $tags = $this->parseTagString($tags);
        }

        $build_name = '';
        foreach ($tags as $repo => $tag) {
            $build_name .= '+'.$repo.':'.$tag;
        }

        return substr($build_name, 1);
    }

    /**
     * Check if a repo name is valid
     *
     * @param string $repo
     * @return bool
     */
    public function isValidRepo($repo)
    {
        return (bool)preg_match(self::REPO_FILTER, $repo);
    }

    /**
     * Check if a tag name is valid
     *
     * @param string $tag
     * @return bool
     */
    public function isValidTag($tag)
    {
        return (bool)preg_match(self::TAG_FILTER, $tag);
    }


} 