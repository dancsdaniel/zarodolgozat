<?php
$from = new DateTime('2022-01-04');
$to = new DateTime('2022-01-20');

$period = new DatePeriod(
    $from,
    new DateInterval('P1D'),
    $to->modify('+1 day')
);
foreach ($period as $key => $value) {
    echo $value->format('Y-m-d');
}