Highcharts.chart('container-pie', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45,
      beta: 0
    }
  },
  title: {
    text: ''
  },
  accessibility: {
    point: {
      valueSuffix: '%'
    }
  },
  tooltip: {
    pointFormat: '{series.name}: <b>{point.percentage:.1f}</b>'
  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
      depth: 35,
      dataLabels: {
        enabled: true,
        format: '{point.name}'
      }
    }
  },
  series: [{
    type: 'pie',
    name: 'Total',
    data: [
      ['TU', 45.0],
      ['LAB SCR/PPS', 26.8],
      {
        name: 'RUANG PERPUSTAKAAN',
        y: 12.8,
        sliced: true,
        selected: true
      },
      ['RUANG KELAS', 8.5],
      ['RUANG DOSEN', 6.2],
      ['RUANG LAINNYA', 0.7]
    ]
  }]
});