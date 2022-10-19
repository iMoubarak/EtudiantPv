
  const labels = [
    'Semestre 1',
    'Semestre 2',
    'Semestre 3',
    'Semestre 4',
    'Semestre 5',
    'Semestre 6',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Moyenne semestriel',
      backgroundColor: [
        'rgba(255, 100, 132, 0.2)',
        'rgba(100, 162, 35, 0.2)',
        'rgba(250, 206, 86, 0.2)',
        'rgba(75, 192, 115, 0.2)',
        'rgba(103, 102, 55, 0.2)',
        'rgba(255, 150, 64, 0.2)'
    ],
    borderColor: [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
    ],
    borderWidth: 1,
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {}
  };
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

