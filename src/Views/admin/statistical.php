<?php ob_start(); ?>
<?php
$admin = $_SESSION['admin'] ?? null;
?>

<div class="wrapper">

    <?php include './src/Views/admin/header_admin.php' ?>
    <div class="content-wrapper">
        <div class="container">
            <h3 class="text-center">Thống kê số lượng sản phẩm theo danh mục</h3>
            
            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 30px;">
                <div style="flex: 1; padding: 10px;">
                    <canvas id="productChart" width="400" height="400"></canvas>
                </div>
                
                <div style="flex: 1; padding: 10px; max-width: 600px;">
                    <h4>Chi tiết thống kê:</h4>
                    <table class="table table-dark table-striped table-bordered" style="border-radius: 8px; box-shadow: 0px 4px 6px rgba(0,0,0,0.1);">
                        <thead>
                            <tr>
                                <th>ID Danh Mục</th>
                                <th>Tên Danh Mục</th>
                                <th>Số Lượng Sản Phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($statistics)): ?>
                                <?php foreach ($statistics as $stat): ?>
                                    <tr>
                                        <td><?php echo $stat['catId']; ?></td>
                                        <td><?php echo $stat['catName']; ?></td>
                                        <td><?php echo $stat['productCount']; ?></td>
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

        </div>
    </div>
    <?php include './src/Views/admin/footer_admin.php' ?>
</div>

<style>
    #productChart {
        width: 50% !important;
        height: auto !important;
    }
    table {
        font-size: 14px;
    }
    th, td {
        text-align: center;
        padding: 12px;
    }
</style>

<?php $content = ob_get_clean(); ?>
<?php include(__DIR__ . '/../../../templates/layout.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const statistics = <?php echo json_encode($statistics); ?>;

const labels = statistics.map(stat => stat.catName);
const data = statistics.map(stat => stat.productCount);

// Tạo biểu đồ hình tròn
const ctx = document.getElementById('productChart').getContext('2d');
const productChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: labels,
        datasets: [{
            label: 'Số lượng sản phẩm theo danh mục',
            data: data,
            backgroundColor: ['#FF5733', '#33FF57', '#3357FF', '#FF33A6', '#FFAA33', '#33A6FF'],
            borderColor: '#fff',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
                labels: {
                    font: {
                        size: 18, 
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
