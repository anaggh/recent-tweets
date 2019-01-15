<?php
/**
 * More Info:
 * - https://publish.twitter.com
 * - https://dev.twitter.com/web/overview
 */
class RecentTweetsPlugin extends Plugin
{

    public function init()
    {
        $this->dbFields = [
            'twitterHandle'=>'bludit',
            'enableDarkTheme'=>false
        ];
    }

    public function form()
    {
        global $L;

        $html = '<div>';
        $html .= '<label>'.$L->get('Twitter Handle').'</label>';
        $html .= '<input id="twitterHandle" name="twitterHandle" type="text" value="'.$this->getValue('twitterHandle').'">';
        $html .= '</div>';

        $html .= '<div>';
        $html .= '<label>'.$L->get('Enable Dark Theme').'</label>';
        $html .= '<select name="enableDarkTheme">';
        $html .= '<option value="true" '.($this->getValue('enableDarkTheme')===true?'selected':'').'>'.$L->get('Enabled').'</option>';
        $html .= '<option value="false" '.($this->getValue('enableDarkTheme')===false?'selected':'').'>'.$L->get('Disabled').'</option>';
        $html .= '</select>';
        $html .= '</div>';

        return $html;
    }

    public function siteSidebar()
    {
        $twitterHandle = $this->getValue('twitterHandle');
        // Defaults to light theme
        $theme = $this->getValue('enableDarkTheme') ? '&theme=dark' : '';

        $html  = '<div class="plugin plugin-recent-tweets">';
        $html .= '<div class="plugin-content">';

        $html .= '<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>';
        // Follow button
        $html .= '<a href="https://twitter.com/' . $twitterHandle . '?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="true">Follow @' . $twitterHandle . '</a>';
        // Timeline
        $html .= '<a class="twitter-timeline" href="https://twitter.com/' . $twitterHandle . '?ref_src=twsrc%5Etfw'.$theme.'" data-height="400" data-chrome="nofooter">Tweets by ' . $twitterHandle . '</a>';
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }
}
