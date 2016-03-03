<?php

namespace emutoday\Presenters;

use Lewis\Presenter\AbstractPresenter;
use League\CommonMark\CommonMarkConverter;

class PagePresenter extends AbstractPresenter
{
   protected $markdown;

   public function __construct($object, CommonMarkConverter $markdown)
   {
      $this->markdown = new CommonMarkConverter();

      parent::__construct($object);

   }

   public function contentHtml()
   {
      return $this->markdown->convertToHtml($this->content);

   }

   public function urlWildcard()
   {
      return $this->url.'*';

   }
    public function prettyUri()
   {
       return '/'.ltrim($this->uri, '/');
   }

   public function linkToPaddedTitle($link)
    {
        $padding = str_repeat('&nbsp;', $this->depth * 4);

        return $padding.link_to($link, $this->title);
    }
    public function paddedTitle()
     {
         return str_repeat('&nbsp;', $this->depth * 4).$this->title;

     }

}
