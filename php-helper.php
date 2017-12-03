<?php
/*
 * Florian SALBER's php Helper function
 * Help me to start project faster
 *
 * Allow you to save time on your projects ;)
 * LICENSE MIT 2017
 */

/**
 * Convert string to slug for Blog etc...
 * @param $slug (string) String to convert
 * @return $slug (string) Slugged string
 */
function slug ($slug)
{
	$slug = preg_replace('~[^\pL\d]+~u', '-', $slug);
    $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
    $slug = preg_replace('~[^-\w]+~', '', $slug);
    $slug = trim($slug, '-');
    $slug = preg_replace('~-+~', '-', $slug);
    $slug = strtolower($slug);

    return $slug;
}

/**
 * Convert time to time ago display "2 weeks ago" etc...
 * @param $time (string) Date format ('d-m-Y H:i:s')
 * @param $full (boolean) True/False
 * @return $string (string) Converted date
 */
function timeAgo($time, $full = false)
{
	$current_time = new \DateTime('now');
    $ago_time     = new \DateTime($time);

    $diff = $current_time->diff($ago_time);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'an',
        'm' => 'moi',
        'w' => 'semaine',
        'd' => 'jour',
        'h' => 'heure',
        'i' => 'minute',
        's' => 'seconde',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? 'Il y a '. implode(', ', $string) : 'à l\'instant';
}

/**
 * Debug var
 * @param $var (void) Var to debug
 * @return print_r($var) (void) Debugged $var
 */
function dump($var) {
    $debug = \debug_backtrace();
    echo '<p>&nbsp;</p><p><a href="#" onclick="$(this).parent().next(\'ol\').slideToggle(); return false;"><strong>'.$debug[0]['file'].' </strong> l.'.$debug[0]['line'].'</a></p>';
    echo '<ol style="display:none;">';
    foreach($debug as $k=>$v){ if($k>0){
        echo '<li><strong>'.$v['file'].' </strong> l.'.$v['line'].'</li>';
    }}
    echo '</ol>';
    echo '<pre>';
    print_r($var);
    echo '</pre>';
}

/**
 * Display gravatar picture
 * @param $email (string) Gravatar email
 * @return $grav_url (string) URL to include in img src attr
 */
function gravatar($email) {
    $size = 150;
    $default = "http://www.gravatar.com/avatar?s=150";
    $grav_url = "https://www.gravatar.com/avatar/".md5(strtolower(trim($email)))."?d=".urlencode($default)."&s=".$size;

    return $grav_url;
}