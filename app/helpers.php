<?php

if(!function_exists('formatDate')) {
    function formatDate(string $date) {
        return date('M j, Y', strtotime($date));
    }
}

if(!function_exists('formatDollarAmount')) {
    function formatDollarAmount(float $amount) {
        return '$' . number_format($amount);
    }
}

if(!function_exists('calculateVAT')) {
    function calculateVAT(float $amount) {
        $calculatedAmount = 15/100 * $amount;
        return '$' . number_format(abs($calculatedAmount), 2);
    }
}