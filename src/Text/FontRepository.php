<?php

namespace JLaso\GD\Text;

class FontRepository
{
    /** @var string[] */
    protected $cache;
    /** @var string[] */
    protected $ttfFolders;

    /**
     * @param string[] $ttfFolders
     */
    public function __construct(array $ttfFolders)
    {
        $this->ttfFolders = $ttfFolders;
        foreach($ttfFolders as $ttfFolder){
            $files = glob($ttfFolder.'/*.ttf');
            foreach($files as $file){
                $fontName = preg_replace("/\.ttf$/", "", basename($file));
                $this->cache[$fontName] = $file;
            }
        }
    }

    /**
     * @param string $fontName
     * @return string
     */
    public function getFontFile($fontName)
    {
        return isset($this->cache[$fontName]) ? $this->cache[$fontName] : $fontName.'.ttf';
    }
}