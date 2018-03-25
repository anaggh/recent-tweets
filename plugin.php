<?php
/**
 * More Info:
 * - https://publish.twitter.com
 * - https://dev.twitter.com/web/overview
 */
class RecentTweets extends Plugin
{

    public function init()
    {
        $this->dbFields = array(
            'twitterHandle'=>'bludit',
        );
    }

    public function form()
    {
        global $Language;

        $html = '<div>';
        $html .= '<label>'.$Language->get('Twitter Handle').'</label>';
        $html .= '<input id="twitterHandle" name="twitterHandle" type="text" value="'.$this->getValue('twitterHandle').'">';
        $html .= '</div>';

        return $html;
    }

    public function siteSidebar()
    {
        $twitterHandle = $this->getValue('twitterHandle');

        $html  = '<div class="plugin plugin-recent-tweets">';
        $html .= '<div class="plugin-content">';

        $html .= '<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';
        // Follow button
        $html .= '<a href="https://twitter.com/' . $twitterHandle . '?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="true">Follow @' . $twitterHandle . '</a>';
        // Timeline
        $html .= '<a class="twitter-timeline" href="https://twitter.com/' . $twitterHandle . '?ref_src=twsrc%5Etfw" data-height="400" data-chrome="nofooter">Tweets by ' . $twitterHandle . '</a>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}
