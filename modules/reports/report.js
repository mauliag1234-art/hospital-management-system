// Pie Chart
const pieCtx = document.getElementById('pieChart');

if (pieCtx) {
    new Chart(pieCtx, {
        type: 'pie',
        data: {
           labels: ['Admitted Patients', 'Discharged Patients'],
datasets: [{
    data: [admitted, discharged],
    backgroundColor: [
        '#1cc88a',
        '#e74a3b'
    ],
    borderWidth: 2
}]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
}

// Bar Chart
const barCtx = document.getElementById('barChart');

if (barCtx) {
    new Chart(barCtx, {
        type: 'bar',
        data: {
         labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
         'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],

datasets: [{
    label: 'Monthly Revenue (₹)',
    data: monthlyRevenue
}]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}