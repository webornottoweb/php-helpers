<?php

function debug_backtrace_string($count = 5) {
    $stack = '';
    $i = 1;
    $trace = debug_backtrace();
    unset($trace[0]); //Remove call to this function from stack trace
    foreach($trace as $node) {
        \Log::debug("#$i ".$node['file'] ."(" .$node['line']."): ");
        if(isset($node['class'])) {
            $stack .= $node['class'] . "->";
        }
        $stack .= $node['function'] . "()" . PHP_EOL;
        $i++;

        if ($i > $count) {break;}
    }
    return $stack;
}