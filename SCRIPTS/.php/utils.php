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
