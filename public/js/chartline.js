Highcharts.chart('container-line', {
  chart: {
    type: 'line'
  },
  title: {
    text: ''
  },
  subtitle: {
    text: ''
  },
  xAxis: {
    categories: ['2017', '2018', '2019', '2020', '2021']
  },
  yAxis: {
    title: {
      text: 'Jumlah'
    }
  },
  plotOptions: {
    line: {
      dataLabels: {
        enabled: true
      },
      enableMouseTracking: false
    }
  },
  series: [{
    name: 'TU',
    data: [30, 5, 10, 14, 2]
  }, {
    name: 'LAB SCR/PPS',
    data: [20, 10, 12, 5, 1]
  }, {
    name: 'RUANG PERPUSTAKAAN',
    data: [20, 5, 2, 10, 9]
  }, {
    name: 'RUANG KELAS',
    data: [40, 30, 7, 2, 8]
  }, {
    name: 'RUANG DOSEN',
    data: [10, 10, 2, 2, 0]
  }, {
    name: 'RUANG LAINNYA',
    data: [100, 30, 2, 10, 1]
  }]
});