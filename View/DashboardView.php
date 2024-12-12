

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Para visualizar la gráfica js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <!-- CSS General -->
  <link rel="stylesheet" href="../View/CSS/dashboard.css">
  <title>Dashboard - Varosi</title>
</head>
<body>

  <div class="container-fluid vh-100 d-flex flex-column align-items-center justify-content-center">
    <!-- Botones para alternar entre Gráfica y Tabla -->
  <div class="tab-container">
  <button id="showChartBtn" class="tab-btn">Gráfica</button>
  <button id="showTableBtn" class="tab-btn">Tabla</button>
  <button id="showAddProductBtn" class="tab-btn">Añadir Producto</button>
</div>
    <div class="dashboard-container p-4 rounded shadow">
<!-- Logo -->
<a href="#" class="my-3 d-block"><img src="../View/IMG/VRS2.png" alt="Varosies" width="50px" /></a>





      <!-- Gráfica -->
      <div id="chartContainer" class="mb-4">
        <canvas id="ventasChart" width="400" height="200"></canvas>
      </div>



      <!-- Tabla -->
      <div id="tableContainer" class="table-responsive" style="display: none;">
        <h2 class="mb-3">VENTAS</h2>
        <table class="table table-bordered table-striped text-center" id="ventasTable">
          <thead class="table-dark">
            <tr>
              <th>#</th>
              <th>Fecha de Compra</th>
              <th>Cantidad</th>
              <th>Precio</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ventas as $venta){ ?>
            <tr>
              <td><?= $venta['id'] ?></td>
              <td><?= $venta['fecha'] ?></td>
              <td><?= $venta['cantidad'] ?></td>
              <td><?= number_format($venta['precio'], 2) ?>€</td>
            </tr>
            <?php } ?>
          </tbody>
        </table>



      <!-- Resumen de Estadísticas -->
      <div class="stat-summary ">
        <h2 class="mb-3">RESUMEN DE ESTADÍSTICAS</h2>
        <hr>
        <p class="text-black">Total Ventas: <span id="totalVentas">0</span>€</p>
        <p class="text-black">Ventas Promedio: <span id="avgVentas">0</span>€</p>
      </div>

          <!-- Formulario para crear el archivo TXT -->
    <form method="POST">
      <button type="submit" name="create_txt" class="download-btn">Crear y Descargar Documento</button>
    </form>

    </div>

     <!-- Formulario Añadir Producto -->
  <div id="addProductContainer" style="display: none;">
    <h2 class="mb-3">Añadir Producto</h2>
    <form method="POST" action="add_product.php">
      <div class="mb-3">
        <label for="productName" class="form-label">Nombre del Producto:</label>
        <input type="text" id="productName" name="productName" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="productPrice" class="form-label">Precio:</label>
        <input type="number" id="productPrice" name="productPrice" class="form-control" step="0.01" required>
      </div>
      <div class="mb-3">
        <label for="productQuantity" class="form-label">Cantidad:</label>
        <input type="number" id="productQuantity" name="productQuantity" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Añadir Producto</button>
    </form>
  </div>
  </div>


  <!-- IMPORTANTE AL TENER ELEMENTOS PHP DEJAMOS ESTA CLASE EN EL MISMO DOCUMENTO -->
  <script>

    let ventasChart;
  // Alterna entre Gráfica, Tabla y Añadir Producto
document.getElementById('showChartBtn').addEventListener('click', function () {
  toggleView('chartContainer', this);
});

document.getElementById('showTableBtn').addEventListener('click', function () {
  toggleView('tableContainer', this);
});

document.getElementById('showAddProductBtn').addEventListener('click', function () {
  toggleView('addProductContainer', this);
});

function toggleView(showId, activeButton) {
  const sections = ['chartContainer', 'tableContainer', 'addProductContainer'];
  const buttons = ['showChartBtn', 'showTableBtn', 'showAddProductBtn'];

  sections.forEach(id => {
    document.getElementById(id).style.display = id === showId ? 'block' : 'none';
  });

  buttons.forEach(id => {
    document.getElementById(id).classList.toggle('active', id === activeButton.id);
  });
}

// Inicializa la Gráfica (si aún no está)
document.getElementById('showChartBtn').addEventListener('click', function () {
  if (!ventasChart) {
    const fechas = <?= json_encode(array_column($ventas, 'fecha')) ?>;
    const totales = <?= json_encode(array_column($ventas, 'precio')) ?>;
    const ctx = document.getElementById('ventasChart').getContext('2d');

    ventasChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: fechas,
        datasets: [{
          label: 'Ventas Totales',
          data: totales,
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        plugins: { legend: { display: true } },
        scales: { y: { beginAtZero: true } }
      }
    });
  }
});

// Actualiza las estadísticas
function updateStats() {
  const rows = document.querySelectorAll('#ventasTable tbody tr');
  let totalVentas = 0;
  let totalCount = 0;

  rows.forEach(row => {
    totalVentas += parseFloat(row.cells[3].textContent.replace('€', '').replace(',', ''));
    totalCount++;
  });

  const avgVentas = totalCount ? (totalVentas / totalCount).toFixed(2) : 0;

  document.getElementById('totalVentas').textContent = totalVentas.toFixed(2);
  document.getElementById('avgVentas').textContent = avgVentas;
}

// Llamada a la función para actualizar las estadísticas
updateStats();
</script>


</body>
</html>
