php_seo_friendly_paggination_class
==================================
If you want to use SEO friendly paggination use seo_friendly_example.php with htacceess file.

This is default setting of paggination options:

protected $_options = array(

            'recordsPerPage' => '10',
            'PerPagevariableName' => 'show-records',
            'variableName' => 'page',
            'pageRange' => '5',
            'beforeHtml' => '<a href',
            'link' => 'index.php',
            'afterHtml' => '</a>',
            'classFirst' => 'inactive',
            'classPrevious' => 'inactive',
            'range' => '3',
            'classCurrent' => 'selected',
            'classLink' => 'inactive',
            'classNext' => 'inactive',
            'classLast' => 'inactive',
            'previous' => 'Previous',
            'first' => 'First',
            'nextPage' => 'Next',
            'last' => 'Last',
            'questionMark' => '/',
            'equalTo' => '/',
            'DropDownClass' => 'drop_down_class',
            'ShowNext' => true,
            'ShowPrevious' => true,
            'ShowLast' => true,
            'ShowFirst' => true,
            'ShowPageNumbers' => true
    );

you can change with your own value. You and change too when you calling on page.
Like:
$pg->recordsPerPage(20);
you can owerwrite all paggination array option with this way.

Remeber to change "PerPagevariableName" and "variableName" if you want to use SEO friendly paggination. Alse "questionMark" and "equalTo" option name will be replaced with forward slaches. else "equalTo" replace with equal to sign and "questionMark" replaced with question mark sign and "Endsign" with replace with "&" sign.



