<?php

class Pagging
{

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
            'Endsign' => '/',
            'DropDownClass' => 'drop_down_class',
            'ShowNext' => true,
            'ShowPrevious' => true,
            'ShowLast' => true,
            'ShowFirst' => true,
            'ShowPageNumbers' => true

    );

    protected $RecordPerPageNumbers = array(
            10, 20, 25, 50, 100
    );

    protected $startCount;
    protected $endCount;
    protected $limit;
    protected $pageNumbersDropDown;
    protected $xnumVal;


    public function DropDownClass($DropDownClass)
    {
        $this->_options['DropDownClass'] = $DropDownClass;
    }


    public function ShowPageNumbers($ShowPageNumbers)
    {
        $this->_options['ShowPageNumbers'] = $ShowPageNumbers;
    }


    public function Endsign($Endsign)
    {
        $this->_options['Endsign'] = $Endsign;
    }

    public function ShowFirst($ShowFirst)
    {
        $this->_options['ShowFirst'] = $ShowFirst;
    }

    public function ShowLast($ShowLast)
    {
        $this->_options['ShowLast'] = $ShowLast;
    }

    public function ShowPrevious($ShowPrevious)
    {
        $this->_options['ShowPrevious'] = $ShowPrevious;
    }


    public function ShowNext($ShowNext)
    {
        $this->_options['ShowNext'] = $ShowNext;
    }


    public function equalTo($equalTo)
    {
        $this->_options['equalTo'] = $equalTo;
    }

    public function questionMark($questionMark)
    {
        $this->_options['questionMark'] = $questionMark;
    }

    public function last($last)
    {
        $this->_options['last'] = $last;
    }

    public function nextPage($nextPage)
    {
        $this->_options['nextPage'] = $nextPage;
    }

    public function first($first)
    {
        $this->_options['first'] = $first;
    }

    public function previous($previous)
    {
        $this->_options['previous'] = $previous;
    }


    public function classNext($classNext)
    {
        $this->_options['classNext'] = $classNext;
    }


    public function classLink($classLink)
    {
        $this->_options['classLink'] = $classLink;
    }

    public function classCurrent($classCurrent)
    {
        $this->_options['classCurrent'] = $classCurrent;
    }


    public function range($range)
    {
        $this->_options['range'] = $range;
    }


    public function classPrevious($classPrevious)
    {
        $this->_options['classPrevious'] = $classPrevious;
    }


    public function classFirst($classFirst)
    {
        $this->_options['classFirst'] = $classFirst;
    }

    public function recordsPerPage($recordsPerPage)
    {
        if (isset($_GET[$this->_options['PerPagevariableName']]) && is_numeric($_GET[$this->_options['PerPagevariableName']])) {
            $this->_options['recordsPerPage'] = (int)$_GET[$this->_options['PerPagevariableName']];
        } else {
            $this->_options['recordsPerPage'] = (int)$recordsPerPage;
        }
    }

    public function PerPagevariableName($PerPagevariableName)
    {
        $this->PerPagevariableName = $PerPagevariableName;
    }


    public function variableName($variableName)
    {
        $this->_options['variableName'] = strtolower($variableName);
    }

    public function pageRange($pageRange)
    {
        $this->_options['pageRange'] = $pageRange;
    }

    public function beforeHtml($beforeHtml)
    {
        $this->_options['beforeHtml'] = $beforeHtml;

    }


    public function link($link)
    {
        $this->_options['link'] = $link;
    }

    public function afterHtml($afterHtml)
    {
        $this->_options['afterHtml'] = $afterHtml;
    }


    function ReturnCurrentPage()
    {
        if (isset($_GET[$this->_options['variableName']]) && is_numeric($_GET[$this->_options['variableName']])) {
            $currentpage = (int)$_GET[$this->_options['variableName']];
        } else {
            $currentpage = 1;
        }

        return $currentpage;

    }


    function Pagger($numrows)
    {


        $totalpages = ceil($numrows / $this->_options['recordsPerPage']);
        $this->xnumVal = $totalpages;


        $currentpage = $this->ReturnCurrentPage();


        if ($currentpage > $totalpages) {
            $currentpage = $totalpages;
        }

        if ($currentpage < 1) {
            $currentpage = 1;
        }

        $offset = ($currentpage - 1) * $this->_options['recordsPerPage'];

        $this->startCount = $offset;

        $this->endCount = $this->_options['recordsPerPage'];


        $range = $this->_options['range'];


        $pagggin_number_html = '';

        if ($currentpage > 1) {
            ///first page link
            if ($this->_options['ShowFirst']) {
                $pagggin_number_html .= $this->ReturnHtml(1, $this->_options['classFirst'], $this->_options['first']);
            }
            $prevpage = $currentpage - 1;

            ///previous page link
            if ($this->_options['ShowPrevious']) {
                $pagggin_number_html .= $this->ReturnHtml($prevpage, $this->_options['classPrevious'], $this->_options['previous']);
            }
        }


        for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {


            if (($x > 0) && ($x <= $totalpages)) {
                if ($x == $currentpage) {

                    ///current page link
                    $pagggin_number_html .= $this->_options['beforeHtml'] . '="javascript:void(0)" class="' . $this->_options['classCurrent'] . '">' .
                            $x .
                            $this->_options['afterHtml'];

                    //$pagggin_number_html .= $this->ReturnHtml($x,$this->_options['classCurrent'],$x);


                } else {

                    ///pagging numbers link
                    if ($this->_options['ShowPageNumbers']) {
                        $pagggin_number_html .= $this->ReturnHtml($x, $this->_options['classLink'], $x);
                    }


                }
            }
        }


        if ($currentpage != $totalpages) {

            $nextpage = $currentpage + 1;
            ///next link
            if ($this->_options['ShowNext']) {
                $pagggin_number_html .= $this->ReturnHtml($nextpage, $this->_options['classNext'], $this->_options['nextPage']);
            }
            ///last link
            if ($this->_options['ShowLast']) {
                $pagggin_number_html .= $this->ReturnHtml($totalpages, $this->_options['classLast'], $this->_options['last']);
            }

        }


        return $pagggin_number_html;


    }

    public function startCount()
    {
        return $this->startCount;
    }


    public function xnumVal()
    {
        return $this->xnumVal;
    }


    public function endCount()
    {
        return $this->endCount;
    }

    public function limit()
    {
        return " LIMIT " . $this->startCount . "," . $this->endCount;
    }


    public function PageDropDown()
    {

        $html = '<select class="' . $this->_options['DropDownClass'] . '" onChange="window.location.href=this.value">';

        $per_page = $this->_options['recordsPerPage'];


        for ($j = 1; $j <= $this->xnumVal; $j++) {

            if ($j == $this->ReturnCurrentPage()) {
                $sel = ' selected="selected"';
            } else {
                $sel = '';
            }
            $html .= '<option value="' . $this->_options['link'] .
                    $this->_options['questionMark'] .
                    $this->_options['variableName'] .
                    $this->_options['equalTo'] .
                    $j .
                    $this->_options['Endsign'] .
                    $this->_options['PerPagevariableName'] .
                    $this->_options['equalTo'] .
                    $per_page .

                    '" ' . $sel . '>' .
                    ucwords($this->_options['variableName']) .
                    ' ' . $j . '</option>';
        }
        $html .= '</select>';

        return $html;

    }


    public function JumpMenu()
    {

        $html = '<select class="' . $this->_options['DropDownClass'] . '" onChange="window.location.href=this.value">';

        $sel = '';

        foreach ($this->RecordPerPageNumbers as $key) {
            if (isset($_GET[$this->_options['PerPagevariableName']])) {
                if ($key == (int)$_GET[$this->_options['PerPagevariableName']]) {
                    $sel = ' selected="selected"';
                } else {
                    $sel = '';
                }
            }

            $html .= '<option value="' . $this->_options['link'] .
                    $this->_options['questionMark'] .
                    $this->_options['variableName'] .
                    $this->_options['equalTo'] .
                    $this->ReturnCurrentPage() .
                    $this->_options['Endsign'] .
                    $this->_options['PerPagevariableName'] .
                    $this->_options['equalTo'] .
                    $key .

                    '" ' . $sel . '>' .
                    ucwords($this->_options['variableName']) .
                    ' ' . $key . '</option>';


        }

        $html .= '</select>';

        return $html;

    }


    function ReturnHtml($targetNumber, $class, $toDisplay)
    {
        return $this->_options['beforeHtml'] . '="' . $this->_options['link'] .
        $this->_options['questionMark'] .
        $this->_options['variableName'] .
        $this->_options['equalTo'] .
        $targetNumber .
        $this->_options['Endsign'] .
        $this->_options['PerPagevariableName'] .
        $this->_options['equalTo'] .
        $this->_options['recordsPerPage'] .
        '" class="' . $class . '">' .
        $toDisplay .
        $this->_options['afterHtml'];
    }


}
