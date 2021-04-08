Highcharts.chart('container-bar', {

  chart: {
    type: 'column'
  },

  title: {
    text: ''
  },

  xAxis: {
    categories: ['BARANG-2020', 'BARANG-2021']
  },

  yAxis: {
    allowDecimals: false,
    min: 0,
    title: {
      text: 'Jumlah'
    }
  },

  tooltip: {
    formatter: function () {
      return '<b>' + this.x + '</b><br/>' +
        this.series.name + ': ' + this.y + '<br/>' +
        'Total: ' + this.point.stackTotal;
    }
  },

  plotOptions: {
    column: {
      stacking: 'normal'
    }
  },

  series: [{
    name: 'TU',
    data: [5,2],
    stack: 'Barang TU'
  }, {
    name: 'LAB SCR/PPS',
    data: [3,5],
    stack: 'Barang LAB'
  }, {
    name: 'RUANG PERPUSTAKAAN',
    data: [2,1],
    stack: 'Barang Perpus'
  }, {
    name: 'RUANG KELAS',
    data: [4,3],
    stack: 'Barang Kelas'
  }, {
    name: 'RUANG DOSEN',
    data: [4,4],
    stack: 'Barang Dosen'
  }, {
    name: 'RUANG LAINNYA',
    data: [0,4],
    stack: 'Barang Lainnya'
  }]
});