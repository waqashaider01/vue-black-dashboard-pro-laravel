# Charts

We used [Vue Chart.js](https://vue-chartjs.org/#/) along with Chart.js library and created some re-usable components 
on top of it so you can easily use in your project.

```js
import LineChart from 'src/components/Charts/LineChart'
import BarChart from 'src/components/Charts/BarChart'
import PieChart from 'src/components/Charts/PieChart'
```

Global usage

```js
Vue.component(LineChart.name, LineChart)
Vue.component(BarChart.name, BarChart)
Vue.component(PieChart.name, PieChart)
```

For local usage
```js
export default {
  components: {
    LineChart,
    BarChart,
    PieChart
  }
}
```

## Line Chart component

:::demo
```html
<div>
  <line-chart style="height: 100%"
              :chart-data="purpleLineChart.chartData"
              :gradient-color="purpleLineChart.gradientColors"
              :gradient-stops="purpleLineChart.gradientStops"
              :extra-options="purpleLineChart.extraOptions">
  </line-chart>
</div>
<script>

export default {
  data() {
    return {
      purpleLineChart: {
        extraOptions: {
          maintainAspectRatio: false,
            legend: {
              display: false
            },
          responsive: true,
          tooltips: {
            backgroundColor: '#f5f5f5',
            titleFontColor: '#333',
            bodyFontColor: '#666',
            bodySpacing: 4,
            xPadding: 12,
            mode: "nearest",
            intersect: 0,
            position: "nearest"
          },
          scales: {
            yAxes: [{
              barPercentage: 1.6,
              gridLines: {
                drawBorder: false,
                color: 'rgba(29,140,248,0.0)',
                zeroLineColor: "transparent",
              },
              ticks: {
                suggestedMin: 50,
                suggestedMax: 110,
                padding: 20,
                fontColor: "#ff8a76"
              }
            }],
        
            xAxes: [{
              barPercentage: 1.6,
              gridLines: {
                drawBorder: false,
                color: 'rgba(220,53,69,0.1)',
                zeroLineColor: "transparent",
              },
              ticks: {
                padding: 20,
                fontColor: "#ff8a76"
              }
            }]
          }
        

        },
        chartData: {
          labels: ['JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          datasets: [{
            label: "Data",
            fill: true,
            borderColor: '#d048b6',
            borderWidth: 2,
            borderDash: [],
            borderDashOffset: 0.0,
            pointBackgroundColor: '#d048b6',
            pointBorderColor: 'rgba(255,255,255,0)',
            pointHoverBackgroundColor: '#d048b6',
            pointBorderWidth: 20,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 15,
            pointRadius: 4,
            data: [80, 100, 70, 80, 120, 80],
          }]
        }
      }
    }
  }
}
</script>

```
:::

## Bar Chart component

:::demo
```html
<div>
  <bar-chart style="height: 100%"
             :chart-data="blueBarChart.chartData"
             :gradient-color="blueBarChart.gradientColors"
             :gradient-stops="blueBarChart.gradientStops"
             :extra-options="blueBarChart.extraOptions">
  </bar-chart>
</div>

<script>
export default {
  data() {
    return {
       blueBarChart: {
        extraOptions: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            backgroundColor: '#f5f5f5',
            titleFontColor: '#333',
            bodyFontColor: '#666',
            bodySpacing: 4,
            xPadding: 12,
            mode: "nearest",
            intersect: 0,
            position: "nearest"
          },
          scales: {
            yAxes: [{
        
              gridLines: {
                drawBorder: false,
                color: 'rgba(29,140,248,0.1)',
                zeroLineColor: "transparent",
              },
              ticks: {
                suggestedMin: 60,
                suggestedMax: 120,
                padding: 20,
                fontColor: "#9e9e9e"
              }
            }],
            xAxes: [{
        
              gridLines: {
                drawBorder: false,
                color: 'rgba(29,140,248,0.1)',
                zeroLineColor: "transparent",
              },
              ticks: {
                padding: 20,
                fontColor: "#9e9e9e"
              }
            }]
          }
        },
        chartData: {
          labels: ['USA', 'GER', 'AUS', 'UK', 'RO', 'BR'],
          datasets: [{
            label: "Countries",
            fill: true,
            borderColor: '#1f8ef1',
            borderWidth: 2,
            borderDash: [],
            borderDashOffset: 0.0,
            data: [53, 20, 10, 80, 100, 45],
          }]
        },
        gradientColors: ['rgba(29,140,248,0.2)', 'rgba(29,140,248,0.0)', 'rgba(29,140,248,0)'],
        gradientStops: [1, 0.4, 0],
      },
    }
  }
}
</script>

```
:::


## Pie chart component

:::demo
```html
<div>
  <pie-chart
    style="height: 100%"
    :chart-data="pieChart1.chartData"
    :extra-options="pieChart1.extraOptions"
    :height="120">
  </pie-chart>
</div>
<script>

export default {
  data() {
    return {
      pieChart1: {
        chartData: {
          labels: [1, 2],
          datasets: [
            {
              label: 'Emails',
              pointRadius: 0,
              pointHoverRadius: 0,
              backgroundColor: ['#00c09d', '#e2e2e2'],
              borderWidth: 0,
              data: [60, 40]
            }
          ]
        },
        extraOptions: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          cutoutPercentage: 70,
          tooltips: {
            backgroundColor: '#f5f5f5',
            titleFontColor: '#333',
            bodyFontColor: '#666',
            bodySpacing: 4,
            xPadding: 12,
            mode: 'nearest',
            intersect: 0,
            position: 'nearest'
          },
        
          scales: {
            yAxes: [
              {
                display: 0,
                ticks: {
                  display: false
                },
                gridLines: {
                  drawBorder: false,
                  zeroLineColor: 'transparent',
                  color: 'rgba(255,255,255,0.05)'
                }
              }
            ],
        
            xAxes: [
              {
                display: 0,
                barPercentage: 1.6,
                gridLines: {
                  drawBorder: false,
                  color: 'rgba(255,255,255,0.1)',
                  zeroLineColor: 'transparent'
                },
                ticks: {
                  display: false
                }
              }
            ]
          }
          }
        }
    }
  }
}
</script>

```
:::

For more examples check out our `Dashboard.vue` component from the demo archive.
You will find more chart examples there including a chart with updating data.


## Line Chart props

<props-table component-name="line-chart"></props-table>

## Bar Chart props

<props-table component-name="bar-chart"></props-table>

## Pie Chart props

<props-table component-name="pie-chart"></props-table>


<script>
export default {
  props: ['slot-key'],
  data() {
    return {
      blueBarChart: {
        extraOptions: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          tooltips: {
            backgroundColor: '#f5f5f5',
            titleFontColor: '#333',
            bodyFontColor: '#666',
            bodySpacing: 4,
            xPadding: 12,
            mode: "nearest",
            intersect: 0,
            position: "nearest"
          },
          scales: {
            yAxes: [{
        
              gridLines: {
                drawBorder: false,
                color: 'rgba(29,140,248,0.1)',
                zeroLineColor: "transparent",
              },
              ticks: {
                suggestedMin: 60,
                suggestedMax: 120,
                padding: 20,
                fontColor: "#9e9e9e"
              }
            }],
            xAxes: [{
        
              gridLines: {
                drawBorder: false,
                color: 'rgba(29,140,248,0.1)',
                zeroLineColor: "transparent",
              },
              ticks: {
                padding: 20,
                fontColor: "#9e9e9e"
              }
            }]
          }
        },
        chartData: {
          labels: ['USA', 'GER', 'AUS', 'UK', 'RO', 'BR'],
          datasets: [{
            label: "Countries",
            fill: true,
            borderColor: '#1f8ef1',
            borderWidth: 2,
            borderDash: [],
            borderDashOffset: 0.0,
            data: [53, 20, 10, 80, 100, 45],
          }]
        },
        gradientColors: ['rgba(29,140,248,0.2)', 'rgba(29,140,248,0.0)', 'rgba(29,140,248,0)'],
        gradientStops: [1, 0.4, 0],
      },
      pieChart1: {
        chartData: {
          labels: [1, 2],
          datasets: [
            {
              label: 'Emails',
              pointRadius: 0,
              pointHoverRadius: 0,
              backgroundColor: ['#00c09d', '#e2e2e2'],
              borderWidth: 0,
              data: [60, 40]
            }
          ]
        },
        extraOptions: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          responsive: true,
          cutoutPercentage: 70,
          tooltips: {
            backgroundColor: '#f5f5f5',
            titleFontColor: '#333',
            bodyFontColor: '#666',
            bodySpacing: 4,
            xPadding: 12,
            mode: 'nearest',
            intersect: 0,
            position: 'nearest'
          },
        
          scales: {
            yAxes: [
              {
                display: 0,
                ticks: {
                  display: false
                },
                gridLines: {
                  drawBorder: false,
                  zeroLineColor: 'transparent',
                  color: 'rgba(255,255,255,0.05)'
                }
              }
            ],
        
            xAxes: [
              {
                display: 0,
                barPercentage: 1.6,
                gridLines: {
                  drawBorder: false,
                  color: 'rgba(255,255,255,0.1)',
                  zeroLineColor: 'transparent'
                },
                ticks: {
                  display: false
                }
              }
            ]
          }
          }
        },
      purpleLineChart: {
        extraOptions: {
          maintainAspectRatio: false,
            legend: {
              display: false
            },
            responsive: true,
          tooltips: {
            backgroundColor: '#f5f5f5',
            titleFontColor: '#333',
            bodyFontColor: '#666',
            bodySpacing: 4,
            xPadding: 12,
            mode: "nearest",
            intersect: 0,
            position: "nearest"
          },
          scales: {
            yAxes: [{
              barPercentage: 1.6,
              gridLines: {
                drawBorder: false,
                color: 'rgba(29,140,248,0.0)',
                zeroLineColor: "transparent",
              },
              ticks: {
                suggestedMin: 50,
                suggestedMax: 110,
                padding: 20,
                fontColor: "#ff8a76"
              }
            }],
        
            xAxes: [{
              barPercentage: 1.6,
              gridLines: {
                drawBorder: false,
                color: 'rgba(220,53,69,0.1)',
                zeroLineColor: "transparent",
              },
              ticks: {
                padding: 20,
                fontColor: "#ff8a76"
              }
            }]
          }
        

        },
        chartData: {
          labels: ['JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
          datasets: [{
            label: "Data",
            fill: true,
            borderColor: '#d048b6',
            borderWidth: 2,
            borderDash: [],
            borderDashOffset: 0.0,
            pointBackgroundColor: '#d048b6',
            pointBorderColor: 'rgba(255,255,255,0)',
            pointHoverBackgroundColor: '#d048b6',
            pointBorderWidth: 20,
            pointHoverRadius: 4,
            pointHoverBorderWidth: 15,
            pointRadius: 4,
            data: [80, 100, 70, 80, 120, 80],
          }]
        }
      }
    }
  }
}
</script>
