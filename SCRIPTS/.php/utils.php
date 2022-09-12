<?php
function checkInput($input)
{
    if (strlen($input) > 0) {
        $lowerInput = strtolower($input);
        $BlackList = ["<script>", "</scritp>", "1=1"];
        foreach ($BlackList as $word) {
            if (str_contains($lowerInput, $word)) return True;
        }
    }
    return False;
};

function keywordsExtraxtor($inputString)
{
    $ShittyWords = array("e", "né", "o", "inoltre", "ma", "però", "dunque", "anzi", "che", "allorché", "perché", "giacché", "purché", "affinché", "eppure", "oppure", "dopoché", "e", "anche", "neanche", "neppure", "o", "ovvero", "ossia", "oppure", "ma", "però", "tuttavia", "anzi", "infatti", "cioè", "ossia", "dunque", "quindi", "perciò", "che", "come", "quando", "mentre", "finché", "affinché", "perché", "perché", "poiché", "siccome", "sebbene", "quantunque", "se", "purché", "qualora", "perché", "come", "se", "fuorché", "tranne", "il", "lo", "la", "i", "gli", "le", "di", "a", "da", "in", "con", "su", "per", "tra", "fra", "qui", "qua", "costì", "colà", "vicino", "lontano", "ora", "adesso", "ancora", "ieri", "oggi", "domani", "prima", "poi", "presto", "subito", "tardi", "sempre", "mai", "bene", "male", "meglio", "peggio", "volentieri", "molto", "poco", "meno", "troppo", "più", "tanto", "assai", "niente", "nulla", "sì", "certo", "sicuro", "no", "non", "neanche", "neppure", "nemmeno", "forse", "probabilmente", "quasi",  "bene", "male", "forse", "pure", "sempre", "ieri", "oggi", "poi", "tardi", "mai", "magari", "volentieri", "molto", "tanto", "poco", "meno", "spesso", "meglio", "peggio", "presto", "subito", "almeno", "dappertutto", "infatti", "inoltre", "intanto");
    $aux = explode(' ', $inputString);
    if(count($aux)==1) return $inputString;
    $ret = array();
    foreach ($aux as $word) {
        if (in_array(strtolower($word), $ShittyWords, true) === false) {
            array_push($ret, $word);
        }
    }
    return $ret;
}
