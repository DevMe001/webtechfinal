<?php
    function validateAndAlert($value, $fieldName) {
        // Validate alphanumeric characters
        if (!ctype_alnum($value)) {
            echo '<script>alert("Error: Invalid characters in ' . $fieldName . '. Please use only alphanumeric characters.");</script>';
            echo '<script>window.history.back();</script>';
            exit();
        }
    }
?>