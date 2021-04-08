Highcharts.chart('container-donuts', {
  chart: {
    type: 'pie',
    options3d: {
      enabled: true,
      alpha: 45
    }
  },
  title: {
    text: ''
  },
  subtitle: {
    text: ''
  },
  plotOptions: {
    pie: {
      innerSize: 100,
      depth: 45
    }
  },
  series: [{
    name: 'Total',
    data: [
      ['TU', 8],
      ['LAB SCR/PPS', 3],
      ['RUANG PERPUSTAKAAN', 1],
      ['RUANG KELAS', 6],
      ['RUANG DOSEN', 8],
      ['RUANG LAINNYA', 4]
    ]
  }]
});