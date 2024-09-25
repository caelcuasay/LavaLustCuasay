<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container">
    <table border="1">
        <div class="row mx-auto mt-3">
            <div class="col-md-8">
                <h2><?=$name?></h2>
                <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Created At</th> 
                        </tr>
                    <?php foreach($prod as $p): ?>
                        <tr>
                            <td><?=$p['id'];?></td>
                            <td><?=$p['product_name'];?></td>
                            <td><?=$p['product_desc'];?></td>
                            <td><?=$p['created_at'];?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </table>
    </div>
</body>
</html>