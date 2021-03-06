<?php
// Función para enviar información al log, ayuda a depurar
if (!function_exists('dump_error_log')) :
    function dump_error_log($object = null) : void
    {
        ob_start();
        print_r($object);
        $contents = ob_get_contents();
        ob_end_clean();
        error_log($contents);
    }
endif;

if (!function_exists('findWord')) :
    function findWord(string $text, string $subword) : string
    {
        $substring='';
        $lenghtWord=0;
        $initialPos = strpos($text, $subword);
        for ($i = $initialPos, $textLen = strlen($text); $i < $textLen; $i++) {
            if ($text[$i] === ' ') {
                $substring = substr($text, $initialPos, $lenghtWord);
                break;
            } else {
                $lenghtWord++;
            }
        }
        return $substring;
    }
endif;
