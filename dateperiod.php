<?php
$period = new DatePeriod(
    new DateTime('2022-01-04'),
    new DateInterval('P1D'),
    new DateTime('2022-01-20')
);
foreach ($period as $key => $value) {
    echo $value->format('Y-m-d');
}