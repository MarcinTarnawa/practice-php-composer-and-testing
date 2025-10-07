<?php

use Maantje\Charts\Bar\Bar;
use Maantje\Charts\Bar\Bars;
use Maantje\Charts\Chart;
use Maantje\Charts\Line\Line;
use Maantje\Charts\Line\Lines;
use Maantje\Charts\Line\Point;

// bar chart
$chart = new Chart(
    series: [
        new Bars(
            bars: [
                new Bar(name: 'One Bar', value: 222301),
                new Bar(name: 'Second Bar', value: 755555),
                new Bar(name: 'Third Bar', value: 333333),
            ],
        ),
    ],
);

echo $chart->render();


//line chart
$chart = new Chart(
    series: [
        new Lines(
            lines: [
                new Line(
                    points: [
                        new Point(x: 0, y: 0),
                        new Point(x: 100, y: 4),
                        new Point(x: 200, y: 15),
                        new Point(x: 300, y: 9),
                    ],
                ),
                new Line(
                    points: [
                        [0, 0],
                        [100, 4],
                        [200, 15],
                        [300, 9],
                    ],
                ),
            ],
        ),
    ],
);

echo $chart->render();