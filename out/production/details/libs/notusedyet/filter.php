<?php
//
///**
// * Sanitize and validate data
// * @param array $data
// * @param array $fields
// * @param array $messages
// * @return array
// */
//function filter(array $data, array $fields, array $messages = []): array
//{
//    $sanitization = [];
//    $validation = [];
//
//    // extract sanitization & validation rules
//    foreach ($fields as $field => $rules) {
//        $field = trim($field);
//        if (strpos($rules, '|')) {
//            [$sanitization[$field], $validation[$field]] = explode('|', $rules, 2);
//        } else {
//            $sanitization[$field] = $rules;
//        }
//    }
//
//    var_dump($sanitization);
//    var_dump($validation);
//
//    $inputs = sanitize($data, ['string']);
////    foreach ($inputs as $element) {
////        echo $element . "<br>"; // Output each element with a line break
////    }
//    $errors = validate($inputs, $validation, $messages);
//
//
//    return [$inputs, $errors];
//}
