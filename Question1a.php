<?php
    function wordFrequency($text) {
        $words = str_word_count(strtolower($text), 1);
        $counts = array_count_values($words);
        arsort($counts);
    
        foreach ($counts as $word => $count) {
        echo "$word: $count\n";
        }
    }

    $text = "The quick brown fox jumps over the lazy dog. The dog sleeps in the shade of the tree. even san the and audace";
    wordFrequency($text); 
