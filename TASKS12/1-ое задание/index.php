<?php

class Massive
{
    private $massive_1 = array();
    private $massive_2 = array();
    public $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function unionArrays ($massive_1, $massive_2)
    {
        $result = [];
        $res = [];
        $s = 0;
        foreach ($massive_1 as $key_mass1 => $value){
            foreach ($massive_2 as $key_mass2 => $item) {
                if ($key_mass1 == $key_mass2) {
                    $res[$key_mass1] = [
                        $value, $item
                    ];
                }
            }
        }
        foreach ($res as $val){
            If (count($res) == $s) {
                break;
            } else {
                foreach ($val as $sval){
                    array_push($result, $sval);
                }
                $s++;
            }
        }
        return $result;

    }
    public function __get($property)
    {
        return $this->$property;
    }
    public function generate_string($input, $strength = 16) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }
}

$class = new Massive();
$class->massive1 = [
    $class->generate_string($class->permitted_chars, 20),
    $class->generate_string($class->permitted_chars, 24),
    $class->generate_string($class->permitted_chars, 28)
];
$class->massive2 = [
    $class->generate_string($class->permitted_chars, 32),
    $class->generate_string($class->permitted_chars, 21),
    $class->generate_string($class->permitted_chars, 26)
];


echo '<pre>';
echo '<b>Исходные массивы:</b><br><br>';
print_r($class->massive1);
print_r($class->massive2);
echo '<br><br>';
echo '<b>Результирующий массив:</b><br><br>';
print_r($class->unionArrays($class->massive1, $class->massive2));
echo '</pre>';
?>
