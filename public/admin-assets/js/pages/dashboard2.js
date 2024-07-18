// Countdown
$(".counter-down").incrementalCounter({digits:'auto'});


// Sells chart
Chart.defaults.global.defaultFontFamily = "IranSans";
var randomScalingFactor = function() {
    return Math.round(Math.floor(Math.random() * 6000)*1000)+15000000;
};
var config2 = {
    type: "line",
    data: {
        labels: ["فروردین", "اردی بهشت", "خرداد", "تیر", "مرداد", "شهریور", "مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"],
        datasets: [{
            backgroundColor: "rgba(69,39,160,0.2)",
            borderColor: "#4527a0",
            borderWidth: 2,
            label: "درآمد ماهانه(تومان)", 
            data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
        }]
    },
    options: {
        maintainAspectRatio: false,
        responsive: true,
        title:{
            display:true
        },
        hover: {
            mode: "nearest",
            intersect: true
        },
        scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: "ماه"
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                    display: true,
                    labelString: "درآمد به تومان"
                },
                ticks: {
                    suggestedMin: 8000000
                },
            }]
        }
    }
};


