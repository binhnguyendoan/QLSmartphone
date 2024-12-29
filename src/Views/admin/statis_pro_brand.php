<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>

<div class="wrapper">
    <?php include './src/Views/admin/header_admin.php' ?>
    <div class="content-wrapper">
    <!-- Biểu đồ -->
    <div class="chart-container">
        <canvas id="productChart" width="400" height="400"></canvas>
    </div>

    <div class="table-container">
        <h4>Chi tiết thống kê:</h4>
        <table class="table table-dark table-striped table-bordered" style="border-radius: 8px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1);">
            <thead>
                <tr>
                    <th>ID Thương Hiệu</th>
                    <th>Tên Thương Hiệu</th>
                    <th>Số Lượng Sản Phẩm</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($staproduct)): ?>
                    <?php foreach ($staproduct as $sta): ?>
                        <tr>
                            <td><?php echo $sta['brandId']; ?></td>
                            <td><?php echo $sta['brandName']; ?></td>
                            <td><?php echo $sta['productCount']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">Không có dữ liệu thống kê.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

    <?php include './src/Views/admin/footer_admin.php' ?>
</div>

<style>
    #productChart {
        width: 70% !important;
        height: auto !important;
    }

    table {
        font-size: 14px;
    }

    th,
    td {
        text-align: center;
        padding: 12px;
    }
</style>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const staproduct = <?php echo json_encode($staproduct); ?>;

    const labels = staproduct.map(sta => sta.brandName);
    const data = staproduct.map(sta => sta.productCount);

    // Tạo biểu đồ hình tròn
    const ctx = document.getElementById('productChart').getContext('2d');
    const productChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Số lượng sản phẩm theo thương hiệu',
                data: data,
                backgroundColor: [
                    '#FF5733', '#33FF57', '#3357FF', '#FF33A6', '#FFAA33', '#33A6FF', '#FF33B2','#FFC300',
                ],

                borderColor: '#fff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        font: {
                            size: 14,
                            weight: 'bold',
                            family: 'Arial',
                        },
                    },
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw + ' sản phẩm';
                        }
                    }
                }
            },
            cutout: '10%'
        }
    });
</script>